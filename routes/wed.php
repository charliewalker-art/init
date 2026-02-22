<?php

use Charlie\Emploi\Controllers\PageController;
use Charlie\Emploi\Controllers\TacheController;

return [
    'GET /' => function () {
        return (new PageController())->home();
    },
    'GET /taches' => function () {
        return (new TacheController())->index();
    },
    'GET /taches/create' => function () {
        return (new TacheController())->create();
    },
    'POST /taches/store' => function () {
        (new TacheController())->store();
    },
    'GET /taches/show' => function () {
        $id = (int) ($_GET['id'] ?? 0);
        return (new TacheController())->show($id);
    },
    'GET /taches/edit' => function () {
        $id = (int) ($_GET['id'] ?? 0);
        return (new TacheController())->edit($id);
    },
    'POST /taches/update' => function () {
        $id = (int) ($_GET['id'] ?? 0);
        (new TacheController())->update($id);
    },
    'POST /taches/delete' => function () {
        $id = (int) ($_GET['id'] ?? 0);
        (new TacheController())->delete($id);
    },
];
