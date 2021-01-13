@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Data Diri Nasabah</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="box box-primary">
                                <div class="box-body box-profile">

                                    <h3 class="profile-username text-center">{{$save->user->name}}</h3>

                                    <p class="text-muted text-center">{{$save->user->no_rekening}}</p>

                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Username</b> <a class="float-right">{{$save->user->username}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Email</b> <a class="float-right">{{$save->user->email}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nomor HP</b> <a class="float-right">{{$save->user->no_hp}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nomor KTP</b> <a class="float-right">{{$save->user->no_ktp}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Foto KTP</b> <a class="float-right btn btn-flat btn-primary text-white" href="{{$save->user->ktp}}">Lihat KTP</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status</b> <a class="float-right">{{\App\Casts\StatusAccount::lang($save->user->status)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Total Saldo</b> <a class="float-right">Rp. {{number_format(\App\Casts\Helpers\SaveHelper::verifyBalance($save->user->id))}}</a>
                                        </li>
                                        <li class="list-group-item text-center">
                                            <p>
                                                <b>Alamat</b>
                                            </p>
                                            <p align="left">
                                                {{$save->user->alamat}}
                                            </p>
                                        </li>
                                    </ul>

                                    <a href="mailto:{{$save->user->email}}" class="btn btn-primary btn-block"><b>Kirim Email</b></a>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="info-box  {{($save->type === \App\Casts\SaveType::KREDIT)?"bg-gradient-success":"bg-gradient-danger"}}">
                        <span class="info-box-icon"><i class="fa fa-money-bill"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Transaksi {{\App\Casts\SaveType::lang($save->type)}}</span>
                            <span class="info-box-number">Rp. {{number_format($save->amount)}}</span>

                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                      {{$save->notes}}
                    </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-12">
                    <div class="info-box  bg-gradient-primary">
                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tanggal Transaksi</span>
                            <span class="info-box-number">{{$save->save_date->format("d/m/Y")}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>

                </div>
                @php
                    if(!isset($save)){
                        $save = null;
                    }
                    $icon = "fa fa-ban";
                    $status = "bg-gradient-danger";
                    if ($save->status === \App\Casts\SaveStatus::VERIFIED){
                        $icon = "fa fa-check";
                        $status = "bg-gradient-success";
                    }elseif($save->status === \App\Casts\SaveStatus::REVIEWED){
                        $icon = "fa fa-hourglass";
                        $status = "bg-gradient-secondary";
                    }
                @endphp
                <div class="col-12">
                    <div class="info-box  {{$status}}">
                        <span class="info-box-icon"><i class="{{$icon}}"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Status Transaksi</span>
                            <span class="info-box-number">{{\App\Casts\SaveStatus::lang($save->status)}}</span>
                        </div>
                        <!-- /.info-box-content -->
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
