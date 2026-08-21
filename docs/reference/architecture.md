# Arquitetura — Mapa Cultural de Pernambuco

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Documento vivo (classe REFERENCE): arquitetura como é hoje. Desatualizado → corrigir ou marcar obsoleto, nunca deixar apodrecer.
> Fonte: análise do legado (J12 STAGE 4) — evidências com caminhos de arquivo.

## Visão geral

Repositório de deploy/integração (não de código do core): aglutina core Mapas Culturais (imagem Docker `hacklab/mapasculturais:7.8.6` — `docker/Dockerfile:1`), 17 plugins de submódulo git + código local, 1 tema local (MapasPE) e 1 tema de submódulo (MapasMuseus), servidos por stack docker-compose. Atende **2 produtos no mesmo core**, distinguidos por domínio:

- `www.mapacultural.pe.gov.br` → tema `MapasPE` (`themes.active` em `docker/common/config.d/0.main.php:21`)
- `www.museusdepernambuco.pe.gov.br` → tema `MapasMuseus` + conf-base próprio (`docker/common/conf-base-museus.php`, injetado no build via `docker/Dockerfile:14`)

E um terceiro domínio de BI: `bi.mapacultural.pe.gov.br` → proxy para o serviço Metabase (`docker/production/nginx-prod.conf`).

## Serviços e papéis

| Serviço | Imagem | Papel |
|---|---|---|
| nginx | nginx:latest (**sem pin**) | Edge HTTP/443, serve files/assets estáticos, fastcgi → mapasculturais:9000, proxy BI |
| mapasculturais | build via `docker/Dockerfile` (base hacklab/mapasculturais:7.8.6) | Aplicação PHP (Mapas Culturais v7) |
| redis | redis:6 | Cache de aplicação (allkeys-lru; 3144Mb prod / 1256Mb homolog / 256Mb dev) |
| sessions | redis:6 | Sessões PHP persistentes em volume (`docker-data/sessions`) |
| db | postgis/postgis:15-master (homolog) / 14-master (dev) | Banco geoespacial. **Em produção está comentado** (`docker-compose.prod.yml:71-80`) → DB externo |
| metabase + db_metabase | metabase/metabase + postgres:14 (**sem pin**) | BI dashboards (painéis públicos), só no prod |
| mailhog | mailhog/mailhog | Captura de e-mail em dev e homolog |

## Estrutura de plugins

Submódulos git (17 gitlinks pinados por SHA; URLs em `.gitmodules`): Accessibility, AccountConsolidator, AccountStatus, AdminLoginAsUser, Analytics, ClaimForm, CommitteeDraw, CreateGeoDivisions, FormCommunication (Secult-PE), HomeHeaderBanners, MapasBlame, Metabase, MultipleLocalAuth, RegistrationPayments, SpamDetector, SubsiteMuseusSwitcher, ValuersManagement.

Código local commitado:
- `plugins/SettingsPe` (tree local apesar de declarado em `.gitmodules:12` — customizações PE: taxonomia "subárea", views CadUnico/selo, widgets de home)
- `themes/MapasPE` (tema ativo, filho de BaseV2 — `themes/MapasPE/Theme.php:6`)

**Anomalias conhecidas:** `plugins/SubsiteMuseusSwitcher` é gitlink SEM entrada no `.gitmodules` (submódulo órfão: `git submodule update --init` não o inicializa); habilitação de plugins vive no array `plugins` de `docker/common/config.d/plugins.php` (desativados ficam comentados — AccountStatus, Metabase, CadUnico).

## Temas

- **MapasPE** (local): filho de `\MapasCulturais\Themes\BaseV2\Theme`; hook webmanifest (favicons PWA) e taxonomia subárea em agent.edit (`themes/MapasPE/Theme.php`).
- **MapasMuseus** (submódulo theme-Museus): recebe `conf-base.php` substituído no build (`docker/Dockerfile:14` ← `docker/common/conf-base-museus.php`): desabilita projects/events/apps/opportunities, define selo "Ponto de Memória" (sealId 27), subsiteId=2, lista dos 185 municípios de PE.

