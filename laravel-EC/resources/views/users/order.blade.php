@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center" id="order-heading">
        <div class="text-uppercase">
            <p>ご注文内容 詳細</p>
        </div>
        <div class="h4"> {{ $order_details->created_at->format('F j Y') }}</div>
        <div class="pt-1">
            <p>注文 #{{ $order_details->transaction_id }} is currently<b class="text-dark text-uppercase">
                    {{ $order_details->status }}</b></p>
        </div>
        <div class="btn close text-white"> &times; </div>
    </div>
    <div class="container bg-white">
            <table class="table table-borderless">
                <thead>
                    <tr class="text-uppercase text-muted">
                        <th scope="col">商品</th>
                        <th scope="col" class="text-right">合計</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td class="text-right"><b>{{ number_format($total) }}</b></td>
                    </tr>
                </tbody>
            </table>

        <div class="pt-2 border-bottom mb-3"></div>
        <div class="d-flex justify-content-start align-items-center pl-3">
            <div class="text-muted">支払い方法</div>
            <div class="ml-auto"> <img
                    src="{{asset('storage/images/visa.png')}}" alt=""
                    width="30" height="30"> <label>Visa ******5342</label> </div>
        </div>
        <div class="d-flex justify-content-start align-items-center py-1 pl-3">
            <div class="text-muted">送料 &nbsp; </div>
            <div class="ml-auto"> <label>250円</label> </div>
        </div>

        <div class=" justify-content-start align-items-center pl-3 py-3 mb-4 border-bottom">
            <div class="text-muted"> 合計 &nbsp; {{  number_format($total) + 250 }} 円</div>

        </div>
        <div class="row border rounded p-1 my-3">
            <div class="col-md-6 py-3">
                <div class="d-flex flex-column align-items start"> <b>発送元住所</b>
                    <p class="text-justify pt-2">東京都 大田区 356 220</p>
                </div>
            </div>
            <div class="col-md-6 py-3">
                <div class="d-flex flex-column align-items start"> <b>発送先住所</b>
                    <p class="text-justify pt-2">東京都 大田区 356 221</p>
                </div>
            </div>
        </div>
    </div>
@endsection
