<?php
/**
 * Default controller pour / view.
 *
 * @category PHP_7.1
 * @package  Controller
 * @author   Gaëtan Role-Dubruille <gaetan@wildcodeschool.fr>
 */
namespace Controller;

use \PDO;

/**
 * Class DefaultController.
 *
 * @category PHP_7.1
 * @package  Controller
 * @author   Gaëtan Role-Dubruille <gaetan@wildcodeschool.fr>
 */
class DefaultController extends AbstractController
{
    /**
     * @return string
     */
    public function indexAction()
    {
        try {
            $DBH = new PDO("mysql:host=". APP_DB_HOST, APP_DB_USER, APP_DB_PWD);
            $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $DBH->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(\PDOException $e) {
            echo "Fail";
        }

        $rs = $DBH->query("SHOW DATABASES");
        $DBH = null;
        $dbList = array();
        while ($h = $rs->fetch(PDO::FETCH_NUM)) {
            array_push($dbList, $h[0]);
        }
        return $this->_twig->render(
            'Default/index.html.twig',
            array('dbList' => $dbList)
        );
    }
}