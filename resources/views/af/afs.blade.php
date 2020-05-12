@extends('adminlte::page')

@section('title', 'PersonalWEB')

@section('content_header')
    <h1 class="m-0 text-dark">Criar Nova Avalição Fisica</h1>
@stop

@section('content')
    <div class="container">
        {{-- Ficha Selecionada --}}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ficha Selecionada</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <select name="af_n" class="form-control">
                            @foreach ($afs as $af)
                                <option value="{{$access_code.'-'.$af_n}}" {{$af->af_n == $af_n ? "selected" : ""}}>Ficha Nº - {{$af->af_n}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6"></div>
                </div>
            </div>
        </div>
    </div>
@stop