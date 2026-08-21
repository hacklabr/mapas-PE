# Runbook — Incidentes

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Desatualizado → corrigir ou marcar obsoleto, nunca deixar apodrecer.

## Propósito

Resposta a incidentes em produção.

## Modo manutenção ("em breve")

- Colocar em manutenção: configuração `offline.php` faz redirect para `/em-breve` (bypass por `?online=$OFFLINE_BYPASS`); stack alternativa em `docker-compose-embreve.yml`.
- <!-- TODO: preencher gatilhos de quando ativar o modo manutenção -->

## Procedimento

1. <!-- TODO: preencher triagem inicial (sintoma → serviço suspeito: nginx / app / redis / sessions / db externo / metabase) -->
2. Diagnóstico rápido: `./logs.sh` (app), `./bash.sh` (shell do container), `./psql.sh` (banco).
3. Se regressão de deploy → `rollback.md`.
4. <!-- TODO: preencher escalação e canais (quem acionar, Secult/hacklab) -->
5. <!-- TODO: preencher registro pós-incidente (onde documentar) -->
