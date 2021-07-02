# Crud de teste com Laravel + Vue
[Laravel](https://laravel.com)
[Vuejs](https://vuejs.org)

# Informações
Este projeto trata-se de um teste de nível feito com laravel e vue. O objetivo é desenolver um CRUD de produtos com os campos nome, marca, preço e quantidade em estoque.

# Pre-requisitos para rodar o projeto
Ao baixar o projeto, você terá de configurar o arquivo .env. Que fica na raiz do projeto.
```env
DB_CONNECTION=pgsql     # Serviço de banco de dados utilizado
DB_HOST=localhost       # Host padrão do serviço
DB_PORT=5432            # Porta utilizada pelo host
DB_DATABASE=crud-test   # Nome do banco de dados
DB_USERNAME=postgres    # Usuário de acesso
DB_PASSWORD=password    # Senha de acesso
```

Abra o seu terminal de preferência e mantenha na pasta raiz do projeto.Agora é a vez de executarmos as migrations. Uma configuração foi adicionada na migration para alimentar o banco com alguns dados randômicos.
```sh
php artisan migrate
```

Em seguida iremos instalar as dependências da aplicação executando o seguinte comando.
```sh
npm install
```
E o seguinte comando para gerarmos os arquivos do frontend.
```sh
npm run dev
```
Em seguida, basta executarmos nosso servidor php laravel e seguirmos para os testes.
```sh
php artisan serve
```
