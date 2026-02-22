<?php

use Charlie\Emploi\Controllers\PageController;
use Charlie\Emploi\Controllers\TacheController;

$page = new PageController();
$tache = new TacheController();

function getId(): int
{
    return (int) ($_GET['id'] ?? 0);
}

return [

    // Pages
    'GET /' => fn () => $page->home(),

    // Tâches
    'GET /taches' => fn () => $tache->index(),

    'GET /taches/pdf' => fn () => $tache->pdf(),

    'GET /taches/create' => fn () => $tache->create(),

    'POST /taches' => fn () => $tache->store(),
    'POST /taches/store' => fn () => $tache->store(),

    'GET /taches/show' => fn () => $tache->show(getId()),

    'GET /taches/edit' => fn () => $tache->edit(getId()),

    'POST /taches/update' => fn () => $tache->update(getId()),

    'POST /taches/delete' => fn () => $tache->delete(getId()),
];
