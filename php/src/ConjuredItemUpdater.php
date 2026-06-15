<?php

namespace GildedRose;

class ConjuredItemUpdater implements ItemUpdater
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->quality > 0) {
            $item->quality--;
        }

        if ($item->quality > 0) {
            $item->quality--;
        }

        if ($item->sellIn < 0) {
            if ($item->quality > 0) {
                $item->quality--;
            }
            if ($item->quality > 0) {
                $item->quality--;
            }
        }

    }
}