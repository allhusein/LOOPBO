@extends('layouts.backend',['title'=>'Question'])

@section('breadcrumb')
<li class="breadcrumb-item active"><a href="">Question</a></li>
@endsection

@push('after-style')
<style>
    .bmd-form-group {
        padding : 0;
    }
</style>
@endpush

@section('content-backend')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="row justify-content-center">
                            <div class="col-md-2 col-sm-12">
                                Nama Kategori
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="w-100 px-3" readonly value="{{$category->name}}">
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-2 col-sm-12">
                                Instruksi Pengerjaan
                            </div>
                            <div class="col-md-4">
                                <textarea type="text" class="w-100 px-3" readonly>{{$category->instruction}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 justify-content-center" id="rowSoal">
                    @forelse($category->question as $q)
                    @php $forjs=[]; $forjs[]=array_push($forjs,$q->id) @endphp
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-right">
                                    <form action="{{route('question.destroy',$q->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-outline-danger" style="font-size:22px;">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                    </form>
                                </div>
                                    <form action="{{route('question.store')}}" method="post">
                                    @csrf   
                                    <input type="hidden" name="id" class="cat-id" data-catid="{{$category->id}}" value="{{$category->id}}">
                                    <input type="hidden" name="qid" class="cat-id" data-catid="{{$q->id ? $q->id : ''}}" value="{{$q->id ? $q->id : ''}}">
                                    <input type="hidden" class="true-answer">
                                <div class="row">
                                    <div class="col-md-2">Soal</div>
                                    <div class="col-md-8">
                                        <textarea name="question" class="w-100" rows="5">{{$q->question}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-2 align-items-center">
                                    <div class="col-md-2">Jawaban</div>
                                    <div class="col-md-8" id="input-dinamis-jawaban-{{$q->id}}">
                                        @foreach($q->answers as $a)
                                        <div class="row align-items-center mt-2">
                                            <div class="col-md-2 text-right itteration" data-id="{{$loop->iteration }}">{{$loop->iteration }}</div>
                                            <div class="col-md-8">
                                                <input class="w-100 answer" type="text" name="answer[{{$a->id}}]" value="{{old('answer') ? old('answer') : $a->answer}}">
                                                @if($a->is_true)
                                                <small>Jawaban Benar</small>
                                                @endif
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{route('question.answer.check',$a->id)}}" class="text-primary btn-hapus-jawaban-{{$a->id}}">
                                                    @if($a->is_true)
                                                    <i class="mdi mdi-check"></i>
                                                    @else
                                                    <i class="mdi mdi-close text-danger"></i>
                                                    @endif
                                                </a>
                                                <a href="{{route('question.answer.delete',$a->id)}}" class="text-danger btn-hapus-jawaban-{{$a->id}}">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center btn-tambah-jawaban-{{$q->id}}">
                                    <div class="col-md-6" style="cursor:pointer;">
                                        <i class="mdi mdi-plus"></i> Tambah Jawaban
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12 h4">
                                        <button type="submit" class="border-0" style="background:none;cursor:pointer;">
                                            <i class="mdi mdi-content-save"></i>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    @php $forjs=[];  @endphp
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-right">
                                    <a href="" class="text-danger" style="font-size:22px;">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </div>
                                <form action="{{route('question.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$category->id}}">
                                    <input type="hidden" class="true-answer">
                                <div class="row">
                                    <div class="col-md-2">Soal</div>
                                    <div class="col-md-8">
                                        <textarea name="question" class="w-100" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-2 align-items-center">
                                    <div class="col-md-2">Jawaban</div>
                                    <div class="col-md-8" id="input-dinamis-jawaban">
                                        <div class="row align-items-center mt-2">
                                            <div class="col-md-2 text-right itteration" data-id="1">1</div>
                                            <div class="col-md-8">
                                                <input class="w-100 answer" type="text" name="answer[]" id="">
                                            </div>
                                            <div class="col-md-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center btn-tambah-jawaban">
                                    <div class="col-md-6" style="cursor:pointer;">
                                        <i class="mdi mdi-plus"></i> Tambah Jawaban
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12 h4">
                                        <button type="submit" class="border-0" style="background:none;cursor:pointer;">
                                            <i class="mdi mdi-content-save"></i>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-6 btn-tambah-soal" style="cursor:pointer;">
                        <i class="mdi mdi-plus"></i> Tambah Soal
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection

@push('after-script')

<script>
   
   
    <?php foreach($forjs as $fs) : ?>
    function addJawaban<?= $fs ?>(){
        i = 1;
        let addRowJawaban = '<div class="row align-items-center mt-2 last">\
    <div class="col-md-2 text-right itteration data-id='+i+'">'+i+'</div>\
    <div class="col-md-8">\
    <input class="w-100" type="text" name="answer[]" id="">\
    </div>\
    <div class="col-md-2">\
    <span href="" class="text-danger btn-hapus-jawaban">\
    <i class="mdi mdi-delete"></i>\
    </span>\
    </div>\
    </div>';
        $('#input-dinamis-jawaban-<?= $fs ?>').append(addRowJawaban);
        
        var dataList = $("#input-dinamis-jawaban-<?= $fs ?> .itteration").map(function() {
            return $(this).data("id");
        }).get();
        i = dataList.slice(-1)[0] +1;
        $('#input-dinamis-jawaban-<?= $fs ?> .itteration').last().attr('data-id',i);
        $('#input-dinamis-jawaban-<?= $fs ?> .itteration').last().html(i);
    }
    
    $('.btn-tambah-jawaban-<?= $fs ?>').on('click',function(){
        addJawaban<?= $fs ?>();
    })
    $('#input-dinamis-jawaban-<?= $fs ?>').on('click','.btn-hapus-jawaban',function(){
        $(this).parent().parent('.last').remove()
    })
    <?php endforeach ?>
    

    function addJawaban(){
        i = 1;
        let addRowJawaban = '<div class="row align-items-center mt-2 last">\
    <div class="col-md-2 text-right itteration data-id='+i+'">'+i+'</div>\
    <div class="col-md-8">\
    <input class="w-100" type="text" name="answer[]" id="">\
    </div>\
    <div class="col-md-2">\
    <span href="" class="text-danger btn-hapus-jawaban">\
    <i class="mdi mdi-delete"></i>\
    </span>\
    </div>\
    </div>';
        $('#input-dinamis-jawaban').append(addRowJawaban);
        
        var dataList = $("#input-dinamis-jawaban .itteration").map(function() {
            return $(this).data("id");
        }).get();
        i = dataList.slice(-1)[0] +1;
        $('#input-dinamis-jawaban .itteration').last().attr('data-id',i);
        $('#input-dinamis-jawaban .itteration').last().html(i);
    }
    
    $('.btn-tambah-jawaban').on('click',function(){
        addJawaban();
    })
    $('#input-dinamis-jawaban').on('click','.btn-hapus-jawaban',function(){
        $(this).parent().parent('.last').remove()
    })


    function addSoal(){
        i= 1;
        let addRowSoal = '<div class="col-md-6 col-sm-12">\
                        <div class="card">\
                            <div class="card-body">\
                                <div class="text-right">\
                                    <a href="" class="text-danger" style="font-size:22px;">\
                                    </a>\
                                </div>\
                                <form action="{{route("question.store")}}" method="post">@csrf\
                                    <input type="hidden" name="id" value="{{$category->id}}">\
                                    <input type="hidden" class="true-answer">\
                                <div class="row">\
                                    <div class="col-md-2">Soal</div>\
                                    <div class="col-md-8">\
                                        <textarea name="question" class="w-100" rows="5">   </textarea>\
                                    </div>\
                                </div>\
                                <div class="row mt-2 align-items-center">\
                                    <div class="col-md-2">Jawaban</div>\
                                    <div class="col-md-8" id="input-dinamis-jawaban">\
                                        <div class="row align-items-center mt-2">\
                                            <div class="col-md-2 text-right itteration" data-id="1">1</div>\
                                            <div class="col-md-8">\
                                                <input class="w-100 answer" type="text" name="answer[]" id="">\
                                            </div>\
                                            <div class="col-md-2">\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="row mt-3 justify-content-center btn-tambah-jawaban">\
                                    <div class="col-md-6" style="cursor:pointer;">\
                                    </div>\
                                </div>\
                                <div class="row mt-5">\
                                    <div class="col-md-12 h4">\
                                        <button type="submit" class="border-0" style="background:none;cursor:pointer;">\
                                            <i class="mdi mdi-content-save"></i>\
                                        </button>\
                                    </div>\
                                </div>\
                                </form>\
                            </div>\
                        </div>\
                    </div>'
        $('#rowSoal').append(addRowSoal);
    }

    $('.btn-tambah-soal').on('click',function(){
        addSoal();
    })

    

</script>

@endpush
