<?php

class Request
{
    public $data = [];
    public $query = [];
   
    public function __construct() {
        // $this->data = $_REQUEST;
        // $this->query = $_GET;
        // при создании объекта запроса мы пропускаем все данные
        // через фильтр-функцию для очистки параметров от нежелательных данных
        // clear data from dangerous characters
        $this->data = $this->cleanInput($_REQUEST);
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