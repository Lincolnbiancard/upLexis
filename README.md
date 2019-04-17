# upLexis
Api para consultar artigos em um blog

Passo a passo para rodar a api:

Após baixar o projeto esxecute os seguintes comandos no projeto:

1 - npm install

2 - composer update

3 - composer dump-autoload

4 - renomeie o arquivo .env.example para .env e coloque as credenciais do Banco de dados

5 - php artisan key:generate

6 - php artisan migrate // Criar as tabelas no banco de dados

7 - php artisan db:seed // Popula o banco de dados

Fim, depois disso é so fazer os testes.
