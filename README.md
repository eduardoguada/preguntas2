<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Desarrollo de una API de consulta de datos de Stack Overflow</h1>
    <br>
</p>

El desarrollo de la API para a consulta fue realizada con el framework Yii 2 y MySQL.

La estructura del proyecto es la basica del un proyeto en Yii

      assets/            
      commands/           
      config/             
      controllers/        
      mail/               
      models/             
      runtime/            
      tests/              
      vendor/             
      views/   


En la config esta la el archivo "db.php" donde esta la configuración de la base de datos, tambien se encuentra el archivo "web.php" con la ruta del proyecto
En controllers se encuetra el archivo StackOverflowController.php y DbTestController.php es un pequeño controlador para validar que realmente el proyecto se estaba conectado a la base de datos a modo de prueba.
En models esta el archivo StackOverflowQuestions.php para interactuar con la base de datos. 	

Mysql tiene como clave de root “qwerty”, la base de datos se llama “preguntas”, con una tabla llamada “stack_overflow_question” con 4 campos:
id : tipo entero, auto incrementable y llave primaria.
Query: tipo texto ( la consulta realizada a la API).
Response: Tipo texto ( respuesta tipo JSON).
created_at: Tipo TIMESTAMP (fecha de creación)).

La api se puede hacer desde la terminal: “php yii serve”

Un ejemplo de para la llamada de la api. 	

http://localhost:8080/stack-overflow/questions?tagged=php&todate=2024-04-01&fromdate=2024-01-01





REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.4.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](https://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

