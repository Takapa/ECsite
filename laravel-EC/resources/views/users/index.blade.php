@extends('layouts.app')

@section('title', 'User')

@section('content')
<div class="mx-auto" style="width: 1500px">
    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6 mb-3">
                <input type="email" name="email" id="email" class="form-control" autofocus>
                <label for="email" class="">Username</label>
                {{-- Error --}}     
                @error('email')
                    <p class="text-danger.small">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-6 mb-3">
                <input type="password" name="password" id="password" class="form-control">
                <label for="password" class="">Password</label>
                {{-- Error --}}     
                @error('password')
                    <p class="text-danger.small">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="row">
            <div class="col-3 mb-3">
                <input type="text" name="contact" id="contact" class="form-control">
                <label for="contact" class="form-lavel text-muted">Contact</label>
            </div>
            <div class="col-3 mb-3">
                <input type="text" name="name" id="name" class="form-control">
                <label for="name" class="form-lavel text-muted">Fullname</label>
                {{-- Error --}}     
                @error('name')
                    <p class="text-danger.small">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-3 mb-3">
                <input type="text" name="location" id="location" class="form-control">
                <label for="location" class="form-lavel text-muted">Location</label>
            </div>
            <div class="col-3 mb-3">
                <input type="number" name="age" id="age" class="form-control">
                <label for="age" class="form-lavel text-muted">Age</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success px-3">Save User</button>  
    </form>            
   
    <div class="row">
    @foreach ($all_users as $user)
        <div class="card mt-5 mx-2" style="width: 288px; height:300px;  float:left">
            <div class="card-body bg-white">
                <p>Username: {{ $user->email }}</p>
                <p>Contact: {{ $user->contact }}</p>
                <p>Fullname: {{ $user->name }}</p>
                <p>Location: {{ $user->location }}</p>
                <p>Age: {{ $user->age }}</p>
                <button type="button" class="btn btn-primary btn-sm me-3 mt-3" style="float:left;" data-toggle="modal" data-target="#edit-user-{{ $user->id }}">Edit User</button>
                @include('users.modal.edit')
                <button type="button" class="btn btn-danger btn-sm mt-3"  data-toggle="modal" data-target="#delete-user-{{ $user->id }}">Delete User</button>
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