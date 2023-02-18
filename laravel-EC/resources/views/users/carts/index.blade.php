@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<main class=" show-img pb-5">
    <div class="container pt-5 w-75">
        <div class="text-center h1 text-primary">カート一覧</div>
        <table class="table table-bordered mx-auto mt-5">
            <thead class="table table-dark">
                <tr class="text-center">
                    <th>商品名</th>
                    <th>金額</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($user->carts as $cart)
                <tr>
                    <td>{{ $cart->item->name }}</td>
                    <td class="text-end" name="price[]">{{ $cart->item->price }}円</td>
                    <td class="text-end">
                        <form action="{{ route('cart.destroy', $cart->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-3 h2 fw-bold">カートに商品はありません。</td>
                </tr>
                @endforelse
            </tbody>
       
            <tfoot class="table table-secondary ">
                <tr>
                    <td class="text-center">合計金額</td>
                    <?php $total = 0; 
                        foreach($user->carts as $cart){
                            $total = $total + $cart->item->price;
                        }
                    ?>
                    <td class="text-end">{{ $total }}円</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <form action="{{ route('cart.show', $user->id) }}" method="get">
            @csrf
            <button type="submit" class="btn btn-warning btn-block btn-lg mt-4">Proceed to Pay</button>
        </form>
</div>
</div>
</main>
@endsection