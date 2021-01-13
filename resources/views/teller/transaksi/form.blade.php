@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{$title}}</div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nasabah">Nasabah</label>
                        <select name="nasabah" id="nasabah" class="form-control">
                            @foreach($nasabah as $k => $n)
                                <option value="{{$n->id}}">{{$n->no_rekening}} - {{$n->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-flat btn-primary btn-block disabled" id="lanjutkan" disabled>Lanjutkan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section("js")
    @include("msg")
    <script>
        $(document).ready(function () {
            const id = "btn btn-flat btn-primary btn-block ";
            let user_id = null;
            $("#nasabah").on("change",function (){
                user_id = $(this).val();
                if (user_id !== null){
                    console.log("Ada")
                    $("#lanjutkan").removeClass("disabled");
                    $("#lanjutkan").prop("disabled",false);
                    $("#lanjutkan").attr("href","{{($type == \App\Casts\SaveType::DEBIT)?route("transaksi.debit"):route("transaksi.kredit")}}/"+user_id);
                }
            })
            $("#nasabah").select2();
            $("#nasabah").val(parseInt("{{$nasabah[0]->id}}"));
            $("#nasabah").trigger("change")

        })
    </script>
@stop
