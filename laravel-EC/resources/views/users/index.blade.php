@extends('layouts.app')

@section('title', 'User')

@section('content')
<div class="mx-auto mt-5" style="width: 1500px">
    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6 mb-3">
                <input type="email" name="email" id="email" class="form-control" autofocus autocomplete="off">
                <label for="email" class="">ユーザー名</label>
                {{-- Error --}}     
                @error('email')
                    <p class="text-danger.small">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                <label for="password" class="">パスワード</label>
                {{-- Error --}}     
                @error('password')
                    <p class="text-danger.small">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="row">
            <div class="col-3 mb-3">
                <input type="text" name="contact" id="contact" class="form-control">
                <label for="contact" class="form-lavel text-muted">電話番号</label>
            </div>
            <div class="col-3 mb-3">
                <input type="text" name="name" id="name" class="form-control">
                <label for="name" class="form-lavel text-muted">氏名</label>
                {{-- Error --}}     
                @error('name')
                    <p class="text-danger.small">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-3 mb-3">
                <input type="text" name="location" id="location" class="form-control">
                <label for="location" class="form-lavel text-muted">住所</label>
            </div>
            <div class="col-3 mb-3">
                <input type="number" name="age" id="age" class="form-control">
                <label for="age" class="form-lavel text-muted">年齢</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success px-3">登録</button>  
    </form>            
   
    <div class="row">
    @foreach ($all_users as $user)
        <div class="card mt-5 mx-2" style="width: 288px; height:300px;  float:left">
            <div class="card-body bg-white">
                <p>ユーザー名: {{ $user->email }}</p>
                <p>氏名: {{ $user->name }}</p>
                <p>電話番号: {{ $user->contact }}</p>
                <p>住所: {{ $user->location }}</p>
                <p>年齢: {{ $user->age }}</p>
                <button type="button" class="btn btn-primary btn-sm me-3 mt-3" style="float:left;" data-toggle="modal" data-target="#edit-user-{{ $user->id }}">内容変更</button>
                @include('users.modal.edit')
                <button type="button" class="btn btn-danger btn-sm mt-3"  data-toggle="modal" data-target="#delete-user-{{ $user->id }}">削除</button>
                @include('users.modal.delete')
            </div>
        </div>
    @endforeach
    </div>

    <div class="d-flex mt-3">
        {!! $all_users->links() !!}
    </div>

</div>

@endsection