# Init project
primero: es clonarlo ya sea por https o por ssh, el que más le guste

segundo: compilar el docker con `./start`, una vez levantado todo el proyecto, esto dejará de imprimir en la pantalla

tercero: para instalar las dependencias de php, entrar con `./webapp` que esto no es más que `docker-compose run --user=1000 web bash` pero el `./webapp` es mejor ya que se inicia con el comandante

cuarto: dentro del bash correr `./composer.phar install` y esto instalará todas las dependencias de php

quinto: para correr las migraciones, usar un `php artisan doctrine:migrations:migrate` dentro del bash

sexto: salir del bash con exit

septimo: listo, con `./start` ya inicia tu proyecto en `http://localhost`
