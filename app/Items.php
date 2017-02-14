<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Items
 * @package App
 */
class Items extends Model
{
    /**
     * @return array
     */
    public static function getItems()
    {
        return [
            'school-bag' => [
                'category' => 1,
                'name' => 'School Bag',
                'sku' => 'school-bag',
                'image' => 'school-bag.jpeg',
                'weight' => 2,
                'unit' => 'lbs',
                'color' => 'blue',
                'price' => 1099,
                'stock' => 50,
            ],
            'college-bag' => [
                'category' => 2,
                'name' => 'College Bag',
                'sku' => 'college-bag',
                'image' => 'college-bag.jpeg',
                'weight' => 2.5,
                'unit' => 'lbs',
                'color' => 'black',
                'price' => 1899,
                'stock' => 50,
            ],
            'laptop-bag' => [
                'category' => 3,
                'name' => 'Laptop Bag',
                'sku' => 'laptop-bag',
                'image' => 'laptop-bag.jpeg',
                'weight' => 4,
                'unit' => 'lbs',
                'color' => 'grey',
                'price' => 2599,
                'stock' => 40,
            ],
            'travel-bag' => [
                'category' => 3,
                'name' => 'Travel Bag',
                'sku' => 'travel-bag',
                'image' => 'travel-bag.jpeg',
                'weight' => 4,
                'unit' => 'lbs',
                'color' => 'red',
                'price' => 4999,
                'stock' => 20,
            ],
            'ladies-bag' => [
                'category' => 2,
                'name' => 'Ladies Bag',
                'sku' => 'ladies-bag',
                'image' => 'ladies-bag.jpeg',
                'weight' => 5,
                'unit' => 'lbs',
                'color' => 'black',
                'price' => 3599,
                'stock' => 20,
            ],
            'kids-bag' => [
                'category' => 2,
                'name' => 'Kids Bag',
                'sku' => 'kids-bag',
                'image' => 'kids-bag.jpeg',
                'weight' => 2,
                'unit' => 'lbs',
                'color' => 'yellow',
                'price' => 1099,
                'stock' => 50,
            ]
        ];
    }

    /**
     * @param $category_id
     * @return int
     */
    public static function getCreditScore($category_id)
    {
        $credit = Credits::where('category_id', $category_id)->get();
        if (is_null($credit)) return 0;
        $credit = $credit->pluck('credit_point')->first();
        return $credit;
    }

    /**
     * @param $sku
     * @return bool|mixed
     */
    public static function getItem($sku)
    {
        if (!is_string($sku)) return false;

        $list = self::getItems();

        $item = false;
        if (isset($list[$sku])) {
            $item = $list[$sku];
        }
        return $item;
    }

    /**
     * @param $item
     * @return bool
     */
    public static function addItem($item)
    {
        if (!is_string($item)) return false;

        if (!isset($item)) return false;

        $items = Session('items');

        if (!$items) $items = [];
        if (($index = array_search($item, $items)) === false) {
            array_push($items, $item);
            Session()->put('items', $items);
        }
    }
}
