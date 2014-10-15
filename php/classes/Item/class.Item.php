<?php

class Item {

    private $itemid;
    private $name;
    private $imageUrl;
    private $highAlch;
    private $recentHigh;
    private $recentLow;
    private $average;
    private $updated;
    private $profit;
    private $offers;
    private $linkbase;

    public function __construct($itemid, $name, $imageUrl, $highAlch, $recentHigh, $recentLow, $average, $profit = false, $updated = false, $offers = false) {
        $this->itemid = $itemid;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->highAlch = $highAlch;
        $this->recentHigh = $recentHigh;
        $this->recentLow = $recentLow;
        $this->average = $average;
        $this->updated = $updated;
        $this->profit = $profit;
        $this->linkBase = 'http://forums.zybez.net/runescape-2007-prices/';

        // Handle all offers
        if($offers) {
            $this->offers = new OfferCollection($offers);
        }

    }
    public function getAverage($formatted = false)
    {
        if($formatted) {
            return $this->formatMoney($this->average);
        }
        else {
            return $this->average;
        }
    }

    public function getHighAlch($formatted = false)
    {
        if($formatted) {
            return $this->formatMoney($this->highAlch);
        }
        else {
            return $this->highAlch;
        }
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function getItemid()
    {
        return $this->itemid;
    }

    public function getName($urlFormat = false)
    {
        if($urlFormat) {
            return implode('-', explode(' ', strtolower($this->name)));
        }
        else {
            return $this->name;
        }
    }

    public function getProfit($formatted = false)
    {
        if($formatted) {
            return $this->formatMoney($this->profit);
        }
        else {
            return $this->profit;
        }
    }

    public function getRecentHigh()
    {
        return $this->recentHigh;
    }

    public function getRecentLow()
    {
        return $this->recentLow;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function getProfitColor() {
        if($this->profit > 0) {
            return 'success';
        }
        else if($this->profit < 0 && abs($this->profit) < 1000) {
            return 'warning';
        }
        else {
            return 'danger';
        }
    }

    public function getLink() {
        return $this->linkBase . $this->getItemid() . '-' . $this->getName(true);
    }

    private function formatMoney($amount) {
        if(abs($amount) > 1000) {
            return round($amount/1000, 1) . 'k';
        }
        return (int)$amount . 'gp';
    }

} 