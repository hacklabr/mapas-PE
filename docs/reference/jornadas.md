# Jornadas de uso — Mapa Cultural de Pernambuco

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Documento vivo (classe REFERENCE): jornadas dos usuários como são hoje. Desatualizado → corrigir ou marcar obsoleto.
> Fonte: análise do legado (J12 STAGE 4) — jornadas evidentes, inferidas de configuração; as rodadas do fluxo refinam.

## Cidadão / agente cultural (proponente)

1. **Descoberta:** busca eventos/espaços no mapa e por filtros; acessa painéis públicos de dados.
2. **Cadastro:** cria conta via gov.br (ou e-mail), aceita os 3 termos LGPD, recebe selo de autenticação gov.br.
3. **Atuação:** cria seu agente (individual/coletivo), define área e subárea de atuação; cadastra espaço e publica eventos com geolocalização.
4. **Inscrição em edital:** preenche formulário incluindo dados bancários (banco, agência, conta, tipo PF/PJ); anexa documentos; acompanha status.
5. **Recurso:** se indeferido, submete recurso pelo formulário de reclamação (ClaimForm); em caso de aprovação, recebe pagamento via arquivo CNAB240 (BB).

## Avaliador de oportunidades (valuers)

1. É atribuído a uma oportunidade pela gestão (ValuersManagement).
2. Avalia inscrições atribuídas (notas/parecer) dentro do prazo.
3. Acompanha consolidação de resultados.

## Gestor de oportunidade (Secult/Fundarpe)

1. Cria oportunidade/edital, configura formulário de inscrição e fases.
2. Configura avaliadores e comitês; executa sorteio de comissão (CommitteeDraw) quando aplicável.
3. Exporta arquivo CNAB240 por oportunidade para pagamento dos contemplados (RegistrationPayments).
4. Consulta painéis de BI (oportunidades, inscritos, perfil demográfico) no Metabase.

## Museu / instituição cultural

1. Acessa museusdepernambuco.pe.gov.br e cria conta.
2. Cadastra o museu (capacidade, horário, endereço no município de PE).
3. Candidata-se ao reconhecimento como Ponto de Memória (selo 27).

## Administrador da plataforma (suporte/infra)

1. Atende usuário via WhatsApp/contato; usa AdminLoginAsUser para reproduzir problema.
2. Auditora alterações suspeitas (MapasBlame); modera spam (SpamDetector).
3. Consolida contas duplicadas (AccountConsolidator) respeitando exclusões.
4. Opera deploy: update.sh, logs.sh, modo manutenção "em breve", renovação TLS, backups.

## Notas de jornada

<!-- Observações de uso real registradas nas rodadas do fluxo -->
