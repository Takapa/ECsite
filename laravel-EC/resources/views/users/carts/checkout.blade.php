@extends('layouts.app')

@section('content')
    <div class="container px-4 my-5 mx-auto">
        <table class="w-100 table">
            <div class="h3">買い物バッグ</div>
            <thead class="table table-dark">
                <tr>
                    <th class="text-center" style="width: 120px;"></th>
                    <th class="text-center" style="width: 230px;">商品名</th>
                    <th >商品内容</th>
                    <th class="text-center" style="width: 180px;">数量</th>
                    <th class="text-center" style="width: 200px;">金額</th>
                </tr>
            </thead>
            <tbody>            
                @forelse ($user->carts as $cart)
                <input type="hidden" name="id[]" value="{{ $cart->id }}">
                <tr class="border align-middle">    
                    <td class="text-center" style="width: 120px;">
                        @empty($cart->item->image1 OR $cart->item->image2)
                        <div class="">
                            <img src="{{ asset('/storage/images/noimage.png/') }}" style="width:100px; height:100px;">
                        </div>
                        @else
                            <div class="">
                                <img src="{{asset('/storage/images/'.$cart->item->image1) }}" style="width:100px; height:100px;">
                            </div>
                        @endempty
                    </td>
                    <td class="text-center" style="width: 230px;">{{ $cart->item->name }}</td>
                    <td class="text-truncate" style="max-width: 200px;">{{ $cart->item->description }}</td>
                    <td class="text-center" style="width: 180px;">
                        <input type="number" name="quantity[]" value="{{ $cart->quantity }}" id="" class="w-25">
                    </td>
                    <td class="text-center" style="width: 200px;">{{ $cart->item->price }}円</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">カートに商品はありません。</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot class="table table-secondary ">
                <tr>
                    <td colspan="4" class="text-center">合計金額</td>
                    <?php $total = 0; 
                        foreach($user->carts as $cart){
                            $total = $total + $cart->item->price;
                        }
                    ?>
                    <td class="text-center">{{ $total }}円</td>
                </tr>
            </tfoot>

        </table>
    </div>

        {{-- <form action="#" method="post">
            @csrf --}}
            

                    
            <div class="row justify-content-center mt-5">
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
                        </button>

        {{-- </form> --}}
    </div>
    </div>
    </div>
    </div
@endsection