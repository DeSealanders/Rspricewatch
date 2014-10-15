<?php

class ItemManager {

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
            $instance = new ItemManager();
        }
        return $instance;
    }

    public function importData($data) {
        $item = new Item(
            $data->id,
            $data->name,
            $data->image,
            $data->high_alch,
            $data->recent_high,
            $data->recent_low,
            $data->average
        );
        QueryManager::getInstance()->saveItem($item);
        return $item;
    }

    public function dbToItems($dbItems) {
        if(is_array($dbItems) && count($dbItems) == 1) {
            return $this->dbToItem($dbItems[0]);
        }
        else {
            $itemList = array();
            foreach($dbItems as $dbItem) {
                $itemList[] = $this->dbToItem($dbItem);
            }
            return $itemList;
        }
    }

    private function dbToItem($dbItem) {
        return new Item(
            $dbItem['itemid'],
            $dbItem['item'],
            $dbItem['image_url'],
            $dbItem['high_alch'],
            $dbItem['recent_high'],
            $dbItem['recent_low'],
            $dbItem['average'],
            $dbItem['profit'],
            $dbItem['updated']
        );
    }

} 