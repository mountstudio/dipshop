<?php
/**
 * Created by PhpStorm.
 * User: Tilek
 * Date: 04.10.2018
 * Time: 4:58
 */

namespace App;

use Carbon\Carbon;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    /**
     * Cart constructor.
     * @param Cart $oldCart
     */
    public function __construct(Cart $oldCart = null)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * @param Product $item
     * @param int     $id
     * @param int     $qty
     *
     * @return array
     */
    public function add(Product $item, int $id, int $qty = 1)
    {
        $price = $this->checkForStock($item);

        $storedItem = ['qty' => 0, 'price' => $price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] += $qty;
        $storedItem['one_price'] = $price;
        $storedItem['price'] = $price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $price;

        return $storedItem;
    }

    /**
     * @param Product $item
     * @param int     $id
     */
    public function remove(Product $item, int $id)
    {
        $price = $this->checkForStock($item);

        $storedItem = ['qty' => 0, 'price' => $price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        if (1 === $storedItem['qty']) {
            unset($this->items[$id]);
        } else {
            $storedItem['qty'] -= 1;
            $storedItem['price'] = $price * $storedItem['qty'];
            $this->items[$id] = $storedItem;
        }
        $this->totalQty--;
        $this->totalPrice -= $price;
    }

    /**
     * @param Product $item
     * @param int     $id
     */
    public function delete(Product $item, int $id)
    {
        $price = $this->checkForStock($item);
        $storedItem = ['qty' => 0, 'price' => $price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
                unset($this->items[$id]);
            }
        }
        $this->totalPrice -= $storedItem['price'];
        $this->totalQty -= $storedItem['qty'];
    }

    public function checkForStock($item)
    {
        if ($item->stock_id !== null) {
            return $item->stock->start_date < Carbon::now('GMT+6') && $item->stock->end_date > Carbon::now('GMT+6')
                ? $item->new_price
                : $item->price;
        }

        return $item->price;
    }
}