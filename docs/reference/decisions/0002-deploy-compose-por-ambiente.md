# ADR-0002 — Deploy docker-compose por ambiente selecionado por arquivo `environment`

> Status: **aceito** (2026-08-21) · Criado em: 2026-08-21

## Contexto

Mesmos serviços em dev/homolog/prod com diferenças pontuais (DB externo em prod, mailhog em homolog/dev).

## Decisão

Um compose por ambiente (`docker-compose.prod.yml`, `docker-compose.homolog.yml`, `dev/docker-compose.yml`) + scripts raiz que leem `ENV=$(cat environment)` e compõem `docker compose -f docker-compose.$ENV.yml` (`start.sh`, `stop.sh`, `update.sh`, `logs.sh`, `bash.sh`, `psql.sh`). CI publica a imagem `hacklab/mapas-pe` para tags/branches.

## Consequências

- ✅ Simples, sem orquestrador externo.
- ⚠️ O arquivo `environment` (conteúdo: `prod` ou `homolog`) é estado não versionado do servidor — sem ele os scripts falham.
- ⚠️ Sem healthcheck/rolling deploy (`update.sh` faz down/up).
