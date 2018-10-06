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
            $result .= '<div style="min-width: 220px" class="col-2 mb-4">' .
                '<div class="card hover-shadow transition-500 border pt-3" style="border: 3px solid #dee2e6 !important">' .
                '<img class="card-img-top px-1" src="' . asset('uploads/' . $var->image) . '" alt="Card image cap">' .
                '<div class="card-body d-flex px-2 pb-1">' .
                '<div class="text-capitalize mr-auto font-weight-bold">' . __('categories.' . $var->category->slug) . '</div>' .
                '<div class="card-title ml-auto font-weight-bold text-right" style="min-width: 70px;"><span class="h5">' . number_format($var->price, 2) . '</span> &euro;</div>' .
                '</div>' .
                '<div class="card-body px-2 pb-0 pt-1 d-flex">' .
                '<div class="card-title h6 mr-auto" style="min-height: 64px;">' . $var->name . '</div>' .
                '</div>' .
                '<div class="card-body px-0 pb-0 pt-2 text-center">' .
                '<p class="btn btn-success shadow-lg font-weight-light cart mb-3 to_cart" data-id="' . $var->id . '"  data-toggle="tooltip" data-placement="bottom" title="' . __('main.cartnotwork') . '">' . __('main.addtocart') . '</p>' .
                '</div>' .
                '</div>' .
                '</div>';
        }
    }
}