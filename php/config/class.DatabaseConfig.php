<?php
/**
 * This class is the config file for the database
 */
class DatabaseConfig {

    public function __construct() {
    }

    /**
     * Return database details on basis of host location
     * @return array database details
     */
    public function getDbDetails() {
        if(isLive()) {
            return $this->getLiveDetails();
        }
        else {
            return $this->getLocalDetails();
        }
    }

    private function getLocalDetails() {
        return array(
            'username' => 'root',
            'password' => 'usbw',
            'database' => 'rspricewatch',
            'address' => 'localhost'
        );
    }

    private function getLiveDetails() {
        return array(
            'password' => 'xxxxxxxx',
            'username' => 'tonpeter_rs',
            'database' => 'tonpeter_rs',
            'address' => 'localhost'
        );
    }
}