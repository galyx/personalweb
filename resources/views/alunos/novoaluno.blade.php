@extends('adminlte::page')

@section('title', 'PersonalWEB')

@section('content_header')
    <h1 class="m-0 text-dark">Cadastro de aluno</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Novo aluno</h3>
            </div>
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form action="{{route('aluno.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cpf">CPF do Aluno</label>
                        <input type="text" name="cpf" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }} cpf" value="{{ old('cpf') }}" placeholder="Digite o CPF (se Possuir)">

                        @if ($errors->has('cpf'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('cpf') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Nome do Aluno</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Digite o Nome do Aluno">

                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date">Data de Nascimento</label>
                        <input type="text" name="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }} date" value="{{ old('date') }}" placeholder="Data de Nascimento">

                        @if ($errors->has('date'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('date') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email do Aluno</label>
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Digite o Email do aluno (se possuir)">

                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="mobile">Celular do Aluno</label>
                        <input type="text" name="mobile" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }} mobile" value="{{ old('mobile') }}" placeholder="Digite o Celular do aluno (se possuir)">

                        @if ($errors->has('mobile'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>
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