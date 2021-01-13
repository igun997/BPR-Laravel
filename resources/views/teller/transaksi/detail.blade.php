@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Data Diri Nasabah</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="box box-primary">
                                <div class="box-body box-profile">

                                    <h3 class="profile-username text-center">{{$nasabah->name}}</h3>

                                    <p class="text-muted text-center">{{$nasabah->no_rekening}}</p>

                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Username</b> <a class="float-right">{{$nasabah->username}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Email</b> <a class="float-right">{{$nasabah->email}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nomor HP</b> <a class="float-right">{{$nasabah->no_hp}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nomor KTP</b> <a class="float-right">{{$nasabah->no_ktp}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Foto KTP</b> <a class="float-right btn btn-flat btn-primary text-white" href="{{$nasabah->ktp}}">Lihat KTP</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status</b> <a class="float-right">{{\App\Casts\StatusAccount::lang($nasabah->status)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Total Saldo</b> <a class="float-right">Rp. {{number_format(\App\Casts\Helpers\SaveHelper::verifyBalance($nasabah->id))}}</a>
                                        </li>
                                        <li class="list-group-item text-center">
                                            <p>
                                                <b>Alamat</b>
                                            </p>
                                            <p align="left">
                                                {{$nasabah->alamat}}
                                            </p>
                                        </li>
                                    </ul>

                                    <a href="mailto:{{$nasabah->email}}" class="btn btn-primary btn-block"><b>Kirim Email</b></a>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Data Transaksi Nasabah</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Tgl Transaksi</th>
                                        <th>Jenis Transaksi</th>
                                        <th>Jumlah</th>
                                        <th>Status Transaksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($nasabah->saves()->orderBy("save_date","desc")->get() as $key => $complaint)
                                        <tr>
                                            <td># {{(str_pad($complaint->id,"6",0,STR_PAD_LEFT))}}</td>
                                            <td>{{$complaint->save_date->format("d/m/Y")}}</td>
                                            <td>{{\App\Casts\SaveType::lang($complaint->type)}}</td>
                                            <td>Rp. {{number_format($complaint->amount)}}</td>
                                            <td>{{\App\Casts\SaveStatus::lang($complaint->status)}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
