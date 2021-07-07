# Symfony Skeleton - WEB

## Start application in dev mode
start symfony php -S 127.0.0.1:8000 -t public

## Notes

requirements checker not working for me. I installed and used this:
wget https://get.symfony.com/cli/installer -O - | bash
then run symfony check:req

create skeleton with:  
composer create-project symfony/website-skeleton ./ "4.*"

nutzen, dafür braucht man keinen Server.

Dazu einfach in der .env die Zeile # DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"

auskommentieren und dann die datenbank createn

DI injection fäuft entweder per function parameter oder constructor parameter übergabe. Services sind per default singletons und werden beim ersten aufruf in einen container gepackt und einmalig initialisiert.

### Symfony Commands
Create controller

bin/console make:controller

Create Entity 

bin/console make:entity

create database with doctrine: bin/console doctrine:database:create

bin/console debug:container zum auflisten aller Services in der Applikation

Um die Services zu konfigurieren die im controller gebinded werden sollen gibt es die Datei services.yaml

$path = $this->getParameter('download_directory') // z.B. ../public/

return $this->file($path.'file.pdf')


### Twig
Loop in twig

{% for element in array %}

// Code here

{% endfor %}  

twig.yaml um globale Variablen zu deklarieren

### Nodejs support
npm init im Symfony root. Dann webpack-Encore --save-dev installieren Npm install --save jqueryrun
