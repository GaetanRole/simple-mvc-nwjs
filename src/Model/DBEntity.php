<?php
/**
 * DB entity with repository methods.
 *
 * @category PHP_7.1
 * @package  Model
 * @author   Gaëtan Role-Dubruille <gaetan@wildcodeschool.fr>
 */

namespace Model;

use Model\Connexion;

/**
 * Class DBEntity.
 *
 * @category PHP
 * @package  Model
 * @author   Gaëtan Role-Dubruille <gaetan@wildcodeschool.fr>
 */
class DBEntity
{

    private $_conn;

    /**
     * @param string $dbname connect with dbname
     */
    public function __construct($dbname)
    {
        $db = Connexion::getInstance($dbname);
        $this->_conn = $db->getDbh();
    }

    /**
     * @return array $tables show tables and return it
     */
    public function showTables()
    {
        $tables = $this->_conn->query('SHOW TABLES', \PDO::FETCH_ASSOC)->fetchAll();
        return $tables;
    }

    /**
     * @param int $id select table by id
     */
    public function selectTableById($id)
    {
        //TODO : Implements SQL SELECT BY ID request
    }

    /**
     * @param int $id delete table by id
     */
    public function deleteTable($id)
    {
        //TODO : Implements SQL DELETE request
    }

    /**
     * @param array $data
     */
    public function insertTable($data)
    {
        //TODO : Implements SQL INSERT request
    }

    /**
     * @param int   $id
     * @param array $data
     */
    public function updateTable($id, $data)
    {
        //TODO : Implements SQL UPDATE request
    }
}
