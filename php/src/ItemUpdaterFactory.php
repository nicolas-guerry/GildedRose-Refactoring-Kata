<?php

namespace GildedRose;

class ItemUpdaterFactory
{
    public function getUpdater(Item $item): ItemUpdater
    {
        //Allow to manage every Conjured items
        if (str_contains($item->name, 'Conjured')) {
            return new ConjuredItemUpdater();
        }

        return match ($item->name) {
            'Aged Brie' => new AgedBrieUpdater(),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstageItemUpdater(),
            'Sulfuras, Hand of Ragnaros' => new SulfurasItemUpdater(),
            default => new NormalItemUpdater()
        };
    }
}