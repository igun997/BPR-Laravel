@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        @if(!$in_progress)
        @foreach($products as $key => $row)
        <div class="col-12 col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{$row->img}}" alt="{{$row->name}}">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item text-center bg-orange " style="color: white !important;">
                            {{$row->name}}
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6">
                                    <b >Bunga</b>
                                </div>
                                <div class="col-2">

                                </div>
                                <div class="col-4">
                                    <span class=" badge badge-success" style="bottom: 10px">{{number_format($row->interest,1)}} %</span>
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
                                    <span class=" badge badge-success" style="bottom: 10px">{{$row->month_term}} Bulan</span>
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
                                    <span class=" badge badge-success" style="bottom: 10px">Rp. {{number_format($row->total)}}</span>
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
                                    <span class=" badge badge-success" style="bottom: 10px">Rp. {{number_format(($row->total*($row->interest/100))+$row->total)}}</span>
                                </div>
                            </div>

                        </li>
                    </ul>

                    <div class="card bg-secondary mt-2">
                        <div class="card-body">
                            {{$row->description}}
                        </div>
                    </div>

                    <a href="{{route("nasabah.kredit.klaim",$row->id)}}" class="btn btn-flat btn-success btn-block">
                        Ajukan Klaim
                    </a>

                </div>
            </div>

        </div>
        @endforeach
        @else
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item text-center bg-orange " style="color: white !important;">
                                {{$current->product->name}}
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <b >Bunga</b>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                    <div class="col-4">
                                        <span class=" badge badge-success" style="bottom: 10px">{{number_format($current->interest,1)}} %</span>
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
                                        <span class=" badge badge-success" style="bottom: 10px">{{$current->month_term}} Bulan</span>
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
                                        <span class=" badge badge-success" style="bottom: 10px">Rp. {{number_format($current->amount)}}</span>
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
                                        <span class=" badge badge-success" style="bottom: 10px">Rp. {{number_format(($current->amount*($current->interest/100))+$current->amount)}}</span>
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
                                        <span class=" badge badge-primary" style="bottom: 10px">{{\App\Casts\BorrowStatus::lang($current->status)}}</span>
                                    </div>
                                </div>

                            </li>
                            @if(\App\Casts\BorrowStatus::BERJALAN === $current->status)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-6">
                                        <b >Angsuran Per Bulan</b>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                    <div class="col-4">
                                        <span class=" badge badge-primary" style="bottom: 10px">Rp. {{number_format((($current->amount*($current->interest/100))+$current->amount)/$current->month_term)}}</span>
                                    </div>
                                </div>

                            </li>
                            @endif
                        </ul>
                        @if(\App\Casts\BorrowStatus::BERJALAN === $current->status)
                        <a href="{{route("nasabah.kredit.angsuran",$current->id)}}" class="btn btn-flat btn-success btn-block mt-2">
                            Angsuran
                        </a>
                        @endif

                    </div>
                </div>

            </div>
        @endif
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
