@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="text-align: center !important;">
                        {{$title}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary btn-flat btn-sm btn-block" id="_autodebet">Pembayaran Otomatis</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-info btn-flat btn-sm btn-block" id="_manual">Pembayaran Manual</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route("nasabah.kredit.manual",$borrow->id)}}" method="post" enctype="multipart/form-data">
                                <div class="info-box  bg-gradient-warning mt-2 ">
                                    <span class="info-box-icon"><i class="fa fa-money-bill"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Pembayaran </span>
                                        <span class="info-box-number">Rp. {{number_format((($borrow->amount*($borrow->interest/100))+$borrow->amount)/$borrow->month_term)}}</span>
                                    </div>
                                </div>
                                <div class="info-box  bg-gradient-success autodebet" >
                                    <span class="info-box-icon"><i class="fa fa-money-bill"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Saldo Rekening</span>
                                        <span class="info-box-number">Rp. {{number_format(\App\Casts\Helpers\SaveHelper::verifyBalance(session()->get("id")))}}</span>
                                    </div>
                                </div>
                                <div class="form-group manual"  >
                                    <label for="bukti">Bukti Pembayaran</label>
                                    <input type="file" class="form-control-file" />
                                </div>
                                <div class="form-group manual"  >
                                    <button type="submit" class="btn btn-success  btn-flat btn-block">
                                        Bayar
                                    </button>
                                </div>
                                <div class="form-group autodebet"  >
                                    <a href="{{route("nasabah.kredit.autodebet",$borrow->id)}}" class="btn btn-primary btn-flat btn-block">
                                        Bayar
                                    </a>
                                </div>
                            </form>
                        </div>
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
            let on = "autodebet";
            $(".autodebet").hide();
            $(".manual").hide();
            function letOn(key){
                console.log(key)
                if(key === "autodebet"){
                    $(".autodebet").show().fadeIn();
                    $(".manual").hide().fadeOut();
                }else{
                    $(".autodebet").hide().fadeOut();
                    $(".manual").show().fadeIn();
                }
            }
            letOn(on);
            $("#_autodebet").on("click",function (){
                letOn("autodebet");
            })
            $("#_manual").on("click",function (){
                letOn("manual");
            })
        })
    </script>
@stop
