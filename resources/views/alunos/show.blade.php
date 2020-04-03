@extends('adminlte::page')

@section('title', 'PersonalWEB')

@section('content_header')
    <h1 class="m-0 text-dark">Apagar Aluno</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Apagar todos os registros do Aluno <strong>{{$aluno[0]->name}}</strong></h3>
            </div>
            <div class="card-body">
                <form action="{{url('/aluno/destroy',$aluno[0]->access_code)}}" method="post">
                    @csrf

                    <div class="d-flex justify-content-between">
                        <a class="btn btn-info" href="{{URL::previous()}}"><i class="fas fa-arrow-left"></i> Voltar</a>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Apagar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop