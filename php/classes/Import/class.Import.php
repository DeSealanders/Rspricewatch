<?php

class Import {

    private $data;
    private $success;

    public function __construct($url) {
        $this->data = false;
        $this->success = false;
        $this->import($url);
    }

    public function getData() {
        return $this->data;
    }

    public function isSuccess() {
        return $this->success;
    }

    private function import($url = false) {
        if($url) {
            try {
                $json = file_get_contents($url);
            }
            Catch(Exception $e) {

            }
            if(!empty($json)) {
                //file_put_contents('txt/json-' . substr($url, strlen($this->baseUrl)+1) . '-' . time() . '.txt', $json);
                $this->data = json_decode($json);
                $this->success = true;
            }
        }
    }

} 