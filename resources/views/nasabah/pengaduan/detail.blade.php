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
                    <form action="{{$route??route("nasabah.pengaduan.add_action")}}" method="post">
                        <div class="form-group">
                            <label for="name">Judul Masalah</label>
                            <input type="text" name="subject"  disabled value="{{$data->subject}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Deskripsi Permasalahan</label>
                            <textarea name="content" id="" cols="30" rows="10" disabled class="form-control">{{$data->content}}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-flat btn-danger btn-block" onclick="window.history.back()" type="button">Kembali</button>
                            </div>
                        </div>
                    </form>
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

        })
    </script>
@stop
