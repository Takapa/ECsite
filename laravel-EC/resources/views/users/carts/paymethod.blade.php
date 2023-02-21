@extends('layouts.app')

@section('title', 'method pay')

@section('content')

<main>
    <div class="h2 container mt-5">お支払い方法</div>
        <div class="container justify-content-center bg-white card">
            <div class="card-body">
                <div class="row text-center p-4 border">
                    <input type="radio" name="pay" id="" style="width: 20px; height: 20px;">
                    <div class="col-11 h5">
                        <img src="{{ asset('/storage/images/visa.png') }}" style="width: 60px; height: 30px;">
                        <img src="{{ asset('/storage/images/master.jpeg') }}" style="width: 60px; height: 30px;">
                        <img src="{{ asset('/storage/images/jcb.jpg') }}" style="width: 60px; height: 30px;" class="me-3">
                        各種クレジットカード
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
    </div>
</main>

@endsection