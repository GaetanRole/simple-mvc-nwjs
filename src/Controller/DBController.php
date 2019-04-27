<?php

namespace App\Controller;

use App\Model\DBEntity;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Manage DB entity with its CRUD.
 * @author   Gaëtan Role-Dubruille <gaetan.role@gmail.com>
 */
class DBController extends AbstractController
{
    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function indexAction(string $databaseName): string
    {
        $dbManager = new DBEntity($databaseName);
        $tables = $dbManager ? $dbManager->showTables() : null;

        return $this->_twig->render(
            'DB/index.html.twig', array(
                'tables' => $tables,
                'dbName' => $databaseName
            )
        );
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showAction(string $id): string
    {
        return $this->_twig->render(
            'DBEntity/show.html.twig',
            ['db' => 'DBEntity number ' . $id]
        );
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function editAction(string $id): string
    {
        return $this->_twig->render(
            'DBEntity/edit.html.twig',
            ['db' => 'DBEntity number ' . $id]
        );
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function addAction(): string
    {
        return $this->_twig->render(
            'DBEntity/add.html.twig',
            ['db' => 'Create new DBEntity']
        );
    }
}
