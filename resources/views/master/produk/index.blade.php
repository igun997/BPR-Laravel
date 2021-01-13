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
                    <div class="form-group">
                        <a href="{{route("master.produk.add")}}" class="btn btn-success btn-flat">
                            Tambah Data
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Tipe</th>
                                    <th>Bunga</th>
                                    <th>Deskripsi</th>
                                    <th>Jangka Waktu</th>
                                    <th>Total Pinjaman</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th>Dibuat</th>
                                    <th>Diubah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($complaints as $key => $complaint)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>{{$complaint->name}}</td>
                                    <td>{{\App\Casts\LevelAccount::lang($complaint->type)}}</td>
                                    <td>{{number_format($complaint->interest,1)}} % / Bulan</td>
                                    <td>{{$complaint->description}}</td>
                                    <td>{{number_format($complaint->month_term)}} Bulan</td>
                                    <td>{{($complaint->total > 0)?"Rp. ".number_format($complaint->total):"-"}}</td>
                                    <td>
                                        <img src="{{$complaint->img}}" class="img-thumbnail img-fluid" />
                                    </td>
                                    <td>{{\App\Casts\StatusAccount::lang($complaint->status)}}</td>
                                    <td>{{$complaint->created_at->format("d/m/Y")}}</td>
                                    <td>{{$complaint->updated_at->format("d/m/Y")}}</td>
                                    <td>
                                        <a href="{{route("master.produk.update",$complaint->id)}}" class="btn btn-warning btn-flat m-1">
                                            <li class="fa fa-edit"></li>
                                        </a>

                                        <a href="{{route("master.produk.delete",$complaint->id)}}" onclick="return confirm('Apakah Anda Yakin ? ')" class="btn btn-danger btn-flat m-1">
                                            <li class="fa fa-trash"></li>
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
