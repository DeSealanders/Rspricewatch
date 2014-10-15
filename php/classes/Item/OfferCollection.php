<?php

class OfferCollection {

    private $offers;

    public function __construct($offers) {
        $this->offers = array();
        foreach($offers as $offer) {
            $this->offers[] = $offer;
        }
    }

    public function getBestBuy($amount, $time = false) {

    }

    public function getBestSell($amount, $time = false) {

    }

} 