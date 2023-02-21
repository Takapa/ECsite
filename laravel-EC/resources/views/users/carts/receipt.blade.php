@extends('layouts.app')

<style>
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

    .horizontal-timeline .items {
        border-top: 2px solid #ddd;
    }

    .horizontal-timeline .items .items-list {
        position: relative;
        margin-right: 0;
    }

    .horizontal-timeline .items .items-list:before {
        content: "";
        position: absolute;
        height: 8px;
        width: 8px;
        border-radius: 50%;
        background-color: #ddd;
        top: 0;
        margin-top: -5px;
    }

    .horizontal-timeline .items .items-list {
        padding-top: 15px;
    }
</style>

@section('content')
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <h2 class="text-center">ご購入ありがとうございました</h2>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                        <div class="card-body p-5">

                            <p class="lead fw-bold mb-5" style="color: #f37a27;">領収書</p>

                            <div class="row">
                                <div class="col mb-3">
                                    <p class="small text-muted mb-1">注文日時</p>

                                    <p>{{ $paid_items->first()->created_at->format('j-F-Y') }}</p>
                                    <p>{{ $paid_items->first()->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="col mb-3">
                                    <p class="small text-muted mb-1">注文No.</p>
                                    <p>{{ $paid_items->first()->transaction_id  }}</p>
                                </div>
                            </div>

                            <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                                @foreach ($paid_items as $item)
                                    <?php $total = $total + $item->item->price * $item->quantity ?>
                                    <div class="row">
                                        <div class="col-md-8 col-lg-9">
                                            <p>{{ $item->item->name }}</p>
                                        </div>
                                        <div class="col-md-4 col-lg-3">
                                            <p>{{ $item->item->price * $item->quantity }}円</p>
                                        </div>
                                    </div>
                                    @if ($loop->last)
                                        <div class="row">
                                            <div class="col-md-8 col-lg-9">
                                                <p class="mb-0">送料</p>
                                            </div>
                                            <div class="col-md-4 col-lg-3">
                                                <p class="mb-0">250円</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="row my-4">

                                <div class="col-md-4 col-lg-3 offset-lg-9">
                                    <p class="lead fw-bold mb-0" style="color: #f37a27;">{{ number_format($total + 250) }}円</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
