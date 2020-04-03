@extends('adminlte::page')

@section('title', 'PersonalWEB')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Aluno</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ALterar dados do aluno <strong>{{$aluno[0]->name}}</strong></h3>
            </div>
            <div class="card-body">
                <form action="{{url('/aluno/update',$aluno[0]->access_code)}}" method="post">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }} cpf" @if ($aluno[0]->cpf == null) @else value="{{$aluno[0]->cpf}}" disabled @endif>

                            @if ($errors->has('cpf'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="-form-group col-12">
                            <label for="name">Nome do Aluno</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{$aluno[0]->name}}">

                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="-form-group col-12">
                            <label for="date">Data de Nascimento</label>
                            <input type="text" name="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }} date" value="{{date("d/m/Y", strtotime(str_replace('-','/',$aluno[0]->date)))}}">

                            @if ($errors->has('date'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{$aluno[0]->email}}">
                        </div>
                        <div class="form-group col-12">
                            <label for="mobile">Celular</label>
                            <input type="text" name="mobile" class="form-control mobile" value="{{$aluno[0]->mobile}}">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between my-3">
                        <a class="btn btn-info" href="{{URL::previous()}}"><i class="fas fa-arrow-left"></i> Voltar</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(".cpf").mask("000.000.000-00");
        $(".mobile").mask("(00) 00000-0000");
        $(".date").mask("00/00/0000");
        $(".date").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abri','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });
    </script>
@stop