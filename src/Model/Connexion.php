<?php

declare(strict_types=1);

namespace App\Model;

use PDO;
use PDOException;

/**
 * Connexion class
 *
 * <pre>
 *  $db = connexion::getInstance();
 *  $con = $db->getDbh();
 * </pre>
 *
 * @link http://fr3.php.net/manual/fr/book.pdo.php PDO
 *
 * @todo
 * <ul>
 *     <li>0.1: Creation of Connection class</li>
 *     <li>0.2: Convert this one to singleton patern design</li>
 *     <li>0.3: Adding UTF-8 encoder</li>
 *     <li>0.4: Adding try catch for db connection</li>
 * </ul>
 */

class Connexion
{
    /**
     * @access private
     * @var connexion
     * @see getInstance
     */
    private static $instance;

    /**
     * @access private
     * @var string
     * @see __construct
     */
    private $type = 'mysql';

    /**
     * @access private
     * @var string
     * @see __construct
     */
    private $host = APP_DB_HOST;

    /**
     * @access private
     * @var string
     * @see __construct
     */
    private $dbName;

    /**
     * @access private
     * @var string
     * @see __construct
     */
    private $username = APP_DB_USER;

    /**
     * @access private
     * @var string
     * @see __construct
     */
    private $password = APP_DB_PWD;

    private $dbh;

    /**
     * @access private
     */
    private function __construct(string $dbName)
    {
        try {
            $this->dbh = new PDO(
                $this->type.':host='.$this->host.'; dbname='.$dbName,
                $this->username,
                $this->password,
                array(PDO::ATTR_PERSISTENT => true)
            );

            $this->dbName = $dbName;
            $this->dbh->exec('SET NAMES UTF8');
        }
        catch (PDOException $e) {
            include_once 'Exception.php';
            die();
        }
    }

    public static function getInstance($dbName): Connexion
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self($dbName);
        }

        return self::$instance;
    }

    public function getDbh(): PDO
    {
        return $this->dbh;
    }
}
