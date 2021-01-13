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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Total Pinjaman</th>
                                <th>Bunga</th>
                                <th>Jangka Waktu</th>
                                <th>Nama Debitur</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($borrow as $b => $r)
                                <tr>
                                    <td>#{{str_pad($r->id,4,0,STR_PAD_LEFT)}}</td>
                                    <td>Rp. {{number_format($r->amount)}}</td>
                                    <td>{{number_format($r->interest,1)}} %</td>
                                    <td>{{number_format($r->month_term)}} Bulan</td>
                                    <td>{{$r->user->name}}</td>
                                    <td>{{$r->user->no_hp}}</td>
                                    <td>{{$r->user->email}}</td>
                                    <td>{{\App\Casts\BorrowStatus::lang($r->status)}}</td>
                                    <td>
                                        <a href="{{route("kredit.pengajuan.detail",$r->id)}}" class="btn btn-primary btn-flat m-1">
                                            <li class="fa fa-eye"></li>
                                        </a>
                                        @if(session()->get("level") == \App\Casts\LevelAccount::ANALIS_KREDIT)
                                            @if($r->status == \App\Casts\BorrowStatus::DIKONFIRMASI)
                                                <a href="{{route("kredit.pengajuan.update_status",[$r->id,"status"=>\App\Casts\BorrowStatus::SEDANG_DIREVIEW])}}" class="btn btn-primary btn-flat m-1">
                                                    <li class="fa fa-info"></li> Review
                                                </a>
                                            @elseif($r->status == \App\Casts\BorrowStatus::SEDANG_DIREVIEW)
                                                <a href="{{route("kredit.pengajuan.update_status",[$r->id,"status"=>\App\Casts\BorrowStatus::PENGAJUAN_DITERIMA])}}" class="btn btn-primary btn-flat m-1">
                                                    <li class="fa fa-info"></li> Pengajuan Diterima
                                                </a>
                                                <a href="{{route("kredit.pengajuan.update_status",[$r->id,"status"=>\App\Casts\BorrowStatus::PENGAJUAN_DITOLAK])}}" class="btn btn-danger btn-flat m-1">
                                                    <li class="fa fa-ban"></li> Pengajuan Ditolak
                                                </a>
                                            @elseif($r->status == \App\Casts\BorrowStatus::DIAJUKAN)
                                                <a href="{{route("kredit.pengajuan.update_status",[$r->id,"status"=>\App\Casts\BorrowStatus::DIKONFIRMASI])}}" class="btn btn-primary btn-flat m-1">
                                                    <li class="fa fa-info"></li> Pengajuan Di Konfirmasi
                                                </a>
                                            @endif
                                        @endif

                                        @if(session()->get("level") == \App\Casts\LevelAccount::ADMIN_KREDIT)
                                            @if($r->status == \App\Casts\BorrowStatus::PENGAJUAN_DITERIMA)
                                                <a href="{{route("kredit.pengajuan.update_status",[$r->id,"status"=>\App\Casts\BorrowStatus::PROSES_PENCAIRAN])}}" class="btn btn-primary btn-flat m-1">
                                                    <li class="fa fa-info"></li> Proses Pencairan
                                                </a>
                                            @elseif($r->status == \App\Casts\BorrowStatus::PROSES_PENCAIRAN)
                                                <a href="{{route("kredit.pengajuan.update_status",[$r->id,"status"=>\App\Casts\BorrowStatus::BERJALAN])}}" class="btn btn-primary btn-flat m-1">
                                                    <li class="fa fa-info"></li> Aktifkan Pinjaman
                                                </a>
                                            @elseif($r->status == \App\Casts\BorrowStatus::BERJALAN)
                                            @endif
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
