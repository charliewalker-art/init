<?php

namespace Charlie\Emploi\Controllers;

class PageController
{
    public function home(): string
    {
        ob_start();
        require __DIR__ . '/../Views/home.php';
        return ob_get_clean();
    }
}
