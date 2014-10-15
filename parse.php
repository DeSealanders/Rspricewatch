<?php
require('php/config/conf.default.php');
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 26-9-14
 * Time: 13:59
 */

$txt = file_get_contents('autocomplete.txt');
$expl = explode(', ', $txt);
$filtered = array();
foreach($expl as $exp) {
    if(strpos(strtolower($exp), 'activity') !== false) {

    }
    else {
        $filtered[] = "('" . addslashes($exp) . "')";
    }
}
var_dump(count($filtered));
for($i = 0; $i < 30; $i++) {
    $itemlist = implode(', ', array_slice($filtered, $i*100, 100));
    //QueryManager::getInstance()->insertItems($itemlist);
    var_dump(count($itemlist));
    var_dump($itemlist);
}
//var_dump(count($itemlist));
//var_dump($itemlist);
//$itemlist2 = array_slice($itemlist, 0, 10);
//var_dump($itemlist);

//QueryManager::getInstance()->insertItems($itemlist);