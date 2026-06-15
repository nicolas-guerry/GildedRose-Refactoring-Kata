<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /*
     * TEST NORMAL ITEM
     */
    public function testNormalItem()
    {
        $items = [new Item('Plastron +2 Strength', 10, 20)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(19, $items[0]->quality);
        $this->assertEquals(9, $items[0]->sellIn);
    }

    public function testNormalItemAfterSell()
    {
        $items = [new Item('Plastron +2 Strength', 0, 10)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(8, $items[0]->quality);
        $this->assertEquals(-1, $items[0]->sellIn);
    }


    /*
     * TEST CONJURED ITEM
     */
    public function testConjuredItem()
    {
        $items = [new Item('Conjured hammer', 10, 20)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(18, $items[0]->quality);
        $this->assertEquals(9, $items[0]->sellIn);
    }

    public function testConjuredItemAfterSell()
    {
        $items = [new Item('Conjured hammer', 0, 8)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(4, $items[0]->quality);
        $this->assertEquals(-1, $items[0]->sellIn);
    }

    /*
     * TEST SULFURAS
     */
    public function testSulfurasItem()
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 80)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(80, $items[0]->quality);
        $this->assertEquals(0, $items[0]->sellIn);
    }

    /*
     * TEST BACKSTAGE
     */
    public function testBackStage()
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(21, $items[0]->quality);
        $this->assertEquals(14, $items[0]->sellIn);
    }
    public function testBackStageFast()
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 20)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(22, $items[0]->quality);
        $this->assertEquals(9, $items[0]->sellIn);
    }

    public function testBackStageAfterConcert()
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 45)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(0, $items[0]->quality);
        $this->assertEquals(-1, $items[0]->sellIn);
    }

    /*
     * TEST AGED BRI
     */
    public function testAgedBrie()
    {
        $items = [new Item('Aged Brie', 2, 0)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(1, $items[0]->quality);
        $this->assertEquals(1, $items[0]->sellIn);
    }
    public function testAgedBrieAfterSell()
    {
        $items = [new Item('Aged Brie', 0, 5)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(7, $items[0]->quality);
        $this->assertEquals(-1, $items[0]->sellIn);
    }

    public function testAgedBrieNeverAbove50()
    {
        $items = [new Item('Aged Brie', 5, 50)];
        $app = new GildedRose($items);

        $app->updateQuality();

        $this->assertEquals(50, $items[0]->quality);
    }

}
