<?php

namespace GildedRose;

class ItemUpdaterFactory
{
    public function getUpdater(Item $item): ItemUpdater
    {
        return match ($item->name) {
            'Aged Brie' => new AgedBrieUpdater(),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstageItemUpdater(),
            'Conjured hammer' => new ConjuredItemUpdater(),
            'Sulfuras, Hand of Ragnaros' => new SulfurasItemUpdater(),
            default => new NormalItemUpdater()
        };
    }
}