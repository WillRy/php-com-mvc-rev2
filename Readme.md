# PHP com MVC - rev2

Projeto feito no curso "Curso PHP com MVC - rev2" da School Of Net.

## Proposta
Construir uma estrutura MVC com controle de rotas e injeção de dependências.

## Estrutura utilizada

A estrutura construida consiste em:

- src: Código do "core", como resolvedor de dependências, rotas e etc
- app: Aplicação(Models, Controllers e demais recursos)
- public/index.php: Front Controller(arquivo de inicialização) da request
- composer.json: autoload, dumps e dependências
- bootstrap.php: Inicializa toda a aplicação
- resolver.php: arquivo onde deve ser declarada classes complexas a serem injetadas(EX: PDO)

## Executar ambiente

- 1. Clonar o repositório

- 2. Subir o ambiente utilizando docker-compose:

```shell script
docker-compose up -d --build
```

* 3. Acessar a URL: http://localhost:8000