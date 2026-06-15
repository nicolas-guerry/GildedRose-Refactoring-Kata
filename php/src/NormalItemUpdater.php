<?php

namespace GildedRose;

class NormalItemUpdater extends BaseItemUpdater
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        $this->reduceQuality($item);

        if ($this->isItemExpired($item)) {
            $this->reduceQuality($item);
        }

    }
}