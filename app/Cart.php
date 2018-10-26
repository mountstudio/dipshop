<?php
/**
 * Created by PhpStorm.
 * User: Tilek
 * Date: 04.10.2018
 * Time: 4:58
 */

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $realPrice = 0;

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
            $this->realPrice = $oldCart->realPrice;
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
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] += $qty;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
        $this->realPrice += $item->price;

        return $storedItem;
    }

    /**
     * @param Product $item
     * @param int     $id
     */
    public function remove(Product $item, int $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        if (1 === $storedItem['qty']) {
            $this->delete($item, $id);
        } else {
            $storedItem['qty'] -= 1;
            $storedItem['price'] = $item->price * $storedItem['qty'];
            $this->items[$id] = $storedItem;
        }
        $this->totalQty--;
        $this->totalPrice -= $item->price;
        $this->realPrice -= $item->price;
    }

    /**
     * @param Product $item
     * @param int     $id
     */
    public function delete(Product $item, int $id)
    {
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                unset($this->items[$id]);
            }
        }
    }
}