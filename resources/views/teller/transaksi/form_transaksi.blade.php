@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{$title}}</div>
                </div>
                <div class="card-body">
                    <form action="{{$route}}" method="post">
                        <div class="form-group">
                            <label for="amount">Total</label>
                            @if($rules["max"] > 0)
                                <input type="number" name="amount" class="form-control" min="{{$rules["min"]}}" required max="{{$rules["max"]}}">
                            @else
                                <input type="number" name="amount" class="form-control" min="{{$rules["min"]}}" required>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="notes">Catatan</label>
                            <textarea name="notes" id="notes" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="type" hidden value="{{$type}}">
                            <button type="submit" class="btn btn-success btn-flat btn-block">
                                Simpan Transaksi
                            </button>
                        </div>
                    </form>
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
