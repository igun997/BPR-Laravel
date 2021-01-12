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
                    <form action="{{$route??route("master.complaint.add_action")}}" method="post">
                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input type="text" name="name" value="{{$data->name??""}}" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-flat btn-danger btn-block" onclick="window.history.back()" type="button">Kembali</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-flat btn-success btn-block" type="submit">Simpan</button>
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
