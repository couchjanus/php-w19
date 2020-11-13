<?php

class Request
{
    public $data = [];
    public $query = [];
   
    public function __construct() {
        // $this->data = $this->cleanInput($_REQUEST);
        $this->data = $this->mergeData($_REQUEST, $_FILES);   
    }

    /**
     * merge post and files data
     * You shouldn't have two fields with the same 'name' attribute in $_POST & $_FILES
     *
     * @param  array $post
     * @param  array $files
     * @return array the merged array
     */
    private function mergeData(array $post, array $files){
        $post = $this->cleanInput($post);
        return array_merge($files, $post);
    }

    public function isSSL(){
        return isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== "off";
    }

    public function protocol(){
        return $this->isSSL() ? 'https' : 'http';
    }

    public function host(){
        return $_SERVER['HTTP_HOST'];
    }

    public function getHost(){
        return $this->protocol() . '://' . $this->host();
    }

    public function uri(){
        $uri = urldecode(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );
        if ($uri and !empty($uri)) {
            return trim($uri, '/');
        }
    }

    // магическая функция, которая позволяет обращатья к GET и POST переменным
    // по имени, например, echo $request->id
    public function __get($name) {
        if (isset($this->data[$name])) return $this->data[$name];
    }
   
    // очистка данных от опасных символов
    // clearing data from dangerous characters
    private function cleanInput($data) {
        if (is_array($data)) {
            $cleaned = [];
            foreach ($data as $key => $value) {
                $cleaned[$key] = $this->cleanInput($value);
            }
            return $cleaned;
        }
        return trim(htmlspecialchars($data, ENT_QUOTES));
    }
   
    // return the request content
    public function getRequestEntries()
    {
        return $this->data;
    }

    public function root(){
        return $this->getHost();
    }
}