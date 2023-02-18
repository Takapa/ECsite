@extends('layouts.app')

@section('title', 'Item')

@section('content')
<div class="container w-75">
    <div class="my-5">
        <h2 class="text-center">Add an item</h2>
    </div>

    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" id="name" class="form-control" autofocus>
            <label for="name" class="form-lavel text-muted">名前</label>
            {{-- Error --}}     
            @error('name')
                <p class="text-danger.small">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="number" name="price" id="price" class="form-control">
            <label for="price" class="form-lavel text-muted">価格</label>
            {{-- Error --}}     
            @error('price')
                <p class="text-danger.small">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <textarea name="description" rows=4 id="description" class="form-control"></textarea>
            <label for="description" class="form-lavel text-muted">詳細</label>
            {{-- Error --}}     
            @error('description')
                <p class="text-danger.small">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="number" name="stock" id="stock" class="form-control">
            <label for="stock" class="form-lavel text-muted">在庫数</label>
            {{-- Error --}}     
            @error('stock')
                <p class="text-danger.small">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="file" name="image1" id="image1" class="form-control" value="">
            <label for="image" class="form-lavel text-muted">Image1</label>
        </div>
        <div class="mb-3">
            <input type="file" name="image2" id="image2" class="form-control" value="">
            <label for="image" class="form-lavel text-muted">Image2</label>
        </div>
        <button type="submit" class="btn btn-success px-3">商品登録</button>
    </form>
            

    <table class="table table-bordered mx-auto mt-5">
        <thead class="bg-dark text-white">
            <tr class="">
                <th>名前</th>
                <th>価格</th>
                <th>詳細</th>
                <th style="width: 200px;"></th>
                <th style="width: 200px;"></th>
            </tr>
        </thead>
        <tbody>
        @forelse ($all_items as $item)
            <tr class="fw-bold">
                <td class="">{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td class="text-truncate" style="max-width: 150px;">{{ $item->description }}</td>
                <td><a href="{{ route('edit', $item->id) }}" class="btn btn-outline-warning">編集</a></td>
                <td>
                    <form action="{{ route('destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger">削除</button>
                    </form>
                </td>
            </tr>
        @empty
            <div style="margin-top:100 px">
                <h2 class="text-muted text-center">No Item yet.</h2>
            </div>         
        @endforelse
        </tbody>
    </table>


    <div class="d-flex">
        {!! $all_items->links() !!}
    </div>
</div>
@endsection