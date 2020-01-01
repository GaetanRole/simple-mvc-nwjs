<?php

declare(strict_types=1);

namespace App\Controller;

use PDO;
use PDOException;

/**
 * @author   Gaëtan Role-Dubruille <gaetan.role@gmail.com>
 */
final class DefaultController extends AbstractController
{
    public function indexAction(): string
    {
        try {
            $DBH = new PDO('mysql:host='. APP_DB_HOST, APP_DB_USER, APP_DB_PWD);
            $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $DBH->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $e) {
            echo 'PDOException: ' . $e->getMessage();
            die();
        }

        $rs = $DBH->query('SHOW DATABASES');

        $dbList = [];
        while ($h = $rs->fetch(PDO::FETCH_NUM)) {
            $dbList[] = $h[0];
        }

        unset($DBH);

        return $this->_twig->render(
            'Default/index.html.twig',
            ['dbList' => $dbList]
        );
    }
}
