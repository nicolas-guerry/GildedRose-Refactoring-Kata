<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    private ItemUpdaterFactory $itemUpdaterFactory;

    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items,
    ) {
        $this->itemUpdaterFactory = new ItemUpdaterFactory();
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $updater = $this->itemUpdaterFactory->getUpdater($item);
            $updater->update($item);
        }

    }
}
