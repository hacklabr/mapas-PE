# PRD vivo — Mapa Cultural de Pernambuco

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Documento vivo (classe REFERENCE): descreve o produto como ele é hoje. Desatualizado → corrigir ou marcar obsoleto, nunca deixar apodrecer.
> Fonte: análise do legado (J12 STAGE 4) — requisitos EVIDENTES, inferidos de configuração e plugins habilitados; as rodadas do fluxo refinam.

## Visão do produto

Plataforma livre, gratuita e colaborativa de mapeamento cultural da Secult-PE + Fundarpe (descrição oficial em `docker/common/config.d/0.main.php:19`): cadastro e descoberta de agentes, espaços, eventos, projetos e oportunidades (editais), com geolocalização. Inclui o produto irmão **Museus de Pernambuco** (mesma instância, domínio próprio) para cadastro/mapeamento de museus e Pontos de Memória (`docker/common/conf-base-museus.php`).

## Requisitos funcionais evidentes (com evidência)

- CRUD das entidades do núcleo Mapas Culturais: agentes, espaços, eventos, projetos, oportunidades, selos, subsites, notificações.
- Cadastro/login com múltiplas estratégias: **gov.br** (SSO oficial, selo automático applySealId=2, espelhamento de nome/CPF/e-mail/telefone — `plugins.php:1631-1652`), e-mail/senha local, Facebook, LinkedIn, Google, Twitter (`docker/production/config.d/authentication.php`).
- Inscrições em oportunidades/editais com formulários configuráveis e campos bancários para pagamento (RegistrationPayments com exportação CNAB240 Banco do Brasil — `plugins.php:19-23,39+`).
- Avaliação de inscrições com gestão de avaliadores (ValuersManagement) e sorteio de comissão (CommitteeDraw).
- Recurso administrativo às decisões de inscrição (ClaimForm).
- Consolidação de contas duplicadas com lista de exclusão e canal de suporte via WhatsApp (AccountConsolidator — `plugins.php:13-16`).
- Suporte: login de admin como usuário (AdminLoginAsUser), auditoria de alterações (MapasBlame), formulário de contato (FormCommunication → contato.mapacultural@secult.pe.gov.br).
- Moderação (SpamDetector), acessibilidade (Accessibility), banners de home (HomeHeaderBanners), telemetria (Analytics) e dashboards públicos de BI (Metabase; atalhos "paineis-de-dados" em `routes.php`).
- Busca geográfica com hierarquia país→estado→mesorregião→RD→microrregião→município (`0.main.php:35-42`) e criação de divisões geográficas (CreateGeoDivisions).
- Segundo produto Museus: cadastro de museus, selo Ponto de Memória, busca por município de PE, com projetos/eventos/oportunidades desabilitados (`conf-base-museus.php:58-63`).
- Modo manutenção "em breve" com bypass por senha (`offline.php`).

## Requisitos não funcionais evidentes

- **LGPD**: aceite explícito de Termos de Uso, Política de Privacidade e Autorização de Uso de Imagem (`lgpd.php` + `lgpd-terms/*.html`).
- Proteção anti-spam/bot: Google reCAPTCHA (`.env_sample:23-24`); rate limit referenciado no nginx (comentado).
- Segredos fora do controle de versão (`.env` via env_file).
- Sessões distribuídas em Redis dedicado com persistência; cache LRU.
- Ambientes isolados (dev/homolog/prod) com e-mail não destrutivo em dev/homolog (mailhog + MAILER_ALWAYSTO).
- Rastreabilidade/auditoria de alterações (MapasBlame).
- Disponibilidade: `restart: unless-stopped` em todos os serviços; backup diário de dump + `docker-data/{public,private,saas}-files` (README).

## Fora de escopo

- Desenvolvimento do core Mapas Culturais — acontece upstream (imagem `hacklab/mapasculturais`); este repositório integra e versiona peças.
- Manutenção dos plugins upstream (mapasculturais/*) — aqui apenas pinamos versões e configuramos.
