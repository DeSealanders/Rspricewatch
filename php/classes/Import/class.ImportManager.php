<?php

class ImportManager {

    private function __construct() {
    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return DatabaseManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new ImportManager();
        }
        return $instance;
    }

    public function getImport($urls) {
        if(is_array($urls)) {
            $imports = array();
            foreach($urls as $url) {
                $imports[] = new Import($url);
            }
            return $imports;
        }
        else {
            return new Import($urls);
        }
    }

} 