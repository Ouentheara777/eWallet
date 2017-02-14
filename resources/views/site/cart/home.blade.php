@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" align="right">
            <a href="/home" class="btn btn-warning">Continue Shopping</a>
            <a href="/checkout" class="btn btn-primary">Checkout</a>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-body">
                        <table class="table table-responsive table-striped">
                            <thead>
                            <tr>
                                <td>Item</td>
                                <td>Price</td>
                                <td>Credits</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($items['cart']))
                                @foreach($items['cart'] as $index => $item)
                                    <tr>
                                        @if(isset($items['list'][$item]))

                                            <?php
                                            $current_item = $items['list'][$item];
                                            $credit_point = \App\Items::getCreditScore($current_item['category']);
                                            ?>
                                            <td>{{$current_item['name']}}-({{$current_item['sku']}})</td>
                                            <td><b>${{$current_item['price']}}</b></td>
                                            <td>{{$credit_point}}</td>
                                            <td><a href="/cart/remove/{{$current_item['sku']}}"
                                                   class="action_remove">Remove</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection