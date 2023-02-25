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
                    <td class="text-center" style="width: 200px;">{{ number_format($cart->item->price) }}円</td>
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
                    <td class="text-center">{{ number_format($total) }}円</td>
                </tr>
            </tfoot>
        </table>

        <div class="container justify-content-center bg-white card">
            <div class="card-body">
                <div class="row p-4">
                    <div class="text-center border py-2">
                        <input type="radio" name="btn-main" value='page1を表示' class="m-4" style="width: 20px; height: 20px;" onclick="SelectPage(1)" checked>
                        <img src="{{ asset('/storage/images/visa.png') }}" class="ms-3" style="width: 60px; height: 30px;">
                        <img src="{{ asset('/storage/images/master.jpeg') }}" style="width: 60px; height: 30px;">
                        <img src="{{ asset('/storage/images/jcb.jpg') }}" style="width: 60px; height: 30px;" class="me-3">
                        <span class="h5">クレジットカード</span>
                    </div>
                    <div class="col-6 border p-4 text-center">
                        <input type="radio" id="" name="btn-main" value='page2を表示' class="" style="width: 20px; height: 20px;" onclick="SelectPage(2)"><span class="ms-3">銀行振込</span>
                    </div>
                    <div class="col-6 border p-4 text-center">
                        <input type="radio" id="" name="btn-main" value='page3を表示' class="" style="width: 20px; height: 20px;" onclick="SelectPage(3)">
                        <img src="{{ asset('/storage/images/paypay.png') }}" class="ms-3" style="width: 30px; height: 30px;">PayPay
                    </div>
                </div>
            </div>

            <div class="card-footer page1 " id="page1">
                <div class="row my-2">
                    <div class="col-6">
                        <label for="">クレジットカード番号</label>
                        <input type="number" name="" id="" style="width:400px;">
                    </div>
                    <div class="col-2">
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
                    </div>
                    <div class="col-4">
                        <label for="">セキュリティコード</label>
                        <input type="password" name="password" id="" autocomplete="off">
                    </div>
                </div>
            </div>
            
            <div class="card-footer page2" id="page2">
                <div class="row my-2">
                    <div class="col-3">
                        <label for="">銀行名</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                    <div class="col-1">
                        <label for="">支店番号</label>
                        <input type="number" name="" id=""  class="form-control" >
                    </div>
                    <div class="col-4">
                        <label for="">口座番号</label>
                        <input type="number" name="" id=""  class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="">名義</label>
                        <input type="text" name="" id=""  class="form-control">
                    </div>
                </div>
            </div>

            <div class="card-footer page3 bg-white" id="page3">
            </div>
        </div>
  
            <button type="submit" class="btn btn-warning btn-block btn-lg mt-4">購入確定</button>

        </form>
    </div>

    <script src="{{asset('/js/index.js')}}"></script>

@endsection
