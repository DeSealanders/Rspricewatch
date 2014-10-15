<?php
require('php/config/conf.default.php');

$dbItems = QueryManager::getInstance()->getAlchItems();
$items = ItemManager::getInstance()->dbToItems($dbItems);

// Get nature rune data
foreach($items as $item) {
    if($item->getItemid() == 280) {
        $natRune = $item;
    }
}
?>


<h1>High alchemy profit</h1>
<div class="natrune">
<?php
echo '<p>Nature rune cost: <span class="label label-info">' . $natRune->getAverage(true) . '<span></p>';
?>
</div>
<table class="table">
    <thead>
    <tr>
        <th>Itemid</th>
        <th>Item name</th>
        <th>High alch</th>
        <th>Average cost</th>
        <th>High alch profit</th>
        <th>Last update</th>
    </tr>
    </thead>
    <tbody>

<?php
foreach($items as $item) {
    echo '<tr class="' . $item->getProfitColor() . '">';
    echo '<td>' . $item->getItemid() . '</td>';
    echo '<td><a target="_blank" href="' . $item->getLink() . '">
            <span class="glyphicon glyphicon-shopping-cart"></span></a>
            ' . $item->getName() . '</td>';
    echo '<td>' . $item->getHighAlch(true) . '</td>';
    echo '<td>' . $item->getAverage(true) . '</td>';
    echo '<td>' . $item->getProfit(true) . '</td>';
    echo '<td><a class="refresh" href="import.php?item=' . strtolower(urlencode($item->getName())) . '">
            <span class="glyphicon glyphicon-refresh"></span>
            </a>' . date('Y-m-d H:i', strtotime($item->getUpdated())) . '</td>';
    echo '</tr>';
}

?>
</tbody>
</table>