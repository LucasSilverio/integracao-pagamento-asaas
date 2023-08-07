
# Integração Asaas
Esta é uma aplicação Laravel para fins de avaliação com a Perfect Pay.

![image](https://github.com/LucasSilverio/integracao-pagamento-asaas/assets/33558800/0f13d2a1-01f5-42fe-9beb-8580807f33f8)

![image](https://github.com/LucasSilverio/integracao-pagamento-asaas/assets/33558800/923d8247-40de-41a7-b271-0248e5303936)


## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/LucasSilverio/integracao-pagamento-asaas.git
```

Entre no diretório do projeto

```bash
  cd integracao-pagamento-asaas
```

Crie o arquivo .env

```bash
  cp .env.example .env
```

Informe o DB_USERNAME e DB_PASSWORD do banco no arquivo .env

Informe a sua API_KEY em ASAAS_KEY no arquivo .env

Inicie o container docker

```bash
  docker-compose up -d 
```

Acesse o container

```bash
  docker-compose exec app-perfect-pay bash
```

Rode o comando 
```bash
  composer install
```

Gere a Key
```bash
  php artisan key:generate
```

Crie as tabelas
```bash
  php artisan migrate
```

## Acessando a aplicação
No seu navegador preferido, digite: http://localhost:8888

## Executar os Testes
No terminal
```bash
  php artisan test
```

## Stack utilizada

**Front-end:** Tailwind, Alpinejs

**Back-end:** Laravel 10, Mysql 5.7, Docker



