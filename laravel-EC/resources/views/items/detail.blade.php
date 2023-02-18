@extends('layouts.app')

@section('title', 'detail item')

@section('content')
<section>
    <form action="{{ route('cart.store', $item->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="quantity" value="1">

    <div class="container mx-auto w-75 mt-5">
        <div class="container mx-auto w-75">
            <div class="row bg-white border">
                <div class="col-6 border">
                    <div class="row border" style="height: 403px;">
                        <div class="text-center main_img">
                            @if ($item->image1 or $item->image2)
                                @if ($item->image1 )
                                    <img src="{{ asset('/storage/images/' . $item->image1) }}" style="width:300px; height:400px;">   
                                @else
                                    <img src="{{ asset('/storage/images/' . $item->image2) }}" style="width:300px; height:400px;">   
                                @endif
                            @else
                                <img src="{{ asset('/storage/images/download-1.png/') }}" style="width:400px; height:590px;">
                            @endif
                        </div>
                    </div>
                    <div class="row" style="height: 190px;">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 ps-5 pt-2 sub_img">
                                @if ($item->image1)
                                    <img src="{{ asset('/storage/images/' . $item->image1) }}" alt="{{ $item->image1 }}" class="border p-2 me-2" style="width:100px; height:170px; float:left;">
                                @endif
                                @if ($item->image2)
                                    <img src="{{ asset('/storage/images/' . $item->image2) }}" alt="{{ $item->image2 }}" class="border p-2" style="width:100px; height:170px;">
                                @endif                
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 border" style="position:relative;">
                    <h2 class="h2 my-3">{{ $item->name }}</h2>
                    <h4 class="h4 my-3">{{ $item->description }}</h4>
                    <h4 class="h2 my-3">{{ $item->price }}円</h4>
                    <h4 class="h4 my-3 text-primary">在庫数: {{ $item->stock ? $item->stock."" : "入荷待ち" }}</h4>
                    <div class="favorite_button" style="position:absolute; top:12px; right:20px;">
                        <button class="favorite_button_in btn text-decoration-none"><i class="fa-regular fa-heart"></i></button>
                    </div>
                    <br>
                    <div class="" style="position:absolute; bottom:240px; left:20px;">
                        <a href="#" class="btn btn-lg btn-outline-dark">今すぐ購入</a>
                        <button type="submit" class="btn btn-lg bg-dark text-white ms-2" {{ $item->stock == 0 ? "disabled" : "" }}>カートに追加</button>    
                    </div>
                </div>    
            </div>
        </div>
    </form>
</section>

<!------ Jquery (for switting picture) ------> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function()
        {
            $(".sub_img dt").eq(0).addClass("select");
            $(".sub_img img").click(function()
            {
                var img = $(this).attr("src");
            
                $(".sub_img dt").removeClass("select");
                $(this).parent().addClass("select");
            
                $(".main_img img").fadeOut(500, function()
                {
                    $(this).attr("src", img),
                    $(this).fadeIn(500)
                });
            });
        });
</script>
<!--------------------------------------------> 

@endsection