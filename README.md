# Solução do desafio de REST API.

## Instruções

### Para rodar, usar os seguintes comandos no terminal: 

composer update;
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider";
php artisan migrate:fresh;
php artisan db:seed; 
php artisan serve;

### Atenção

##### O banco de dados MySQL foi utilizado de forma remota através do serviço remotemysql.com, entretanto as migrations e seeds populam o banco utilizando o comando acima.

##### Todas as requisições POST devem ser feitas usando o tipo Form Data. 

##### Além disso, caso deseje realizar atualização de registros, deve-se enviar uma requisição POST com o campo '\_method' em 'PUT' ou 'PATCH'

##### Todas as rotas estão protegidas pela autenticação JWT, com exceção das rotas de login (/api/auth/login - POST) e criar usuário (/api/users/register - POST).


#### Registrando usuários

Enviar requisição POST para a rota /api/users/register com os dados email, name e password

#### Realizando login

Enviar requisição POST para a rota /api/auth/login com os dados email e password. Após receber o token de autenticação JWT, todas as requisições devem ser feitas enviando no head o parâmetro 'Authorization' => 'bearer $TOKEN_RECEBIDO'

#### Acessando rotas

##### CRUD Clientes

As requisições para CRUD de clientes devem ser feitas para as rotas

recuperar todos: GET(/api/clientes)
recuperar unico: GET(/api/clientes/id)

registrar novo: POST(/api/clientes) -> dados: name, email e password

atualizar registro: PUT(/api/clientes/id)
deletar registro: DELETE (/api/clientes/id)

##### CRUD Eventos

As requisições para CRUD de eventos devem ser feitas para as rotas

recuperar todos: GET(/api/eventos)
recuperar unico: GET(/api/eventos/id)

registrar novo: POST(/api/eventos)  -> dados: cidade, data e categoria

atualizar registro: PUT(/api/eventos/id)
deletar registro: DELETE (/api/eventos/id)

##### CRUD Ingressos

As requisições para CRUD de ingressos devem ser feitas para as rotas

recuperar todos: GET(/api/ingressos)
recuperar unico: GET(/api/ingressos/id)

registrar novo: POST(/api/ingressos) -> dados: evento_id, tipo_ingresso_id (1: inteira, 2: meia, 3: gratuidade), zona, cadeira e preço

atualizar registro: PUT(/api/ingressos/id)
deletar registro: DELETE (/api/ingressos/id)

###### Relacionamento Ingressos / Eventos

 As rotas /api/ingressos/cidades/{cidade} e /api/ingressos/categorias/{cidade} retornam ingressos disponíveis para os parametros fornecidos.

 Para melhorar a utilização de banda, essas rotas fornecem o evento, e os ingressos dentro de cada evento, apesar de ser uma rota de ingressos.


 #### Exemplos

 Para registrar um cliente: POST /api/clientes com dados ['email' => 'teste@teste.com', 'nome' => 'teste', 'cpf' => '12345678900'];
 Para recuperar clientes: GET /api/clientes;
 Para recuperar um cliente: GET /api/clientes/{id};


 Para registrar um evento: POST /api/eventos com dados ['cidade' => 'natal', 'categoria' => 'futebol', 'data' => '2019-06-20']
 Para recuperar eventos: GET /api/eventos;
 Para recuperar um evento: GET /api/eventos/{id};

Para registrar um ingresso: POST /api/ingressos com dados ['evento_id' => '1', 'tipo_ingresso_id' => '1', 'zona' => 'camarote', 'cadeira' => '1', 'preco' => '100'];
Para recuperar ingressos: GET /api/ingressos;
Para recuperar um ingresso: GET /api/ingressos/{id};

Para ver os ingressos em uma determinada cidade: GET /api/ingressos/cidade/{cidade};
Para ver os ingressos em uma determinada categoria: GET /api/ingressos/categorias/{categoria};