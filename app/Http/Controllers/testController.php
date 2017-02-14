<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Items;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function test()
    {
        dd(Cart::processCredit());
    }
}
