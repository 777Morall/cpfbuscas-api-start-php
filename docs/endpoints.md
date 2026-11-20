# Catálogo de endpoints CPF Buscas

Métodos e parâmetros conferidos na [documentação oficial](https://cpfbuscas.net/api-docs) em 20/11/2026. Obrigatório aparece com **\***. Campos de resposta não são presumidos.

| Módulo | Método e caminho | Parâmetros |
|---|---|---|
| CPF | `GET /api/v1/query/cpf` | `cpf` **\*** |
| CNPJ | `GET /api/v1/query/cnpj` | `cnpj` **\*** |
| CNPJ por base | `GET /api/v1/query/cnpj_base` | `cnpj` **\*** |
| Nome | `GET /api/v1/query/nome` | `nome` **\***, `uf` |
| Telefone | `GET /api/v1/query/telefone` | `telefone` **\*** |
| RG | `GET /api/v1/query/rg` | `rg` **\*** |
| Título de eleitor | `GET /api/v1/query/titulo` | `titulo` **\*** |
| PIS | `GET /api/v1/query/pis` | `pis` **\*** |
| NIS | `GET /api/v1/query/nis` | `nis` **\*** |
| CNH | `GET /api/v1/query/cnh` | `cpf` **\*** |
| Parentes | `GET /api/v1/query/parentes` | `cpf` **\*** |
| Vizinhos | `GET /api/v1/query/vizinhos` | `cpf` **\*** |
| CEP | `GET /api/v1/query/cep` | `cep` **\*** |
| CEP emails | `GET /api/v1/query/cep2` | `cep` **\*** |
| CEP telefones | `GET /api/v1/query/cep3` | `cep` **\*** |
| CEP + nome | `GET /api/v1/query/cep4` | `cep` **\***, `nome`, `limit` |
| Endereço | `GET /api/v1/query/endereco` | `uf` **\***, `logradouro` **\***, `cidade`, `limit` |
| Estado | `GET /api/v1/query/estado` | `uf` **\*** |
| Nome base 2 | `GET /api/v1/query/nome2` | `nome` **\*** |
| Nome + CPF parcial | `GET /api/v1/query/nome3` | `nome` **\***, `cpf`, `cpf_meio`, `limit` |
| Nome + cidade | `GET /api/v1/query/nome4` | `nome` **\***, `cidade` **\***, `limit` |
| Nome + ano | `GET /api/v1/query/nome5` | `nome` **\***, `ano` **\***, `limit` |
| Nome + filiação e nascimento | `GET /api/v1/query/nome6` | `nome` **\***, `mae`, `nasc` |
| Busca pelo nome da mãe | `GET /api/v1/query/mae` | `mae` **\***, `limit` |
| Email | `GET /api/v1/query/email` | `email` **\*** |
| Telefones por DDD | `GET /api/v1/query/telefone_ddd` | `ddd` **\*** |
| Telefone completo | `GET /api/v1/query/telefone_full` | `phone` **\*** |
| Telefones por CPF | `GET /api/v1/query/telefone_cpf` | `cpf` **\*** |
| Operadora | `GET /api/v1/query/operadora` | `telefone` **\*** |
| Score | `GET /api/v1/query/score` | `cpf` **\*** |
| Renda | `GET /api/v1/query/renda` | `uf`, `sexo`, `idade_min`, `idade_max`, `min`, `max`, `limit` |
| Busca por filtros | `GET /api/v1/query/gerador` | `uf`, `sexo`, `idade_min`, `idade_max`, `renda_min`, `renda_max`, `limit`, `format`, `raw`, `cursor` |
| CBO | `GET /api/v1/query/cbo` | `cbo` **\*** |
| Profissão | `GET /api/v1/query/profissao` | `profissao` **\*** |
| BIN | `GET /api/v1/query/bin` | `bin` **\*** |
| Banco | `GET /api/v1/query/banco` | `codigo` **\*** |
| Foto geral | `GET /api/v1/query/foto` | `cpf` **\*** |
| Foto SP | `GET /api/v1/query/foto_sp` | `cpf` **\*** |
| Foto MA | `GET /api/v1/query/foto_ma` | `cpf` **\*** |
| Foto RO | `GET /api/v1/query/foto_ro` | `cpf` **\*** |
| Foto todas as bases | `GET /api/v1/query/foto_all` | `cpf` **\*** |
| Placa | `GET /api/v1/query/placa` | `placa` **\*** |
| Pessoa aleatória | `GET /api/v1/query/random` | `uf` |
| Profissionais | `GET /api/v1/query/profissionais` | `nome`, `email`, `profissao`, `limit` |
| Busca de veículos | `GET /api/v1/query/veiculos_busca` | `marca`, `uf`, `ano_min`, `ano_max`, `modelo`, `limit` |
| Consulta em lote por placas | `POST /api/v1/query/veiculos_placamassa` | `placas` **\*** |
| Veículos por CPF | `GET /api/v1/query/veiculos_cpf` | `cpf` **\*** |
| Empresas por CPF | `GET /api/v1/query/empresas_cpf` | `cpf` **\*** |
| Universitários | `GET /api/v1/query/universitarios` | `nome` **\*** |
| Processos judiciais | `GET /api/v1/query/processos` | `cpf` **\*** |
| Sanções e cadastros públicos | `GET /api/v1/query/sancoes` | `cpf` **\*** |
| Reconhecimento de alvo | `GET /api/v1/query/osint_recon` | `alvo` **\*** |
| Busca por email | `GET /api/v1/query/osint_vazamentos` | `email` **\*** |
| Busca avançada | `GET /api/v1/query/osint_dorks` | `termo` **\*** |
| Busca de rede Wi-Fi | `GET /api/v1/query/osint_wifi` | `bssid`, `termo` |
| Busca de leads | `GET /api/v1/query/osint_leads` | `q` **\*** |
| Permutação de nomes | `GET /api/v1/query/osint_permutar` | `nome` **\***, `dominio` |
| Inteligência de IP | `GET /api/v1/query/osint_ipintel` | `ip` **\*** |
| Busca por usuário social | `GET /api/v1/query/osint_insta` | `username` **\*** |
| Busca por usuário de música | `GET /api/v1/query/osint_spotify` | `q` **\*** |
| Busca por email | `GET /api/v1/query/osint_google` | `email` **\*** |
| Geo | `GET /api/v1/query/geo` | `cep` **\***, `limit` |
