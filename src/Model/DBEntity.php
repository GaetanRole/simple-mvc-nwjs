<?php

declare(strict_types=1);

namespace App\Model;

use PDO;

/**
 * @author   Gaëtan Role-Dubruille <gaetan.role@gmail.com>
 */
class DBEntity
{
    /**
     * @var PDO
     */
    private $_conn;

    public function __construct(string $dbName)
    {
        $db = Connexion::getInstance($dbName);
        $this->_conn = $db->getDbh();
    }

    public function showTables(): array
    {
        return $this->_conn->query('SHOW TABLES', PDO::FETCH_ASSOC)->fetchAll();
    }

    public function selectTableById(int $id): void
    {
        //TODO : Implements SQL SELECT BY ID request
    }

    public function deleteTable(int $id): void
    {
        //TODO : Implements SQL DELETE request
    }

    public function insertTable(int $data): void
    {
        //TODO : Implements SQL INSERT request
    }

    public function updateTable(int $id, array $data): void
    {
        //TODO : Implements SQL UPDATE request
    }
}
