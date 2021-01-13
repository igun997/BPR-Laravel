@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
            <div class="col-12 col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            {{$title}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Total Angsuran</th>
                                    <th>Status</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Bukti Pembayaran</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($borrow->borrow_installments as $k => $row)
                                    <tr>
                                        <td>#{{str_pad($row->id,4,0,STR_PAD_LEFT)}}</td>
                                        <td>Rp. {{number_format($row->amount)}}</td>
                                        <td>{{\App\Casts\BorrowInstallmentStatus::lang($row->status)}}</td>
                                        <td>{{($row->recipt === null)?"Debet Rekening":"Manual Transfer"}}</td>
                                        <td align="center">
                                            <a href="{{$row->recipt}}" class="btn btn-primary btn-flat">
                                                <li class="fa fa-eye"></li> Lihat Bukti
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
