@extends('layouts.backend',['title'=>'Dashboard'])

@section('breadcrumb')

<li class="breadcrumb-item active"><a href="">Dashboard</a></li>

@endsection

@section('content-backend')
<div class="row">
    <div class="col-md">
        Welcome to Dashboard {{ ucfirst(auth()->user()->name) }}
    </div>
</div>

@hasrole('mahasiswa')
{{-- {{ dd(auth()->user()) }} --}}
<div class="row mt-5">
    <div class="col-md">
        <img src="{{asset('assets_backend/images/petunjuk.png')}}" alt="" style="width:100%">
    </div>
</div>
@endhasrole
@hasrole('dosen')
<div class="row mt-5">
    <div class="col-md">
        <img src="{{asset('assets_backend/images/petunjuk-dosen.png')}}" alt="" style="width:100%">
    </div>
</div>
@endhasrole

@endsection
