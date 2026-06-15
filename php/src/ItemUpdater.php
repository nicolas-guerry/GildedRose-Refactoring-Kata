<?php

namespace GildedRose;

/**
 * ItemUpdaterInterface
 */
Interface ItemUpdater
{
    /**
     * @param Item $item
     *
     * @return void
     */
    public function update(Item $item): void;

}