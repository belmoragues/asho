# Titanic

Esta aplicación consiste en dos páginas: 

# Main page image

La página principal permite el redirect a la página de visualización de datos. 

<div align="center">
    <img src="frontend/static/main.PNG" alt="Data page" width="400" />
</div>

# Data page image

Esta página consiste en la visualización de datos a través de indicadores y gráficos. 

<div align="center">
    <img src="frontend/static/data.PNG" alt="Data page" width="400" />
</div>

# set up

Para poder ejecutar la aplicación se deben realizar los pasos descritos en los siguientes apartados.

# backend

```bash

## execute in cd/titanic

# Install symfony and PHP

https://symfony.com/doc/current/setup.html

# execute

$ composer install

$ yarn install

# doctrine database

php bin/console doctrine:database:create

php bin/console doctrine:migrations:migrate

php bin/console load_titanic_data

$ symfony serve:start


```

# frontend

```bash

## execute in cd/frontend

# install dependencies
$ yarn install

# serve with hot reload at localhost:3000
$ yarn dev

```
