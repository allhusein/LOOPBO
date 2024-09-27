@extends('layouts.backend',['title'=>'category'])

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
<li class="breadcrumb-item active"><a href="#">Create Category</a></li>

@endsection

@section('content-backend')
<div class="row">
    <div class="col-md-6 col-xl-6">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Create New Category</h4>
                <div class="general-label">
                    <form method="POST" action="{{ route('category.update',$cat->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating ">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $cat->name ? $cat->name : old('name') }}" required autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="instruction" class="bmd-label-floating ">Instruction</label>
                            <input id="instruction" type="text" class="form-control @error('instruction') is-invalid @enderror" name="instruction" value="{{ $cat->instruction ? $cat->instruction : old('instruction') }}" required autocomplete="instruction">

                            @error('instruction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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