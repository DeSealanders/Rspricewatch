<?php
header('Content-Type: application/json');
require('php/config/conf.default.php');

$items = QueryManager::getInstance()->getAllItems();
$jsonArray = array('query' => 'unit');
foreach($items as $item) {
    $jsonArray['suggestions'][] = $item['itemname'];
}
echo json_encode($jsonArray);