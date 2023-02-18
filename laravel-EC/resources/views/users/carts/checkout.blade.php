@extends('layouts.app')

@section('content')
    <div class="container px-4 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-2">
                <h4 class="heading">買い物バッグ</h4>
            </div>
            <div class="col-10">
                <div class="row text-right">
                    <div class="col-4">
                        <h6 class="mt-2">商品名</h6>
                    </div>
                    <div class="col-4">
                        <h6 class="mt-2">商品内容</h6>
                    </div>
                    <div class="col-2">
                        <h6 class="mt-2">数量</h6>
                    </div>
                    <div class="col-2">
                        <h6 class="mt-2">金額</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- <form action="#" method="post">
            @csrf --}}
            @foreach ($user->carts as $cart)
                <input type="hidden" name="id[]" value="{{ $cart->id }}">
                <div class="row d-flex justify-content-center border-top mb-5">
                    <div class="col-2">
                        <div class="row d-flex">
                            @empty($cart->item->image1 OR $cart->item->image2)
                                <div class="">
                                    <img src="{{ asset('/storage/images/noimage.png/') }}" style="width:100px; height:100px;">
                                </div>
                            @else
                                <div class="">
                                    <img src="{{asset('/storage/images/'.$cart->item->image1) }}" style="width:100px; height:100px;">
                                </div>
                            @endempty
                        </div>
                    </div>
                    <div class="my-auto col-10">
                        <div class="row text-right">
                            <div class="col-3">
                                <p class="mob-text">{{ $cart->item->name }}</p>
                            </div>
                            <div class="col-4">
                                <p class="mob-text">{{ $cart->item->description }}</p>
                            </div>
                            <div class="col-3">
                                <div class="row d-flex justify-content-start px-3">
                                    <input type="number" name="quantity[]" value="{{ $cart->quantity }}" id="" class="form-control w-25">
                                </div>
                            </div>
                            <div class="col-2">
                                <h6 class="mob-text">{{ $cart->item->price }}円</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="row d-flex justify-content-center border-top pt-5">
                    <div class="col-2">
                        <div class="row d-flex">
                        </div>
                    </div>
                    <div class="my-auto col-10">
                        <div class="row text-right">
                            <div class="col-3">合計金額</div>
                            <div class="col-4"></div>
                            <div class="col-3">
                                <?php $total_quantity = 0; 
                                    foreach($user->carts as $cart){
                                        $total_quantity = $total_quantity + $cart->quantity;
                                    }
                                ?>{{ $total_quantity }}
                            </div>
                            <div class="col-2">
                                <?php $total_price = 0; 
                                    foreach($user->carts as $cart){
                                        $total_price = $total_price + $cart->item->price;
                                    }
                                ?>
                                {{ $total_price }}円
                            </div>
                        </div>
                    </div>
                </div>
                    
                    

{{-- 
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="row ">
                            <div class="col-lg-3 radio-group">
                                <div class="row d-flex px-3 radio">
                                    <img class="pay w-50" src="https://lara-commerce-bucket.s3.amazonaws.com/public/images/master.jpeg">
                                    <p class="my-auto">Credit Card</p>
                                </div>
                                <div class="row d-flex px-3 radio gray">
                                    <img class="pay w-50" src="https://lara-commerce-bucket.s3.amazonaws.com/public/images/visa.jpeg">
                                    <p class="my-auto text-dark">Debit Card</p>
                                </div>
                                <div class="row d-flex px-3 radio gray mb-3">
                                    <img class="pay w-50" src="https://lara-commerce-bucket.s3.amazonaws.com/public/images/paypal.jpeg">
                                    <p class="my-auto text-dark">PayPal</p>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="row px-2">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">Name on Card</label>
                                        <input type="text" id="cname" name="cname" placeholder="Johnny Doe">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">Card Number</label>
                                        <input type="text" id="cnum" name="cnum"
                                            placeholder="1111 2222 3333 4444">
                                    </div>
                                </div>
                                <div class="row px-2">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">Expiration Date</label>
                                        <input type="text" id="exp" name="exp" placeholder="MM/YYYY">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="***">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-2">


                            </div>
                        </div>


                        <button class="btn btn-primary w-25">
                            <span>
                                <span id="checkout">Checkout</span>

                            </span>
                        </button> --}}

        {{-- </form> --}}
    </div>
    </div>
    </div>
    </div>

    {{-- <script>
        $(document).ready(function() {

            $('.radio-group .radio').click(function() {
                $('.radio').addClass('gray');
                $(this).removeClass('gray');
            });

            $('.plus-minus .plus').click(function() {
                var count = $(this).parent().prev().text();
                $(this).parent().prev().html(Number(count) + 1);
            });

            $('.plus-minus .minus').click(function() {
                var count = $(this).parent().prev().text();
                $(this).parent().prev().html(Number(count) - 1);
            });

        });
    </script> --}}
@endsection