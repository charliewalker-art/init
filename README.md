# Emploi - Mini MVC PHP (CRUD Taches)

Ce projet est une application PHP simple, structuree en architecture MVC minimale, avec un CRUD complet pour les taches.

## Fonctionnalites

- Page d'accueil (`/`)
- CRUD Taches:
  - Ajouter une tache
  - Afficher la liste des taches
  - Afficher une tache
  - Modifier une tache
  - Supprimer une tache
- Assets separes (`HTML`, `CSS`, `JS`)
- Autoload PSR-4 via Composer

## Structure des dossiers

- `public/`
  - `index.php`: Front controller (point d'entree)
  - `assets/css/`: styles CSS
  - `assets/js/`: scripts JavaScript
- `routes/`
  - `wed.php`: declaration des routes (`GET` / `POST`)
- `src/`
  - `Controllers/`: logique des pages et actions
  - `Models/`: acces aux donnees (ex: `Tache.php`)
  - `Views/`: vues HTML/PHP
  - `Database/`: connexion et scripts SQL
- `config/`
  - `database.php`: configuration MySQL
- `vendor/`
  - dependances Composer + autoload
- `composer.json`

## Routes principales

- `GET /` -> accueil
- `GET /taches` -> liste des taches
- `GET /taches/pdf` -> generer un PDF de la liste des taches
- `GET /taches/create` -> formulaire d'ajout
- `POST /taches/store` -> enregistrer une tache
- `GET /taches/show?id=1` -> afficher une tache
- `GET /taches/edit?id=1` -> formulaire de modification
- `POST /taches/update?id=1` -> mettre a jour
- `POST /taches/delete?id=1` -> supprimer

## Installation

1. Installer les dependances:

```bash
composer install
```

2. Configurer votre serveur web pour pointer sur le dossier `public/`.
3. Ouvrir l'application dans le navigateur.

## Base de donnees (SQL)

Un script SQL est fourni dans:

- `src/Database/taches.sql`

Ce script cree la base `emploi` et la table `taches`.

## Configuration MySQL (.env)

1. Copier `.env.example` vers `.env` (deja cree dans ce projet).
2. Modifier les variables:

```env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=emploi
DB_USER=root
DB_PASS=
DB_CHARSET=utf8mb4
```

Le fichier `config/database.php` lit automatiquement ces valeurs.

Ensuite importer le SQL:

```bash
mysql -u root -p < src/Database/taches.sql
```

## Etat actuel des donnees

Le CRUD `Tache` utilise maintenant MySQL via PDO (`src/Database/Connection.php`).
