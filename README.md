# CRUD operations with Neo4j as Database

* clone repository and cd to it
* ``` cp .env.example .env ```
* put your neo4j connection  [DB_PORT=7687] defualt BOLT
* ``` composer install ```
* ``` npm install && npm run dev ```
* ``` php artisan key:generate ```
* ``` php artisan serve ```

open ``` localhost:8000/ ```
you can chnage between ``` Eloquent Repository ``` and ``` Cypher Repository ``` from providers/RepositoryServiceProvider
