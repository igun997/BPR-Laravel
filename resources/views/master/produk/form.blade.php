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
                    <form action="{{$route??route("master.produk.add_action")}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" value="{{$data->name??""}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">Tipe</label>
                        <select name="type" id="type" class="form-control">
                            @foreach(\App\Casts\ProductType::select($data->type ?? -1) as $k => $v)
                                <option value="{{$v["id"]}}" {{($v["selected"])?"selected":""}}>{{$v["text"]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="interest">Bunga %</label>
                        <input type="number" step="0.1" name="interest" value="{{$data->interest??""}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="month_term">Jangka Waktu</label>
                        <input type="number" step="0.1" name="month_term" value="{{$data->month_term??""}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            @foreach(\App\Casts\ProductStatus::select($data->status ?? -1) as $k => $v)
                                <option value="{{$v["id"]}}" {{($v["selected"])?"selected":""}}>{{$v["text"]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <img src="{{$data->img ?? ""}}" class="img-fluid img-thumbnail text-center" alt="">
                    </div>
                    <div class="form-group">
                        <label for="img">Gambar Produk</label>
                        <input type="file" name="img"  class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$data->description??""}}</textarea>
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
