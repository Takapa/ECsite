@extends('layouts.app')

@section('title', 'Item')

@section('content')

<main class="bg-dark show-img">
    <div class="container pt-5 w-75">
        <div class="text-center h1 text-primary">商品一覧</div>
            <div class="my-1" style="overflow: auto;">
            @foreach ($all_items as $item)
                <form action="{{ route('cart.store', $item->id) }}" method="post" enctype="multipart/form-data" class="my-1">
                @csrf
                <input type="hidden" name="quantity" value="1">
                    <div class="card my-5 me-4" style="float: left; width: 23.10%;">
                        <div class="cord-header border">
                            @if ($item->image1 or $item->image2)
                                @if ($item->image1)
                                    <img src="{{ asset('storage/images/' . $item->image1)}}" style="width:100%; height:290px;" class="border w-100"> 
                                @else
                                    <img src="{{ asset('storage/images/' . $item->image2)}}" style="width:297px; height:290px;" class="border"> 
                                @endif
                            @else
                                <img src="{{ asset('/storage/images/noimage.png/') }}" style="width:297px; height:290px;"> 
                            @endif
                        </div>
                        <div class="card-body bg-white">
                            <h4 class="text-center">{{ $item->name }}</h4>
                            <div class="h5 my-3">金 額：{{ $item->price }}円</div>
                            <div class="h5 my-3 text-primary">在庫数：{{ $item->stock ? $item->stock."" : "入荷待ち" }}</div>
                            <button type="submit" class="btn btn-outline-primary btn btn-sm mt-2" {{ $item->stock == 0 ? "disabled" : "" }}><i class="fa-solid fa-cart-plus"></i>カートに追加</button>
                            <a href="{{ route('detail', $item->id) }}" class="btn btn-info btn-sm mt-2 float-end">もっと見る</a>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $all_items->links() !!}
        </div>
</main>


        
@endsection