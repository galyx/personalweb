@extends('adminlte::page')

@section('title', 'PersonalWEB')

@section('content_header')
    <h1 class="m-0 text-dark">Alunos Cadastrados</h1>
@stop

@section('content')
    {{-- estilo da pagina --}}
    <style>
        .accordion {
            cursor: pointer;
        }
    </style>

    <div class="container">
        {{-- filtro de aluno --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Filtrar alunos</h3>
            </div>
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                
                <form action="{{url('/admin/alunos')}}" method="GET">
                    <div class="form-row justify-content-between">
                        <div class="form-group">
                            <label for="quantidade_pagina">Quantidade por pagina</label>
                            <select name="quantidade_pagina" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="5" @if ($qty_page == 5) selected @endif>5</option>
                                <option value="15" @if ($qty_page == 15) selected @endif>15</option>
                                <option value="30" @if ($qty_page == 30) selected @endif>30</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="aluno">Filtrar Aluno</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-search"></span>
                                    </div>
                                </div>
                                <input type="text" name="filter_aluno" class="form-control" value="@if(isset($filter_aluno)){{$filter_aluno}}@endif" placeholder="Filtrar Aluno">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="submit">Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- Alunos --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Alunos</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="bg-info">
                        <tr>
                            <th>Codigo de Acesso</th>
                            <th>CPF</th>
                            <th>Nome do Aluno</th>
                            <th>Data de Nascimento</th>
                            <th>E-Mail</th>
                            <th>Celular</th>
                            <th>Data de Cadastro</th>
                        </tr>
                    </thead>
                    <tbody id="accordion">
                        @forelse ($alunos as $aluno)
                            <tr class="accordion" data-toggle="collapse" data-parent="#accordion" href="#{{$aluno->access_code}}">
                                <td>{{$aluno->access_code}}</td>
                                <td>{{$aluno->cpf}}</td>
                                <td>{{$aluno->name}}</td>
                                <td>{{date("d/m/Y", strtotime(str_replace('-','/',$aluno->date)))}}</td>
                                <td>{{$aluno->email}}</td>
                                <td>{{$aluno->mobile}}</td>
                                <td>{{date("d/m/Y H:i:s", strtotime(str_replace('-','/',$aluno->created_at)))}}</td>
                            </tr>
                            <tr id="{{$aluno->access_code}}" class="panel-collapse collapse in">
                                <td colspan="7">
                                    <div class="btn-group">
                                        <a href="{{url('/admin/novaaf',$aluno->access_code)}}" class="btn btn-primary"><i class="fas fa-clipboard"></i> Adicionar AF</a>
                                        <a href="" class="btn btn-primary"><i class="fas fa-clipboard-list"></i> Visualizar AF</a>
                                        <a href="{{url('/aluno/edit',$aluno->access_code)}}" class="btn btn-success"><i class="fas fa-user-edit"></i> Editar Aluno</a>
                                        <a href="{{url('/aluno/show',$aluno->access_code)}}" class="btn btn-danger"><i class="fas fa-trash"></i> Apagar Aluno</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td class="bg-danger" colspan="7">Não possui alunos cadastrados</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div>{{$alunos->appends(['quantidade_pagina'=>$qty_page,'filter_aluno'=>$filter_aluno])->links()}}</div>
            </div>
        </div>
    </div>
@stop

