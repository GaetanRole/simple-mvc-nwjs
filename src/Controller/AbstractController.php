<?php
/**
 * Parent controller with twig loader.
 *
 * @category PHP_7.1
 * @package  AbstractController
 * @author   Gaëtan Role-Dubruille <gaetan@wildcodeschool.fr>
 */
namespace Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;

/**
 * Class AbstractController.
 *
 * @category PHP
 * @package  AbstractController
 * @author   Gaëtan Role-Dubruille <gaetan@wildcodeschool.fr>
 */
class AbstractController
{
    protected $_twig;

    public function __construct()
    {
        // Load asset constant to Twig vendor
        $loader = new Twig_Loader_Filesystem(APP_VIEW_PATH);
        $this->_twig = new Twig_Environment($loader, ['cache' => false, 'debug' => APP_DEV]);
        $this->_twig->addFunction(
            new \Twig_SimpleFunction(
                'asset', function ($asset) {
                    return sprintf(APP_ASSET . '%s', ltrim($asset, '/'));
                }
            )
        );
        $this->_twig->addExtension(new \Twig_Extension_Debug());
    }
}