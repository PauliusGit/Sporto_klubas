<?php
/* App Core class
 * Create URL & loads controller
 * URL format /controller/method/params
 */
class Core
{
    // nusistatom pradines nustatytasias reiksmes
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        // check if user asked for controller
        if (isset($url[0])) {
            // Look into controllers dir for the controller name
            // if such file exists
            if (file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')) {
                $this->currentController = ucfirst($url[0]);
                // clean value that was taken
                unset($url[0]);
            }
        }
        // Require the controller that user asked
        require_once '../app/controllers/' . $this->currentController . '.php';

        // instanciate an object of current class
        $this->currentController = new $this->currentController;

        // check for second(method) values in url params
        if (isset($url[1])) {
            // check if there is a method name in the class
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // clean value that was taken
                unset($url[1]);
            }
        }

        // Get params from url
        if (isset($url[2])) {
            $this->params = $url ? array_values($url) : [];
        }

        // we call current controller and method and params if present
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /* return url parameters
    * check if $_GET param is set
    */
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            // trim  slash from the right
            $url = rtrim($_GET['url'], '/');
            // sanitize url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // make url into array 
            $url = explode('/', $url);
            return $url;
        }
    }
}
