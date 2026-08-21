# ADR-0004 — Banco de dados externo em produção; migrations no boot do container

> Status: **aceito** (2026-08-21) · Criado em: 2026-08-21

## Contexto

Produção usa DB gerenciado fora do compose; homolog/dev sobem PostGIS no compose.

## Decisão

Serviço `db` comentado em `docker-compose.prod.yml:71-80` (credenciais via `.env` → `doctrine.database`). O `docker/entrypoint.sh` roda `db-update.sh` + `mc-db-updates.sh` em todo boot e recompila SASS/proxies quando `version.txt` muda.

## Consequências

- ✅ Backups/upgrade de PostgreSQL gerenciados fora do Docker.
- ⚠️ Cada restart executa migrations (risco em rollback de app sem rollback de schema).
- ⚠️ Divergência de versões PostGIS entre ambientes (15-master homolog, 14 dev, externo prod) exige vigilância.
