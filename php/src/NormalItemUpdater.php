<?php

namespace GildedRose;

class NormalItemUpdater implements ItemUpdater
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->quality > 0) {
            $item->quality--;
        }

        if ($item->sellIn < 0 && $item->quality > 0) {
            $item->quality--;
        }

    }
}