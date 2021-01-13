@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
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
                                                <a href="{{route("transaksi.detail",$save->id)}}" class="btn btn-flat btn-primary  m-1">
                                                    <li class="fa fa-eye"></li>
                                                </a>
                                                @if($save->status === \App\Casts\SaveStatus::REVIEWED && session()->get("level") == \App\Casts\LevelAccount::KOORDINATOR_OPERASIONAL)
                                                    <a href="{{route("transaksi.update_status",[$save->id,"status"=>\App\Casts\SaveStatus::VERIFIED])}}" class="btn btn-flat btn-primary  m-1">
                                                        <li class="fa fa-check"></li>
                                                    </a>
                                                    <a href="{{route("transaksi.update_status",[$save->id,"status"=>\App\Casts\SaveStatus::REJECTED])}}" class="btn btn-flat btn-primary  m-1">
                                                        <li class="fa fa-ban"></li>
                                                    </a>
                                                @endif
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
            $("table").DataTable()

        })
    </script>
@stop
