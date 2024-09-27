@extends('layouts.backend',['title'=>'User'])

@section('breadcrumb')
<li class="breadcrumb-item active"><a href="">User</a></li>
@endsection

@section('content-backend')
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="card m-b-30">
            <div class="card-body">
                <ul class="list-unstyled nav">
                    <li class="nav-item"><h4 class="mt-0 header-title">Data User</h4></li>
                    @hasrole('superadmin')
                    <li class="nav-item ml-3"><a href="{{ route('user.create') }}"><i class="mdi mdi-account-plus "></i></a></li>
                    @endhasrole
                </ul>            
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    @hasrole('superadmin')
                        <th scope="col">Action</th>
                    @endhasrole
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                    @hasrole('superadmin')
                            <td>
                                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn"><i class="mdi mdi-account-remove"></i></button>
                                </form>
                            </td>
                    @endhasrole
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Not Found</td>
                            </tr>
                        @endforelse
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
    
@endsection