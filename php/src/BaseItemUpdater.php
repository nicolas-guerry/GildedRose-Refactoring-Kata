<?php

namespace GildedRose;

abstract class BaseItemUpdater implements ItemUpdater
{
    protected function reduceQuality(Item $item): void
    {
        if ($item->quality > 0) {
            $item->quality--;
        }
    }

    protected function raiseQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
    }

    protected function isItemExpired(Item $item): bool
    {
        return $item->sellIn < 0;
    }

}
