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
                                <th>Jenis Aduan</th>
                                <th>Nama Pengguna</th>
                                <th>Judul Aduan</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th>Diubah</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pengaduan as $key => $row)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>{{$row->complaint_type->name}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>{{$row->subject}}</td>
                                    <td>{{\App\Casts\ComplaintStatus::lang($row->status)}}</td>
                                    <td>{{$row->created_at->format("d/m/Y")}}</td>
                                    <td>{{$row->updated_at->format("d/m/Y")}}</td>
                                    <td>
                                        <a href="{{route("complaint.detail",$row->id)}}" class="btn btn-primary btn-flat m-1">
                                            <li class="fa fa-eye"></li>
                                        </a>
                                        <a href="javascript:void(0)" data-id="{{$row->id}}" data-status="{{$row->status}}" class="btn btn-success btn-flat m-1 options">
                                            <li class="fa fa-cog"></li>
                                        </a>

                                        <a href="{{route("complaint.delete",$row->id)}}" class="btn btn-danger btn-flat m-1">
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
            $(".options").on("click",function (){
                let id = $(this).data("id");
                id = parseInt(id);
                bootbox.prompt({
                    title: "Opsi",
                    message: '<p>Pilih Status Pengaduan :</p>',
                    inputType: 'radio',
                    inputOptions: [
                        @foreach(\App\Casts\ComplaintStatus::select(-1) as $k => $v)
                            {
                                text: '{{$v["text"]}}',
                                value: '{{$v["id"]}}',
                            },
                        @endforeach

                    ],
                    callback:  async function (result) {
                        if (result !== null){
                            const {code,data} = await $.post("{{route("complaint.update_status")}}",{
                                id:id,
                                status:result
                            })
                            if (code === 200){
                                toastr.success("Update Status Berhasil");
                                setTimeout(function (){
                                    location.reload();
                                },1000)
                            }else{
                                toastr.error("Update Status Gagal");
                            }
                        }
                    }
                });
            })
        })
    </script>
@stop
