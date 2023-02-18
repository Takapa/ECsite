@extends('layouts.app')

@section('title', 'Edit item')

@section('content')
<form action="{{ route('update', $item->id ) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="container w-75">
    <div class="mb-3">
        <label for="name" class="form-lavel text-muted">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $item->name) }}" autofocus>
        {{-- Error --}}     
        @error('name')
            <p class="text-danger.small">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-lavel text-muted">Price</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $item->price) }}">
        {{-- Error --}}     
        @error('price')
            <p class="text-danger.small">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-lavel text-muted">Description</label>
        <textarea name="description" rows=4 id="description" class="form-control">{{ old('description', $item->description) }}</textarea>
        {{-- Error --}}     
        @error('description')
            <p class="text-danger.small">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="stock" class="form-lavel text-muted">Stock</label>
        <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $item->stock) }}">
        {{-- Error --}}     
        @error('stock')
            <p class="text-danger.small">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-lavel text-muted">Image</label>
        <div>
            @if ($item->image1)
                <img src="{{ asset('/storage/images/' . $item->image1) }}" alt="{{ $item->image1 }}" class="mb-1" style="width:100px; height:170px;">
            @else
                <img src="{{ asset('/storage/images/download-1.png/') }}" class="mb-1" style="width:100px; height:170px;">
            @endif
            <input type="file" name="image1" id="image1" class="form-control mb-3" value="{{ old('image1', $item->image1) }}">

            @if ($item->image2)
                <img src="{{ asset('/storage/images/' . $item->image2) }}" alt="{{ $item->image2 }}" class="mb-1" style="width:100px; height:170px;">
            @else
                <img src="{{ asset('/storage/images/download-1.png/') }}" class="mb-1" style="width:100px; height:170px;">
            @endif
            <input type="file" name="image2" id="image2" class="form-control" value="{{ old('image2', $item->image2) }}">
        </div>
    </div>
    

    <button type="submit" class="btn btn-primary px-5">Save</button>
</div>
</form>
    
@endsection