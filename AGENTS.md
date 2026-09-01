# AGENTS.md — Mapa Cultural de Pernambuco

## 1. Contexto do projeto

Repositório de deploy/integração (não de código do core) da plataforma Mapa Cultural de Pernambuco: aglutina o core Mapas Culturais v7 (PHP, imagem Docker pinada), 17 plugins e 1 tema como submódulos git, 1 plugin local (SettingsPe) e 1 tema local (MapasPE), orquestrados por docker-compose por ambiente. Atende dois produtos no mesmo core (Mapa PE e Museus de PE, por domínio).
A fonte de verdade do produto é o PRD vivo em `docs/reference/prd.md`.

## 2. Comandos verificáveis

| Ação | Comando |
|---|---|
| Build (dev) | `sudo ./dev/start.sh -b` |
| Build (prod/homolog) | `sudo ./update.sh` (exige arquivo `environment` com `prod` ou `homolog` na raiz) |
| Testes | não existem no repositório — a verificação mínima é o build subir e a app responder |
| Lint | não existe no repositório |
| Typecheck | não existe no repositório |

Rode os comandos relevantes antes de declarar qualquer tarefa pronta. Sem testes, o build + smoke manual é o floor.

## 3. Mapa da estrutura

- `docker/Dockerfile` — build da imagem da app (base `hacklab/mapasculturais` pinada por tag exata)
- `docker/common/config.d/` — configuração comum a todos os ambientes (`plugins.php` habilita/desabilita plugins; `0.main.php` identidade/DB; prefixo `0.` = precedência)
- `docker/production/config.d/` — só prod/homolog (ex.: autenticação gov.br/redes)
- `dev/` — ambiente de desenvolvimento (compose próprio; plugins/temas entram por bind-mount — adicionar plugin exige editar `dev/docker-compose.yml`)
- `docker-compose.{prod,homolog}.yml`, `dev/docker-compose.yml` — um compose por ambiente; scripts raiz (`start.sh`, `update.sh`, …) leem `ENV=$(cat environment)` para escolher
- `plugins/` — 17 submódulos git pinados por SHA + `SettingsPe` (código local)
- `themes/` — `MapasPE` (local, tema ativo) + `MapasMuseus` (submódulo; conf-base substituído no build por `docker/common/conf-base-museus.php`)
- `docker/overrides/` — legado Aldir Blanc, NÃO referenciado por nenhum build (inativo)
- `.github/workflows/ci.yml` — CI: build/push da imagem `hacklab/mapas-pe`

## 4. Regras invioláveis

- Nunca commitar o `.env` nem segredos (só `.env_sample` versiona o contrato).
- Nunca editar migrations já aplicadas (migrations rodam no boot — ADR-0004).
- Nunca descomentar o serviço `db` no compose de produção — o banco é externo (ADR-0004).
- Nunca editar o `conf-base.php` dentro do submódulo MapasMuseus — ele é sobrescrito no build por `docker/common/conf-base-museus.php` (ADR-0003).
- Nunca buildar sem submódulos inicializados (`git submodule update --init --recursive`) — pastas vazias falham silenciosamente.
- Nunca desativar checks de CI para fazer o build passar.

## 5. Convenções

As convenções vivem em `docs/reference/conventions/` (`code-style.md`, `git-workflow.md`, `api-design.md`). Leia antes de escrever código — este arquivo aponta, não duplica.

## 6. Workflow esperado

- Planeje antes de codar.
- Rode o build antes de declarar pronto (não há testes).
- Formato de commit e PR/MR conforme `docs/reference/conventions/git-workflow.md`.
- Consulte `docs/reference/jornadas.md` antes de alterar fluxos de usuário.

## 7. Ponteiros

- `docs/reference/prd.md` → produto e requisitos (fonte de verdade)
- `docs/reference/jornadas.md` → fluxos de usuário
- `docs/reference/arquitetura/INDEX.md` → fonte de verdade da arquitetura
  (índice roteador — carregue cada doc só quando relevante)
- `docs/reference/decisions/` → ADRs (registros de decisão técnica)
- `.agents/skills/` → catálogo de procedimentos sob demanda

## Skills — procedimentos sob demanda

Regras sempre ativas ficam neste arquivo; procedimentos vivem em
`.agents/skills/`. Um procedimento só vira skill quando é repetível,
multi-etapa ou de alto custo de erro — e não-óbvio (se qualquer agente acerta
sem orientação, não precisa de skill).

**Evolução contínua:** quando uma decisão consolidada ou padrão recorrente
emergir no dia a dia (ex.: arquitetura de módulos definida, convenção de
widgets estabilizada), proponha uma skill usando
`.agents/skills/exemplo-skill/SKILL.md` como formato — nunca crie sem
aprovação explícita.

## ADRs são imutáveis

Decisão nova = ADR novo em `docs/reference/decisions/` (sequência de 4
dígitos a partir do máximo existente), que referencia o substituído. Nunca
edite um ADR aceito; nunca renumere ADRs existentes. Formato:
`docs/reference/decisions/0000-template-adr.md`.
