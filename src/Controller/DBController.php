<?php
/**
 * Manage DB entity with its CRUD.
 *
 * @category PHP_7.1
 * @package  Controller
 * @author   Gaëtan Role-Dubruille <gaetan@wildcodeschool.fr>
 */
namespace Controller;

use Model\DBEntity;

/**
 * Class DBController.
 *
 * @category PHP_7.1
 * @package  Controller
 * @author   Gaëtan Role-Dubruille <gaetan@wildcodeschool.fr>
 */
class DBController extends AbstractController
{
    /**
     * @param   string $databaseName
     * @return  string
     */
    public function indexAction($databaseName)
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
     * @param int $id show entity by id
     * @return string
     */
    public function showAction($id)
    {
        return $this->_twig->render(
            'DBEntity/show.html.twig',
            ['db' => 'DBEntity number ' . $id]
        );
    }

    /**
     * @param int $id edit entity by id
     * @return string
     */
    public function editAction($id)
    {
        return $this->_twig->render(
            'DBEntity/edit.html.twig',
            ['db' => 'DBEntity number ' . $id]
        );
    }

    /**
     * @return string
     */
    public function addAction()
    {
        return $this->_twig->render(
            'DBEntity/add.html.twig',
            ['db' => 'Create new DBEntity']
        );
    }
}