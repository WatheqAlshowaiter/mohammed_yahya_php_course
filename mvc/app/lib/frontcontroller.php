<?php

namespace PHPMVC\LIB;

class FrontController
{
    const NOT_FOUND_ACTION = 'notFoundAction';
    const NOT_FOUND_CONTROLLER ='PHPMVC\Controllers\\NotFoundController';
    
    private $_controller = 'index';
    private $_action = 'default';
    private $_params = [];

    public function __construct()
    {
        $this->_parseUrl();
    }

    public function _parseUrl()
    {
        // //  IF THERE ANY CHANGE IN UPPER FOLDER
        // //  THIS URL HAVE TO BE CHANGED
        $url = trim($_SERVER['REQUEST_URI'], '/m_yahya/mvc/public/');

        $url = trim(parse_url($url, PHP_URL_PATH), '/');
        $url =  explode('/', trim($url, '/'), 3);
        if (isset($url[0]) and $url[0] != '') {
            $this->_controller = $url[0];
        }
        if (isset($url[1]) and $url[1] != '') {
            $this->_action = $url[1];
        }
        if (isset($url[2]) and $url[2] != '') {
            $this->_params = explode('/', $url[2]);
        }
    }

    public function dispatch()
    {
        $controllerClassName = 'PHPMVC\Controllers\\' . ucfirst($this->_controller) . 'Controller';
        $actionName = $this->_action . 'Action';
        if (!class_exists($controllerClassName)) {
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
        }
        $controller =  new $controllerClassName();
        if (!method_exists($controller, $actionName)) {
            $this->_action = $actionName = self::NOT_FOUND_ACTION ;
        }
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);

        $controller->$actionName();
    }
}
