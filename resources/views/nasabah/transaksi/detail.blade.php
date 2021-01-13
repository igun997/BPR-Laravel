@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">

        <div class="col-12 col-md-6 offset-md-3">
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
