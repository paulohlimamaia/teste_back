# Backend - Estoque

Api do projeto Estoque criado em [Laravel 5.7](https://laravel.com/). Desenvolvido por Paulo Henrique.

## Pré requisitos:

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension
- Docker >= 18.06.1-ce

## Navegadores
* Chrome, Firefox, Safari, Edge, IE11+

## Instalação

Para instalar a Api do projeto basta seguir os passos abaixo:

```
# clone o repositorio
$ git clone git@github.com:paulohlimamaia/teste_back.git estoque-backend

# Entre no repositório criado e crie o docker-compose.yml. Já existe um modelo (docker-compose.default.yml):
$ cd estoque-backend
$ sudo cp docker-compose.default.yml docker-compose.yml
$ sudo cp .env.example .env

# Crie a imagem e o container da Api e instale as dependencias.
$ composer install
$ sudo docker build -t estoque-backend .
$ sudo docker-compose up -d
$ sudo docker-compose exec estoque-backend chmod 777 -R vendor

# Execute o comando abaixo para configurar a Api.
$ sudo docker-compose exec estoque-backend php artisan migrate 
$ sudo docker-compose exec estoque-backend php artisan key:generate
$ sudo docker-compose exec estoque-backend php artisan config:cache

# Após a configuração basta acessar a Api.
$ http://localhost:8000
