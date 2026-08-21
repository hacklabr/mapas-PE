# Índice de arquitetura — Mapa Cultural de Pernambuco

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: doc desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

| Documento | Conteúdo | Quando ler |
|---|---|---|
| `../architecture.md` | Arquitetura interna: serviços, plugins, temas, camadas de configuração, deploy, pinning, comandos reais | Antes de alterar regras de negócio, habilitar/desabilitar plugins ou mexer na estrutura de ambientes |
| `runbooks/deploy.md` | Como publicar uma versão (prod/homolog e dev) | Antes de qualquer deploy |
| `runbooks/rollback.md` | Como reverter uma versão | Quando um deploy falha ou introduz regressão |
| `runbooks/incidentes.md` | Resposta a incidentes em produção | Durante um incidente |
| `../decisions/` | ADRs — registros de decisão técnica | Antes de mudar uma decisão técnica |

## Regra de cabeçalho dos documentos

Todo documento de arquitetura carrega no topo: data de criação, campo
"última revisão" e a regra de obsolescência acima.
