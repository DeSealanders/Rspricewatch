<?php
header('Content-Type: application/json');
require('php/config/conf.default.php');

if(isset($_GET['item'])) {
    $importUrl = 'http://forums.zybez.net/runescape-2007-prices/api/item/';
    $importUrl .= urlencode($_GET['item']);
    $import = ImportManager::getInstance()->getImport($importUrl);
    if($import->isSuccess()) {
        $data = $import->getData();
        if(!isset($data->error)) {

            // Successfully retrieved the data
            $item = ItemManager::getInstance()->importData($data);
            echo json_encode(array(
                    'success' => true,
                    'message' => 'Item successfully added'));
            //var_dump($data);
            //var_dump($item);
        }
        else {

            // An wrong item has been provided
            //TODO suggestions
            echo json_encode(array(
                    'success' => false,
                    'message' => 'Cannot find that item'));
        }
    }
    else {
        echo json_encode(array(
                'success' => false,
                'message' => 'Could not connect to the zybez servers'));
    }
}