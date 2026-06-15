<?php

namespace GildedRose;

class AgedBrieUpdater extends BaseItemUpdater implements ItemUpdater
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        $this->raiseQuality($item);

        if ($this->isItemExpired($item)) {
            $this->raiseQuality($item);
        }
    }
}