@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-10 col-lg-10 col-md-offset-1">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-md-10 col-lg-10">
                        @foreach($items['list'] as $item)
                            <div class="col-sm-6 col-xs-6 col-md-4 col-lg-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <h3>{{$item['name']}}
                                            <small>(<code>{{$item['sku']}}</code>)</small>
                                        </h3>
                                        <img src="{{URL::asset('/images/items/'.$item['image'])}}"
                                             style="position: relative"
                                             width="80" height="80">
                                        <h4><del>$ {{$item['price'] - 10}}</del><b>$ {{$item['price']}}</b></h4>
                                    </div>
                                    <div class="panel-footer">
                                        <input type="button" class="btn btn-primary action_add"
                                               data-sku="{{$item['sku']}}"
                                               value="Add To Cart">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-sm-4 col-xs-4 col-md-2 col-lg-2">
                        <a href="/cart" class="btn btn-lg btn-success"><b>View Cart</b></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection