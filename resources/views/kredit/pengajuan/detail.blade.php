@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{$title}}</div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item text-center bg-orange " style="color: white !important;">
                                {{$borrow->product->name}}
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <b >Bunga</b>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                    <div class="col-4">
                                        <span class=" badge badge-success" style="bottom: 10px">{{number_format($borrow->interest,1)}} %</span>
                                    </div>
                                </div>

                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <b >Jangka Waktu</b>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                    <div class="col-4">
                                        <span class=" badge badge-success" style="bottom: 10px">{{$borrow->month_term}} Bulan</span>
                                    </div>
                                </div>

                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <b >Total Pinjaman</b>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                    <div class="col-4">
                                        <span class=" badge badge-success" style="bottom: 10px">Rp. {{number_format($borrow->amount)}}</span>
                                    </div>
                                </div>

                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <b >Pengembalian</b>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                    <div class="col-4">
                                        <span class=" badge badge-success" style="bottom: 10px">Rp. {{number_format(($borrow->amount*($borrow->interest/100))+$borrow->amount)}}</span>
                                    </div>
                                </div>

                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <b >Status Pengajuan</b>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                    <div class="col-4">
                                        <span class=" badge badge-primary" style="bottom: 10px">{{\App\Casts\BorrowStatus::lang($borrow->status)}}</span>
                                    </div>
                                </div>

                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <b >Angsuran Per Bulan</b>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                    <div class="col-4">
                                        <span class=" badge badge-primary" style="bottom: 10px">Rp. {{number_format((($borrow->amount*($borrow->interest/100))+$borrow->amount)/$borrow->month_term)}}</span>
                                    </div>
                                </div>

                            </li>
                        </ul>
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

        })
    </script>
@stop
