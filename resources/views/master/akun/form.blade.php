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
                    <form action="{{$route??route("master.akun.add_action")}}" method="post">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" value="{{$data->name??""}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" value="{{$data->email??""}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="{{$data->username??""}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="{{$data->password??""}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control">{{$data->password??""}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="text" name="no_hp" value="{{$data->no_hp??""}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            @foreach(\App\Casts\LevelAccount::select($data->level ?? -1) as $k => $v)
                                <option value="{{$v["id"]}}" {{($v["selected"])?"selected":""}}>{{$v["text"]}}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                @foreach(\App\Casts\StatusAccount::select($data->status ?? -1) as $k => $v)
                                    <option value="{{$v["id"]}}" {{($v["selected"])?"selected":""}}>{{$v["text"]}}</option>
                                @endforeach
                            </select>
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
