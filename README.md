# Crud de teste com Laravel + Vue
[Laravel](https://laravel.com)
[Vuejs](https://vuejs.org)

# Informações
Este projeto trata-se de um teste técnico feito com laravel e vue. Cujo objetivo é desenolver um CRUD de produtos com os campos nome, marca, preço e quantidade em estoque.

# Pre-requisitos para rodar o projeto
Ao baixar o projeto, você terá de configurar o arquivo .env. Que fica na raiz do projeto. Adicionando as informações de um banco de dados.
```env
DB_CONNECTION=pgsql     # Serviço de banco de dados utilizado
DB_HOST=localhost       # Host padrão do serviço
DB_PORT=5432            # Porta utilizada pelo host
DB_DATABASE=crud-test   # Nome do banco de dados
DB_USERNAME=postgres    # Usuário de acesso
DB_PASSWORD=password    # Senha de acesso
```

Abra o seu terminal de preferência e mantenha na pasta raiz do projeto. Agora é a vez de executarmos as migrations. Uma configuração foi adicionada na migration para alimentar o banco com alguns dados randômicos.
```sh
php artisan migrate
```

Iremos instalar as dependências da aplicação executando o seguinte comando.
```sh
npm install
```
E em seguida.
```sh
npm run dev
```
Finalizando, basta executarmos nosso servidor php laravel e seguirmos para os testes.
```sh
php artisan serve
```
# Imagens do projeto
## Tela de listagem dos produtos
![image](https://user-images.githubusercontent.com/16859195/124271615-0da9e900-db14-11eb-97a7-4f4924e9f1f9.png)
## Tela de edição de um produto 
![image](https://user-images.githubusercontent.com/16859195/124271670-1d293200-db14-11eb-8171-87df188da4f7.png)
## Tela de criação de um produto
![image](https://user-images.githubusercontent.com/16859195/124271706-2a462100-db14-11eb-8932-3cc4c1409d50.png)

