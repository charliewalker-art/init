<?php

namespace Charlie\Emploi\Controllers;

use Charlie\Emploi\Models\Tache;

class TacheController
{
    private Tache $tacheModel;

    public function __construct()
    {
        $this->tacheModel = new Tache();
    }

    public function index(): string
    {
        $taches = $this->tacheModel->all();
        return $this->render('taches/index', ['taches' => $taches]);
    }

    public function create(): string
    {
        return $this->render('taches/create');
    }

    public function store(): void
    {
        $titre = trim($_POST['titre'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if ($titre === '') {
            $this->redirect('/taches/create?error=titre');
        }

        $this->tacheModel->create($titre, $description);
        $this->redirect('/taches');
    }

    public function show(int $id): string
    {
        $tache = $this->tacheModel->find($id);
        if (!$tache) {
            http_response_code(404);
            return 'Tache introuvable';
        }

        return $this->render('taches/show', ['tache' => $tache]);
    }

    public function edit(int $id): string
    {
        $tache = $this->tacheModel->find($id);
        if (!$tache) {
            http_response_code(404);
            return 'Tache introuvable';
        }

        return $this->render('taches/edit', ['tache' => $tache]);
    }

    public function update(int $id): void
    {
        $titre = trim($_POST['titre'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if ($titre === '') {
            $this->redirect('/taches/edit?id=' . $id . '&error=titre');
        }

        $this->tacheModel->update($id, $titre, $description);
        $this->redirect('/taches');
    }

    public function delete(int $id): void
    {
        $this->tacheModel->delete($id);
        $this->redirect('/taches');
    }

    private function render(string $view, array $data = []): string
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../Views/' . $view . '.php';
        return ob_get_clean();
    }

    private function redirect(string $path): void
    {
        header('Location: ' . $path);
        exit;
    }
}
