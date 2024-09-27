@extends('layouts.backend',['title'=>'User'])

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
<li class="breadcrumb-item active"><a href="#">Create User</a></li>

@endsection

@section('content-backend')
<div class="row">
    <div class="col-md-6 col-xl-6">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Create New User</h4>
                <div class="general-label">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating ">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="bmd-label-floating ">Email Adrress</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="bmd-label-floating">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="bmd-label-floating">Password Confirmation</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                                                  
                        <button type="submit" class="btn btn-primary btn-raised mb-0">Submit</button>
                        <button type="reset" class="btn btn-raised btn-danger mb-0">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
    
@endsection