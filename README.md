# sdlp-projet

# configutation
- Symfony 7
- php 8.2
- bdd : MySql

# Installation
```composer install```
```
-> php bin/console doctrine:database:create
-> php bin/console make:migration
-> php bin/console doctrine:migrations:migrate
```
## fixture
```
-> php bin/console doctrine:fixtures:load
```

## fichier .env
id: root
pwd: aucun
bdd: sdlp

## test session
```
mail: test_user@gmail.com
mot de passe: test_user

mail: test_admin@gmail.com
mot de passe: test_admin
```


# option de l'application

-> lorsque l'utilisateur est connecté comme "user" il peut aller sur la page "/user"

-> lorsque l'utilisateur est connecté comme "admin", il peut aller sur les pages "/admin" et "/user"

-> Si l'utilisateur n'est pas connecté, il ne peut pas aller sur les deux pages mentionnées précédement 

-> Si la page n'existe pas ou n'a pas les droits: il tombera sur un page personalisée
