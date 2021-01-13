@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="row">
                <div class="col-12">
                    <div class="info-box  bg-gradient-success">
                        <span class="info-box-icon"><i class="fa fa-money-bill"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Sisa Saldo</span>
                            <span class="info-box-number">Rp. {{number_format(\App\Casts\Helpers\SaveHelper::verifyBalance(session()->get("id")))}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="info-box  bg-gradient-danger">
                        <span class="info-box-icon"><i class="fa fa-money-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Pengeluaran</span>
                            <span class="info-box-number">Rp. {{number_format(\App\Casts\Helpers\SaveHelper::verifyDebit(session()->get("id")))}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{$title}}</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>No Rekening</th>
                                        <th>Tgl Transaksi</th>
                                        <th>Jenis Transaksi</th>
                                        <th>Jumlah</th>
                                        <th>Status Transaksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($saves as $key => $save)
                                        <tr>
                                            <td>#{{str_pad($save->id,5,0,STR_PAD_LEFT)}}</td>
                                            <td>{{$save->user->no_rekening}}</td>
                                            <td>{{$save->save_date->format("d/m/Y")}}</td>
                                            <td>{{\App\Casts\SaveType::lang($save->type)}}</td>
                                            <td>{{number_format($save->amount)}}</td>
                                            <td>{{\App\Casts\SaveStatus::lang($save->status)}}</td>
                                            <td>
                                                <a href="{{route("nasabah.transaksi.detail",$save->id)}}" class="btn btn-flat btn-primary  m-1">
                                                    <li class="fa fa-eye"></li>
                                                </a>
                                            </td>
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
            $("table").DataTable({
                order:[0,"desc"]
            })

        })
    </script>
@stop
