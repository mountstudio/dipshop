<?php
/**
 * Created by PhpStorm.
 * User: Tilek
 * Date: 06.10.2018
 * Time: 17:11
 */

namespace App\Helpers;


class HtmlContainer
{
    /**
     * Fill searched products to HTML
     *
     * @param $result
     * @param null $vars
     */
    public static function fillSearchHtml(&$result, $vars = null)
    {
        foreach ($vars as $var) {
            $result .= '<a href="' . route('product.show', $var->id) . '" style="text-decoration: none">'.
            '<div class="d-flex flex-row bg-light py-1 px-2 border-bottom border-dark text-dark">'.
            '<div class="d-inline-block">'.
            '<img width="60" height="80" src="' . asset('uploads/small/' . $var->image) . '" alt="">'.
            '</div>'.
            '<div class="d-inline-block ml-3">'.
            '<b>' . $var->name . '</b><br>'.
            '<b>' . __('categories.' . $var->category->slug) . '</b><br>'.
            '<b>' . number_format($var->price, 2) .' &euro;'.
            '</div>'.
            '</div></a>';
        }
    }

    public static function fillCartInfo(&$result, $cart)
    {
        if ($cart) {
            $i = 0;
            foreach ($cart->items as $item) {
                if ($i == 5) {
                    return false;
                }
                $result .= '<div class="dropdown-item d-flex flex-row bg-light py-1 px-2 border-bottom border-dark text-dark">' .
                    '<div class="d-inline-block">' .
                    '<img width="60" height="60" src="' . asset('uploads/small/' . $item['item']->image) . '" alt="">' .
                    '</div>' .
                    '<div class="d-inline-block ml-3">' .
                    '<b>' . $item['item']->name . '</b>' .
                    '<br><b>' . __('categories.' . $item['item']->category->slug) . '</b><br><b>' . $item['qty'] . ' x ' . number_format($item['item']->price, 2) . '&euro;</b>' .
                    '</div>' .
                    '</div>';
                $i++;
            }
        } else {
            $result .= '<div class="dropdown-item"><p class="m-0 p-0">'. __('cart.empty') .'</p></div>';
        }
    }
}