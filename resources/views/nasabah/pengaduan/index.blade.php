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
                        <a href="{{route("nasabah.pengaduan.add")}}" class="btn btn-success btn-flat">
                            Tambah Pengaduan
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Masalah</th>
                                <th>Kategori Pengaduan</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->subject}}</td>
                                    <td>{{$value->complaint_type->name}}</td>
                                    <td>{{\App\Casts\ComplaintStatus::lang($value->status)}}</td>
                                    <td>{{$value->created_at->format("d-m-Y")}}</td>
                                    <td>
                                        <a href="{{route("nasabah.pengaduan.detail",$value->id)}}" class="btn btn-success">
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
