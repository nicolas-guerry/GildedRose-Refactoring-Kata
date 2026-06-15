<?php

namespace GildedRose;

class BackstageItemUpdater implements ItemUpdater
{
    public function update(Item $item): void
    {

        $item->sellIn--;

        if ($item->sellIn < 0) {
            $item->quality = 0;
            return;
        }

        if ($item->quality < 50) {
            $item->quality++;
            if ($item->sellIn < 11 && $item->quality < 50) {
                $item->quality++;
            }
            if ($item->sellIn < 6 && $item->quality < 50) {
                $item->quality++;
            }
        }

    }
}