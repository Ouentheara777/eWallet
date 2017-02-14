<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class Cart
 * @package App
 */
class Cart extends Model
{
    /**
     * To Return List of Items from Session.
     *
     * @return array of Items.
     */
    public static function getItems()
    {
        // To Get Items.
        $items = Session()->get('items');

        if (empty($items) || !isset($items)) $items = [];
        return $items;
    }

    /**
     * To Remove item from Session.
     *
     * @param string $item Item's SKU.
     * @return bool Removed | Not Removed.
     */
    public static function removeItem($item)
    {
        if (!is_string($item)) return false;
        // Retrieve the items/
        $items = Session('items');

        if (!isset($item)) return false;
        if (!$items || empty($items)) return false;

        // Searching the Index fro remove.
        if (($index = array_search($item, $items)) >= 0) {
            unset($items[$index]);
        }
        // Update Items to Session.
        Session()->put('items', $items);
    }

    /**
     * To Process the Customer's credit from their purchased items.
     */
    public static function processCredit()
    {
        // Retrieve the list of items from the Session.
        $items = Session()->get('items');
        // Retrieve the list of items from Record.
        // Here, we use array of items, we do searching.
        $list = Items::getItems();
        $credit_point = 0;
        // Reverse Search with customers items.
        foreach ($items as $item) {
            if (is_null($item)) continue;
            if (!isset($list[$item]['category'])) continue;

            $category_id = $list[$item]['category'];
            // To Get the Credit of the Item.
            $credit = Credits::where('category_id', $category_id)->pluck('credit_point');
            $credit_point += $credit->first();
        }
        $user = Auth::user();
        // To Update the Credit to User.
        $credit = $user->credits + $credit_point;
        $user->credits = $credit;
        $user->save();
        return $credit;
    }

    /**
     *
     */
    public static function clearItems()
    {
        // To Clear the Items from Session;
        Session()->put('items', []);
        return true;
    }

}
