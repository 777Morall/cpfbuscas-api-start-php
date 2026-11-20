# API Start em PHP — Consulta simples de CNPJ e CEP

API Start em PHP: consulta simples de cnpj e cep, Bearer, JSON e limite de 20 req/min.

> **Conheça o CPF Buscas:** consulte os módulos disponíveis pelo painel ou integre seu sistema com a API. [Acesse cpfbuscas.net](https://cpfbuscas.net/?utm_source=github&utm_medium=readme&utm_campaign=exemplos_php), [compare os planos da API](https://cpfbuscas.net/api) e [crie sua conta](https://cpfbuscas.net/cadastro). Painel e API têm assinaturas separadas.

## O que este exemplo faz

Integração inicial em PHP com cURL, uma chamada por execução e tratamento dos códigos HTTP. Todos os planos de API oferecem os mesmos módulos; variam as cotas e o número de chaves. Este repositório destaca um modo de uso, sem restringir o catálogo por plano.

| Plano | Preço mensal | Limite compartilhado | Chaves ativas |
|---|---:|---:|---:|
| API Start | R$ 30,00 | 20 req/min | 1 |

## Executar com PHP 8.2 ou superior

Requer extensão cURL e acesso HTTPS. Não depende de Composer.

```bash
git clone https://github.com/777Morall/cpfbuscas-api-start-php.git
cd cpfbuscas-api-start-php
export CPFBUSCAS_TOKEN='SUA_CHAVE_DA_API_CPFBUSCAS'
php examples/consulta.php me
php examples/consulta.php cep cep=00000000
```

No PowerShell: `$env:CPFBUSCAS_TOKEN = 'SUA_CHAVE_DA_API_CPFBUSCAS'`, depois execute os mesmos comandos PHP. A chave é do CPF Buscas; o token do GitHub não autentica esta API. O arquivo .env.example é referência e não é carregado automaticamente. Substitua os documentos fictícios antes de consultar; os zeros podem gerar HTTP 422.

## Consulta CPF, CNPJ, CEP, telefone e RG em PHP

```bash
php examples/consulta.php cnpj cnpj=SEU_CNPJ
php examples/consulta.php cpf cpf=SEU_CPF
php examples/consulta.php cep cep=SEU_CEP
php examples/consulta.php telefone telefone=SEU_TELEFONE
php examples/consulta.php rg rg=SEU_RG
```

Use somente dados para os quais tenha autorização e finalidade legítima. A resposta JSON é exibida no terminal. Não há schema fixo presumido: os campos retornados variam por módulo e disponibilidade. Não salve respostas sensíveis em logs ou commits.

## Autenticação, limites e falhas

- Base: https://cpfbuscas.net/api/v1; Bearer no cabeçalho e Accept: application/json.
- O cliente espaça chamadas sequenciais a 20 req/min, com margem de 10 ms. É um limitador de um processo, não um limitador distribuído. Outras aplicações e chaves compartilham a cota; coordene-as em produção.
- HTTP 401: chave; 403: assinatura; 404: rota; 422: parâmetros; 429: aguarde; 503: indisponibilidade. Não há repetição automática. Retry-After é exposto se o servidor o enviar.
- A URL base usada é https://cpfbuscas.net/api/v1. Você pode configurá-la pela variável CPFBUSCAS_BASE_URL. Confira sua chave com o comando me. A configuração não altera a cota da conta.
- POST não deve ser repetido após timeout sem conferência. O catálogo registra o POST de placas conforme a query string documentada; o formato interno de placas não está detalhado, portanto não presumimos array ou separador.

## Verificação local

```bash
php tests/run.php
```

Os testes usam transporte simulado para autenticação, encoding, validação e erros HTTP. Não fazem consultas pagas. O workflow verifica PHP 8.2, 8.3 e 8.4.

## Referência dos módulos

[Lista de métodos e parâmetros](docs/endpoints.md), também disponível em catalog.json. O catálogo não garante respostas ou permissão para qualquer finalidade.

## Fontes e atualização

Conferido em **20/11/2026**: [documentação](https://cpfbuscas.net/api-docs), [planos da API](https://cpfbuscas.net/api) e [planos do painel](https://cpfbuscas.net/planos). Valores e limites podem mudar. Exemplos independentes; não afirmam vínculo oficial.

## Outros exemplos por plano

- [cpfbuscas-api-start-php](https://github.com/777Morall/cpfbuscas-api-start-php)
- [cpfbuscas-api-plus-php](https://github.com/777Morall/cpfbuscas-api-plus-php)
- [cpfbuscas-api-pro-php](https://github.com/777Morall/cpfbuscas-api-pro-php)
- [cpfbuscas-api-scale-php](https://github.com/777Morall/cpfbuscas-api-scale-php)
- [cpfbuscas-painel-start-guia-php](https://github.com/777Morall/cpfbuscas-painel-start-guia-php)
- [cpfbuscas-painel-pro-guia-php](https://github.com/777Morall/cpfbuscas-painel-pro-guia-php)
- [cpfbuscas-painel-elite-guia-php](https://github.com/777Morall/cpfbuscas-painel-elite-guia-php)

## Licença

MIT para o código deste exemplo. O serviço CPF Buscas e os dados retornados têm condições próprias.
