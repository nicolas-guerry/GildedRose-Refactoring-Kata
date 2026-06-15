<?php

namespace GildedRose;

class ConjuredItemUpdater extends BaseItemUpdater implements ItemUpdater
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        $this->reduceQuality($item);
        $this->reduceQuality($item);

        if($this->isItemExpired($item)) {
            $this->reduceQuality($item);
            $this->reduceQuality($item);
        }
    }
}