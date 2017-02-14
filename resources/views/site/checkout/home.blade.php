@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3">
                @if(empty($items['cart']))
                    <h3>You have no more items for Checkout !</h3>
                    <div align="center">
                        <a href="/home" class="btn btn-primary">Continue Shopping</a>
                    </div>
                @else
                    <h2>Checkout</h2>
                    <div class="panel">
                        <div class="panel-body" id="panel_checkout">
                            <table class="table table-responsive">
                                <tbody>
                                <?php $total = 0; ?>
                                @foreach($items['cart'] as $index => $item)
                                    <?php $current_item = $items['list'][$item] ?>
                                    <tr>
                                        <td>{{$current_item['name']}}</td>
                                        <td>$ {{$current_item['price']}}</td>
                                    </tr>
                                    <?php $total += (int)$current_item['price']; ?>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td>$ {{$total}}</td>
                                </tr>
                                <tr align="right">initPayment
                                    <td colspan="2"><a href="#" id="action_submit" class="btn btn-primary">PayNow</a>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection