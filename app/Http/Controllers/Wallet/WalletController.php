<?php

namespace App\Http\Controllers\Wallet;

use App\Cart;
use App\Http\Controllers\BaseController;
use App\Items;
use Illuminate\Http\Request;

/**
 * Class WalletController
 * @package App\Http\Controllers\Wallet
 */
class WalletController extends BaseController
{
    /**
     * WalletController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * To Show the View for Listing Items.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function init()
    {
        $items['list'] = Items::getItems();

        return view('site.home', compact('items'));
    }

    /**
     * To Add Item to Session.
     *
     * @param Request $request
     * @return bool
     */
    public function addItem(Request $request)
    {
        // Here, "sku" is used for adding product.
        $item = $request->get('sku', null);

        return Items::addItem($item);
    }

    /**
     * To Show the Cart Panel.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart()
    {
        // Getting Active Items.
        // Here, we load all items, because its stored as Array.
        $items['list'] = Items::getItems();
        // Getting Cart Items.
        $items['cart'] = Cart::getItems();
        return view('site.cart.home', compact('items'));
    }

    /**
     * To Remvoe Cart Item.
     *
     * @param $sku
     * @return bool
     */
    public function cartRemove($sku)
    {
        if (!is_string($sku)) return false;
        Cart::removeItem($sku);
    }

    /**
     * To Init Checkout View.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkout()
    {
        $items['list'] = Items::getItems();
        $items['cart'] = Cart::getItems();
        return view('site.checkout.home', compact('items'));
    }

    /**
     * To Init Payment View.
     */
    public function initPayment()
    {
        //Here, direct call will consider as Payment Completion.

        $credit = Cart::processCredit();
        Cart::clearItems();
        return $credit;
    }
}
