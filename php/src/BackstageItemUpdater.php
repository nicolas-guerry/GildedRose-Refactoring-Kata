<?php

namespace GildedRose;

class BackstageItemUpdater extends BaseItemUpdater
{
    public function update(Item $item): void
    {

        $item->sellIn--;

        if ($this->isItemExpired($item)) {
            $item->quality = 0;
            return;
        }

        $this->raiseQuality($item);

        if ($item->sellIn < 10) {
            $this->raiseQuality($item);
        }

        if ($item->sellIn < 5) {
            $this->raiseQuality($item);
        }

    }
}