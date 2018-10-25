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

//    public static function fillCartInfo(&$result, $cart)
//    {
//        if ($cart) {
//            $i = 0;
//            foreach ($cart->items as $item) {
//                if ($i == 5) {
//                    return false;
//                }
//                $result .= '<div class="dropdown-item d-flex flex-row bg-light py-1 px-2 border-bottom border-dark text-dark">' .
//                    '<div class="d-inline-block">' .
//                    '<img width="60" height="60" src="' . asset('uploads/small/' . $item['item']->image) . '" alt="">' .
//                    '</div>' .
//                    '<div class="d-inline-block ml-3">' .
//                    '<b>' . $item['item']->name . '</b>' .
//                    '<br><b>' . __('categories.' . $item['item']->category->slug) . '</b><br><b>' . $item['qty'] . ' x ' . number_format($item['item']->price, 2) . '&euro;</b>' .
//                    '</div>' .
//                    '</div>';
//                $i++;
//            }
//        } else {
//            $result .= '<div class="dropdown-item"><p class="m-0 p-0">'. __('cart.empty') .'</p></div>';
//        }
//    }



    public static function fillCartInfo(&$result, $cart)
    {
        if ($cart) {
            $i = 0;
            $result .= '<table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th class="text-center" scope="col">№</th>
                            <th class="text-center" scope="col">Image</th>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Price</th>
                            <th class="text-center" scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>';

            foreach ($cart->items as $item) {
//                $result .= '<div class="dropdown-item d-flex flex-row bg-light py-1 px-2 border-bottom border-dark text-dark">' .
//                    '<div class="d-inline-block">' .
//                    '<img width="60" height="60" src="' . asset('uploads/small/' . $item['item']->image) . '" alt="">' .
//                    '</div>' .
//                    '<div class="d-inline-block ml-3">' .
//                    '<b>' . $item['item']->name . '</b>' .
//                    '<br><b>' . __('categories.' . $item['item']->category->slug) . '</b><br><b>' . $item['qty'] . ' x ' . number_format($item['item']->price, 2) . '&euro;</b>' .
//                    '</div>' .
//                    '</div>';

                $result .= '<tr>
                            <th scope="row">'. ($i + 1) .'</th>
                            <td class="p-2"><img class="img-fluid" width="70" height="70" src="' . asset('uploads/small/' . $item['item']->image) .'"/></td>
                            <td class="align-middle">' . $item['item']->name . ' <br><b>' . __('categories.' . $item['item']->category->slug) . '</b></td>
                            <td class="align-middle">
                            <div class="d-flex align-items-center">
                            <p class="btn btn-danger m-0 font-weight-bold from_cart" data-id="'. $item['item']->id .'">-</p>
                            <span class="mx-1 font-weight-bold text-center" style="min-width: 13px;">'. $item['qty'] . '</span> 
                            <p class="btn btn-success m-0 font-weight-bold to_cart" data-id="'. $item['item']->id .'">+</p>
                            <span class="font-weight-bold ml-1">&nbsp;x &nbsp;' . number_format($item['item']->price, 2) . '&euro;</span>
                            </div>
                            </td>
                            <td class="align-middle">Delete</td>
                        </tr>';

                $i++;
            }
            $result .= '</tbody>
                    </table>
                    <div class="row">
                    <div class="col d-flex justify-content-end mt-3 mr-5">
                    <b style="font-size: 18px;">Итого: <span class="totalPrice">' . $cart->totalPrice . '</span>&euro;</b>
                    </div>
                    </div>';
        } else {
            $result .= '<div class="dropdown-item"><p class="m-0 p-0">'. __('cart.empty') .'</p></div>';
        }
    }

}