<?php

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseManager;
use Mattsmithdev\PdoCrud\DatabaseTable;

use Itb\Product;

/**
 * Class ProductController
 * @package Itb
 */
class ProductController extends DatabaseTable
{

    /**
     * Adding a product to the database
     * that the admin has created
     * or updated
     */
    public function addChar()
    {
        $userChar = filter_input(INPUT_GET, 'userChar', FILTER_SANITIZE_STRING);
        $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_STRING);
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);



        require_once __DIR__ . '/../templates/UserChar.php';

    }
}