## Camadas de configuração

- `docker/common/config.d/` → comum a todos os ambientes (montado em `/var/www/config/common.d`): `0.main.php` (identidade, DB doctrine, hierarquia geográfica país→município), `plugins.php`, `lgpd.php` (+ termos em `lgpd-terms/*.html`), `maps.php`, `routes.php`, `sharing.php`, `offline.php` (modo manutenção).
- `docker/production/config.d/` → só prod/homolog (`authentication.php`: MultipleLocalAuth com Facebook/LinkedIn/Google/Twitter/govbr).
- `dev/config.d/` → montado como `/var/www/config/local.d` (**camada diferente** do mecanismo de prod).
- Orquestração: `docker/common/config.php` faz glob+sort+array_merge (prefixo "0." garante precedência).
- `docker/overrides/` — **não referenciado por nenhum Dockerfile/compose** (legado Aldir Blanc, aparentemente inativo).

## Fluxo de deploy

- Arquivo `environment` no servidor (não versionado; conteúdo: `prod` ou `homolog`) — todos os scripts da raiz o leem: `ENV=$(cat environment)`.
- `start.sh` → `docker compose -f docker-compose.$ENV.yml up --detach`.
- `update.sh` → git pull → submodule update → build --no-cache --pull → stop → start.
- `docker/Dockerfile` → COPY themes+plugins → `pnpm install --recursive && pnpm run build` → COPY configs → injeção do conf-base do Museus.
- `docker/entrypoint.sh` → permissões → migrations no boot (`db-update.sh` + `mc-db-updates.sh`) → se `version.txt` mudou: compile-sass + doctrine proxies → `BUILD_ASSETS=1`: pnpm dev → crons → processo principal.
- CI (`.github/workflows/ci.yml`): push de tags `v*` e branches master/develop/basev2/v7.0/v7.4 → build/push da imagem `docker.io/hacklab/mapas-pe`.
- Modo manutenção: `docker-compose-embreve.yml` + `offline.php` (redirect `/em-breve` com bypass por `?online=$OFFLINE_BYPASS`).
- TLS: `init-letsencrypt.sh` + `docker-compose.certbot.yml` (certbot renew a cada 12h); homolog protegido por .htpasswd.

## Estratégia de pinning de versões

- Core: tag exata `7.8.6` em `docker/Dockerfile:1` (política no README).
- Plugins/tema Museus: pin por SHA de commit do submódulo; histórico segue padrão "Atualiza X para vY".
- Infra: redis:6 e PostGIS pinados por minor; **exceções**: nginx:latest, metabase e postgres do Metabase sem pin.

## Comandos reais

**Dev (`dev/`):** `sudo ./dev/start.sh` (subs: `-b/--build`, `-d/--down`) · `./dev/watch.sh` (assets) · `./dev/pnpm.sh <args>` · `./dev/bash.sh` · `./dev/shell.sh` (psysh) · `./dev/psql.sh` · `./dev/dump-db-updates.sh` (diff de schema Doctrine).

**Prod/Homolog (raiz; exigem arquivo `environment`):** `sudo ./start.sh` · `./stop.sh` · `./restart.sh` · `sudo ./update.sh` · `./logs.sh` · `./bash.sh` · `./psql.sh` · `./init-letsencrypt.sh` · `./test-rate.sh [-n N] [-i INTERVALO] [-u URL]`.

**Testes: NÃO EXISTEM** — sem suite, runner, lint ou typecheck. A CI apenas constrói e publica a imagem. (Obs.: `dev/compile-sass.sh`, `dev/pnpm.sh` e `dev/dump-db-updates.sh` usam sintaxe `docker-compose` v1, incompatível com instalações só-v2.)

## Decisões técnicas

→ Ver `decisions/` (ADRs numerados sequencialmente).
