# PHP Laravel 9 API

Boilerplate com Laravel v9 para projetos de API

## Requisitos

- Docker v20+
- Docker Compsoe v2.4+
- Git

## Tecnologias

- PHP 8.1+
- PostgresSQL 15+
- Redis 7+
- Nginx 1.23+
- Laravel 9+

## Ambiente local

1. Clone o repositório para sua maquina

```bash
git clone git@github.com:marcelofabianov/lv9-api-consumers.git
```

2. Remova o diretório git do projeto

```bash
rm -rf .git && git init
```

3. Copie os arquivos de ambiente

```bash
cp docker/alias.sh . && cp docker/.env.example .env && cp docker/.env.testing . && cp docker/local/docker-compose.yml .
```

4. Carregue os alias para seu terminal

```bash
source alias.sh
```

5. Inicie os containers docker

```bash
lv.up
```

ou

```bash
docker compose up -d
```

6. Instalando vendors

```bash
lv.composer install
```

7Gere uma chave de criptografia do laravel

```bash
lv.art key:generate
```

8. Rode as migrations para banco de dados

```bash
lv.art migrate --seed
```

9. Gere as chaves de criptografia da API

```bash
lv.art passport:keys
```

## Executando 

Copie o bloco cURL abaixo para seu terminal editando "???" para os dados da saida do comando anterior da "seed".

```bash
curl --request POST \
  --url http://localhost:8004/oauth/token \
  --header 'Content-Type: application/json' \
  --header 'Accept: application/json' \
  --data '{
    "grant_type": "password",
    "client_id": "???",
    "client_secret": "???",
    "username": "???",
    "password": "password",
    "scope": "common"
}'
```

## Testes

Para rodar os testes

```bash
lv.test
```

### Ferramentas

Para rodar ferramentas estaticas para validar qualidade do codigo

```bash
lv.lint
```

e

```bash
lv.psalm
```
