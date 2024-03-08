# car-project
This an a repository for a test where can you manage  data related to car, description, models, etc. Made it with Laravel &amp; Vuejs

## Contenido

API con Laravel para mostrar datos de carros y utilizar API de Google Maps:

- [PHP](https://www.php.net/manual/en/install.php)
- [Laravel](https://laravel.com/docs/10.x)
- [Composer] (https://getcomposer.org/download/)
- [Eloquent](https://laravel.com/docs/10.x/eloquent)
- [Vuejs](https://vuejs.org/)
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

# PRE INSTALL

Primero que nada, vamos a instalar php version 8.2, yo estoy utilizando Ubuntu, por lo que que con este comando me instalara php v8.2

```bash 
sudo apt install php8.2-cli -y
```

```bash
sudo apt-get install php-xml
```

verficiamos la instalacion con 

```bash
 php -v 
 ```

 # INSTALAR COMPOSER

 ```bash
 php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
 ```

 Para Utilizar Composer a nivel global 

 ```bash
sudo mv composer.phar /usr/local/bin/composer
```

Para comprobar instalacion

```bash
composer -V
```
# RUN DOCKER FOR MYSQL SERVICE AND ADMINER
**Antes de correr el comando es importante ya contar con el archivo .env configurado.

Instalar Docker and Docker Compose y levantar el contenedor con el comando

```bash
docker compose up --build
```

para comprobar que el servicio esta corriendo correctamente 

```bash
http://localhost:$LARAVEL_LOCAL_PORT
```

Adminer
```bash
http://localhost:8080
```

comprobar coneccion a la base de datos
Abrir Adminer
colocar server mysqldb que es donde se esta corriendo el servidor de mysql por parte de Docker.
colocar crdenciales y verificar coneccion


## CONSUMO DE LA API

