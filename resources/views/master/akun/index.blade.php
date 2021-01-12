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
                        <a href="{{route("master.akun.add")}}" class="btn btn-success btn-flat">
                            Tambah Data
                        </a>
                    </div>

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
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>No Rekening</th>
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
                                    <td>{{$complaint->email}}</td>
                                    <td>{{$complaint->username}}</td>
                                    <td>{{$complaint->alamat}}</td>
                                    <td>{{$complaint->no_hp}}</td>
                                    <td>{{\App\Casts\LevelAccount::lang($complaint->level)}}</td>
                                    <td>{{\App\Casts\StatusAccount::lang($complaint->status)}}</td>
                                    <td>{{$complaint->no_rekening}}</td>
                                    <td>{{$complaint->created_at->format("d/m/Y")}}</td>
                                    <td>{{$complaint->updated_at->format("d/m/Y")}}</td>
                                    <td>
                                        <a href="{{route("master.akun.update",$complaint->id)}}" class="btn btn-warning btn-flat m-1">
                                            <li class="fa fa-edit"></li>
                                        </a>

                                        <a href="{{route("master.akun.delete",$complaint->id)}}" onclick="return confirm('Apakah Anda Yakin ? ')" class="btn btn-danger btn-flat m-1">
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
