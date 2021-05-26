<?php


class Core
{
    protected $currentController = 'Users';
    protected $currentMethod = 'Login';
    protected $params = [];

    public function __construct()
    {
        $this->getUrl()[0] = 'Users';
        // print_r($this->getUrl());
        $url = $this->getUrl();

        if (file_exists('../app/Controller/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        require_once '../app/Controller/' . $this->currentController . '.php';

        $this->currentController = new $this->currentController;

        // Check for second part of url
        if (isset($url[1])) {
            // Check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }
        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            $_GET['url'] = 'Users';
        }
    }
}
