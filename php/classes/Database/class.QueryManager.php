<?php

class QueryManager {

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
            $instance = new QueryManager();
        }
        return $instance;
    }

    /*
     *
     * ---------------------- Items ----------------------
     *
     *
     */
    public function saveItem(Item $item) {
        $query = "INSERT INTO alch_items (created, updated, itemid, item, image_url, high_alch, recent_high, recent_low, average) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE updated = ?, high_alch = ?, recent_high = ?, recent_low = ?, average = ?";
        $params = array(
            // Insert values
            date('Y-m-d H:i:s', time()),
            date('Y-m-d H:i:s', time()),
            $item->getItemid(),
            $item->getName(),
            $item->getImageUrl(),
            $item->getHighAlch(),
            $item->getRecentHigh(),
            $item->getRecentLow(),
            $item->getAverage(),

            // Update values
            date('Y-m-d H:i:s', time()),
            $item->getHighAlch(),
            $item->getRecentHigh(),
            $item->getRecentLow(),
            $item->getAverage()
        );
        return DatabaseManager::getInstance()->executeQuery($query , $params);
    }

    public function getAlchItems() {
        $query = "SELECT *, (high_alch - average - (SELECT average FROM alch_items WHERE itemid = 280)) AS profit FROM alch_items ORDER BY profit DESC";
        return DatabaseManager::getInstance()->executeQuery($query);
    }

    public function getAllItems() {
        $query = "SELECT * FROM items";
        return DatabaseManager::getInstance()->executeQuery($query);
    }



} 