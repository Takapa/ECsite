@extends('layouts.app')

@section('title', 'checkout cart')

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


            <form action="{{ route('cart.buy') }}" method="post">
            @csrf
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

        <div class="container justify-content-center bg-white card">
            <div class="card-body">
                <div class="row p-4 border">
                    <div class="col-6 h5">
                        <input type="radio" name="pay" id="" style="width: 20px; height: 20px;">
                        <img src="{{ asset('/storage/images/visa.png') }}" style="width: 60px; height: 30px;">
                        <img src="{{ asset('/storage/images/master.jpeg') }}" style="width: 60px; height: 30px;">
                        <img src="{{ asset('/storage/images/jcb.jpg') }}" style="width: 60px; height: 30px;" class="me-3">
                        クレジットカード
                    </div>
                    <div class="col-6">
                        <label for="">クレジットカード番号</label>
                        <input type="number" name="" id="">

                        <label for="">有効期限</label>
                        <select name="" id="">
                            <option value="" hidden>月</option>
                            <?php
                                for ( $i = 1; $i <= 12; $i++ ) {
                                 echo "<option value=\"{$i}\">{$i}</option>";
                                }
                            ?>
                        </select>

                        <select name="" id="">
                            <option value="" hidden>年</option>
                            <?php
                                for ( $i = 2023; $i <= 2035; $i++ ) {
                                 echo "<option value=\"{$i}\">{$i}</option>";
                                }
                            ?>
                        </select>
                        
                        <label for="">セキュリティコード</label>
                        <input type="password" name="" id="">
                    </div>
                </div>
                <div class="row border text-center h5">
                        <input type="radio" name="pay" id="" class="col-1 m-4 " style="width: 20px; height: 20px;">
                        <div class="col-5 border-end py-4">
                            <img src="{{ asset('/storage/images/paypay.png') }}" class="me-3" style="width: 30px; height: 30px;">PayPay
                        </div>
                        <input type="radio" name="pay" id="" class="col-1 m-4" style="width: 20px; height: 20px;">
                        <div class="col-5 py-4">
                            <img src="{{ asset('/storage/images/rpay.png') }}" style="width: 60px; height: 30px;">楽天Pay
                        </div>
                </div>
            </div>
        </div>
  
            <button type="submit" class="btn btn-warning btn-block btn-lg mt-4">購入</button>
        </form>
    </div>

        
@endsection