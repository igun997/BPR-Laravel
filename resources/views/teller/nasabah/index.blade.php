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
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Status</th>
                                <th>No Rekening</th>
                                <th>No KTP</th>
                                <th>Dibuat</th>
                                <th>Diubah</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nasabah as $key => $complaint)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>{{$complaint->name}}</td>
                                    <td>{{$complaint->email}}</td>
                                    <td>{{$complaint->username}}</td>
                                    <td>{{$complaint->alamat}}</td>
                                    <td>{{$complaint->no_hp}}</td>
                                    <td>{{\App\Casts\StatusAccount::lang($complaint->status)}}</td>
                                    <td>{{$complaint->no_rekening}}</td>
                                    <td>
                                        <p>{{$complaint->no_ktp}}</p>
                                        <p align="center">
                                            <a href="{{$complaint->ktp}}" target="_blank" class="btn btn-primary btn-flat">Lihat</a>
                                        </p>
                                    </td>
                                    <td>{{$complaint->created_at->format("d/m/Y")}}</td>
                                    <td>{{$complaint->updated_at->format("d/m/Y")}}</td>
                                    <td>
                                        <a href="" class="btn btn-flat btn-primary  m-1">
                                            <li class="fa fa-eye"></li>
                                        </a>

                                        @if($complaint->status == \App\Casts\StatusAccount::INACTIVE)
                                            <a href="" class="btn btn-flat btn-success m-1">
                                                <li class="fa fa-check"></li>
                                            </a>
                                        @else
                                            <a href="" class="btn btn-flat btn-danger m-1">
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
