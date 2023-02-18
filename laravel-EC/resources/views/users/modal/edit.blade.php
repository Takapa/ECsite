<form action="{{ route('user.update', $user->id ) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="modal fade" id="edit-user-{{ $user->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit User</h3>
                </div>
                <div class="modal-body">
                    <label for="email" class="form-lavel text-muted">Username</label>
                    <input type="text" name="email" id="email" class="form-control mb-2" value="{{ old('email', $user->email) }}" autofocus>
                    {{-- Error --}}     
                    @error('email')
                        <p class="text-danger.small">{{ $message }}</p>
                    @enderror

                    <label for="contact" class="form-lavel text-muted">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control mb-2" value="{{ old('contact', $user->contact) }}">
                    
                    <label for="name" class="form-lavel text-muted">Fullname</label>
                    <input type="text" name="name" id="name" class="form-control mb-2" value="{{ old('name', $user->name) }}">
                    {{-- Error --}}     
                    @error('name')
                        <p class="text-danger.small">{{ $message }}</p>
                    @enderror

                    <label for="location" class="form-lavel text-muted">Location</label>
                    <input type="text" name="location" id="location" class="form-control mb-2" value="{{ old('location', $user->location) }}">

                    <label for="age" class="form-lavel text-muted">Age</label>
                    <input type="number" name="age" id="age" class="form-control mb-2" value="{{ old('age', $user->age) }}">

                </div>
                <div class="modal-footer mb-0">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
       
        