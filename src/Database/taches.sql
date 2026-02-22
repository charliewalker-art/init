-- Script SQL MySQL pour le module Taches
-- Import: mysql -u root -p < src/Database/taches.sql

CREATE DATABASE IF NOT EXISTS emploi
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE emploi;

CREATE TABLE IF NOT EXISTS taches (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE INDEX idx_taches_created_at ON taches (created_at);
