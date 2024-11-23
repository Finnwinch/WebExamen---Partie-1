# webExamen - Partie 1

## Description
WebExamen est une plateforme en ligne conçue pour permettre aux étudiants de passer leurs examens en toute sécurité et simplicité. Notre mission est de fournir un espace sécurisé et convivial pour que chaque étudiant puisse démontrer ses compétences sans contraintes techniques.

Avec WebExamen version 1, vous pouvez :

Crée des questions pour vos futurs examens

## Installation

Faites glisser et déposez le dossier du projet.

### Accès par défaut 

nom d'utilisateur : `admin`

mot de passe : `admin`

### Required

environnement PHP 8.$

driver SQLITE pour php

#### php.init

extension_dir = "$chemin des bibliothèques de php"

extension=pdo_sqlite

extension=sqlite3

#### update path of database
Dans `controller/DatabaseHelper.php`, changez `$pathProject` par le chemin de la base de données.

#### run project
À la racine du projet, exécutez : `php -S localhost:8000`

## Usage
Uniquement dans un contexte éducatif : sécurité informatique des logiciels.

Site déployé également : https://tp.wortoone.ca/

## Contributeurs
Léo Cirpaci : création du projet et sécurisation

Matthew Sabourin : sécurisation

Hanane Houmani : sécurisation - supervision

## License
WebExamen-v1 © 2024 par Léo Cirpaci est sous licence CC BY-NC-ND 4.0.
