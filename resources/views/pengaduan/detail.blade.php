@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Data Diri Nasabah</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p><b>Nama Nasabah </b> : {{$data->user->name}}</p>
                            <p><b>Email </b> : {{$data->user->email}}</p>
                            <p><b>Alamat </b> : {{$data->user->alamat}} </p>
                            <p><b>Nomor HP </b> : {{$data->user->no_hp}} </p>
                            <p><b>Nomor KTP </b> : {{$data->user->no_ktp}} </p>
                            <a class="btn btn-flat btn-primary" href="mailto:{{$data->user->email}}"><li class="fa fa-envelope"></li> Kirim Pesan Kepada Nasabah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{$title}}</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p><b>Judul Pengaduan </b> : {{$data->subject}}</p>
                            <p><b>Isi Pengaduan </b> : {!! $data->content !!}</p>
                        </div>
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
            $("table").DataTable()

        })
    </script>
@stop
