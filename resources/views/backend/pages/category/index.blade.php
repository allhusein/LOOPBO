@extends('layouts.backend',['title'=>'Category'])

@section('breadcrumb')
<li class="breadcrumb-item active"><a href="">Category</a></li>
@endsection

@section('content-backend')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title text-center">LATIHAN MATERI KONSEP DASAR PBO</h4>
                @hasrole('superadmin|dosen')
                <a href="{{route('category.create')}}">
                    <button class="btn btn-primary rounded-sm">
                        <i class="mdi mdi-plus"></i>
                        <span> Tambah </span>
                    </button>
                </a>
                @endhasrole
                <div class="row">
                    @foreach($categories as $cat)
                    <div class="col-md-4">
                        <div class="col border shadow px-4 py-2 d-inline-block border-dark bg-primary">
                            <br><br>
                            <h5 class="text-white text-center">{{ $cat->name }}</h5>
                            <br><br>
                        </div>
                        <div class="col">
                            <div class="row justify-content-center">
                                @hasrole('superadmin|dosen')

                                <form action="{{route('question.index').'?id='.$cat->id}}" method="get">
                                    <input type="hidden" name="id" value="{{ $cat->id }}">
                                    <button type="submit" class="">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </button>
                                </form>
                                <form action="{{route('preview').'?id='.$cat->id}}" method="get">
                                    <input type="hidden" name="id" value="{{ $cat->id }}">
                                    <input type="hidden" name="test" value="1">
                                    <button type="submit" class="">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                </form>
                                <form action="{{route('category.destroy',$cat->id)}}" method="post" class="need-alert">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="" >
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </form>

                                @endhasrole
                                @hasrole('mahasiswa')
                                <a href="{{route('exercise.index').'?id='.$cat->id}}">

                                    <form action="{{route('exercise.index').'?id='.$cat->id}}" method="get">

                                        <input type="hidden" name="id" value="{{ $cat->id }}">
                                        <button type="submit" class="">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                    </form>
                                    @endhasrole

                            </div>
                        </div>
                        {{-- <div class="col-sm">col-sm</div>
                        <div class="col-sm">col-sm</div> --}}
                    </div>
                    @endforeach

                </div>
                {{-- @foreach($categories as $cat)
                <div class="col-md-4 col-sm-6 text-center mt-5">
                    <div class="border shadow px-4 py-2 d-inline-block border-dark bg-primary">
                        <br>
                        <br>
                        <div class="mt-2">
                            <span class="h5 mx-3 text-white">Attribut</span>

                        </div>
                        <br>
                        <br>

                    </div>

                </div>

                <div class="col-md-4 text-center">

                    <a href="http://localhost:8001/admin/category/3/edit">
                        <i class="mdi mdi-lead-pencil"></i>
                    </a>
                    <a href="http://localhost:8001/admin/question?id=3">
                        <i class="mdi mdi-eye"></i>
                    </a>
                    <a href="http://localhost:8001/admin/category/3/edit">
                        <i class="mdi mdi-delete"></i>
                    </a>
                </div>
            </div>
            @endforeach --}}
            {{-- @foreach($categories as $cat)
            <div class="col-md-4 col-sm-6 text-center mt-5">
                @hasrole('superadmin|dosen')
                <a href="{{route('question.index').'?id='.$cat->id}}">
                    @endhasrole
                    @hasrole('mahasiswa')
                    <a href="{{route('exercise.index').'?id='.$cat->id}}">
                        @endhasrole
                        <img class="rounded" src="https://via.placeholder.com/200" width="200" alt="Card image cap">
                    </a>
                    <div class="mt-2">
                        <span class="h5 mx-3">{{$cat->name}}</span>
                        @hasrole('superadmin|dosen')
                        <a href="{{route('category.edit',$cat->id)}}">
                            <i class="mdi mdi-lead-pencil"></i>
                        </a>
                        @endhasrole
                    </div>
            </div>
            @endforeach --}}
        </div>
    </div>
</div> <!-- end col -->
</div> <!-- end row -->

@endsection

@push('after-script')
<script>
    function archiveFunction() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "But you will still be able to retrieve this file.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, archive it!",
  cancelButtonText: "No, cancel please!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}
</script>
@endpush
