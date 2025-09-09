# TransferLight

Uma **plataforma de vagas exclusiva para Transferências de valores**. 

## Stack utilizada

**Front-end:** Livewire, alpineJS, TailwindCSS

**Back-end:** PHP, Laravel, Mysql


## Funcionalidades para candidato

- Cadastro/login
- Registro de usuários e lojistas
- Trânsferência de valores

## Instalação e Execução

Clone este repositório:

```bash
    git clone https://github.com/SeuUsuario/TransferLight.git
```

Configure seu .env:

```bash
    cp .env.example .env
```

Instale as bibliotecas:

```bash
    composer install && npm install
```

Crie o banco de dados de exemplo (SQLITE):

```bash
    composer create-test-database
```

Execute as migrations:

```bash
    php artisan migrate
```

Execute os seeders:

```bash
    php artisan db:seed
```

Execute os testes:

```bash
    php artisan test
```

Rode os servidores:

```bash
    php artisan serve & npm run dev
```

Acesse o sistema:

```bash
    http://localhost:8000
```



