<?php

namespace Charlie\Emploi\Models;

use Charlie\Emploi\Database\Connection;
use PDO;

class Tache
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getPdo();
    }

    public function all(): array
    {
        $stmt = $this->pdo->query('SELECT id, titre, description, created_at, updated_at FROM taches ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT id, titre, description, created_at, updated_at FROM taches WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function create(string $titre, string $description): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO taches (titre, description) VALUES (:titre, :description)');
        $stmt->execute([
            'titre' => trim($titre),
            'description' => trim($description),
        ]);
    }

    public function update(int $id, string $titre, string $description): bool
    {
        $stmt = $this->pdo->prepare('UPDATE taches SET titre = :titre, description = :description WHERE id = :id');
        $stmt->execute([
            'id' => $id,
            'titre' => trim($titre),
            'description' => trim($description),
        ]);

        return $stmt->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM taches WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() > 0;
    }
}
