@extends('adminlte::page')

@section('title', 'PersonalWEB')

@section('content_header')
    <h1 class="m-0 text-dark">Criar Nova Avalição Fisica</h1>
@stop

@section('content')
    <div class="container">
        <form action="" method="post">
            {{-- pre dados do aluno --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Adicionar Avalição Fisica para o aluno <strong>{{$aluno[0]->name}}</strong></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-info">
                                    <th>Codigo de Acesso</th>
                                    <th>Nome do Aluno</th>
                                    <th>Avalição Fisica Nº</th>
                                    <th>Idade do Aluno</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$aluno[0]->access_code}}</td>
                                    <td>{{$aluno[0]->name}}</td>
                                    <td>{{$af_n+1}}</td>
                                    <td>{{$idade}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Hidden - codigo de acesso --}}
                    <input type="hidden" name="access_code" value="{{$aluno[0]->access_code}}">
                    {{-- Hidden - avaliação fisica nº --}}
                    <input type="hidden" name="af_n" value="{{$af_n+1}}">
                    {{-- Hidden idade do aluno --}}
                    <input type="hidden" name="age" value="{{$idade}}">
                    {{-- /// --}}

                    {{-- Dados da avaliação --}}
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="date">Data da Avaliação Fisica</label>
                            <input type="text" name="date" class="form-control date" placeholder="Data da Avaliação">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="goal">Objetivo</label>
                            <input type="text" name="goal" class="form-control" placeholder="Qual o Objetivo">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="note">Observação</label>
                            <input type="text" name="note" class="form-control" placeholder="Alguma Observação">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="height">Altura</label>
                            <input type="text" name="height" class="form-control two_n" placeholder="Altura do Aluno">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="weight">Peso</label>
                            <input type="text" name="weight" class="form-control one_n" id="weight" placeholder="Peso do Aluno">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="sex">Sexo</label>
                            <select class="form-control" name="sex">
                                <option value="">Selecione o sexo</option>
                                <option value="MASCULINO">Masculino</option>
                                <option value="FEMININO">Feminino</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Perimetria --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Perimetria</h3>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="neck">Pescoço</label>
                            <input type="text" name="neck" class="form-control one_n" placeholder="Medidas do Pescoço">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="deltoids">Deltoides</label>
                            <input type="text" name="deltoids" class="form-control one_n" placeholder="Medidas do Deltoides">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="chest">Tórax</label>
                            <input type="text" name="chest" class="form-control one_n" placeholder="Medidas do Torax">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="abdomeC">Abdome C</label>
                            <input type="text" name="abdomeC" class="form-control one_n" placeholder="Medidas do Abdome C">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="abdomeM">Abdome M</label>
                            <input type="text" name="abdomeM" class="form-control one_n" placeholder="Medidas do Abdome M">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="hip">Quadril</label>
                            <input type="text" name="hip" class="form-control one_n" placeholder="Medidas do Quadril">
                        </div>
                    </div>

                    <hr />

                    {{-- Direito e Esquerdo --}}
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-5">
                            <label for="arm_cd">Braço Contraído Direito</label>
                            <input type="text" name="arm_cd" class="form-control one_n" placeholder="Medidas do Braço Contraido">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="arm_ce">Braço Contraído Esquerdo</label>
                            <input type="text" name="arm_ce" class="form-control one_n" placeholder="Medidas do Braço Contraido">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="arm_rd">Braço Relaxado Direito</label>
                            <input type="text" name="arm_rd" class="form-control one_n" placeholder="Medidas do Braço Relaxado">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="arm_re">Braço Relaxado Esquerdo</label>
                            <input type="text" name="arm_re" class="form-control one_n" placeholder="Medidas do Braço Relaxado">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="forearm_d">Antebraço Direito</label>
                            <input type="text" name="forearm_d" class="form-control one_n" placeholder="Medidas do Antebraço">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="forearm_e">Antebraço Esquerdo</label>
                            <input type="text" name="forearm_e" class="form-control one_n" placeholder="Medidas do Antebraço">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="thigh_d">Coxa Proximal Direito</label>
                            <input type="text" name="thigh_d" class="form-control one_n" placeholder="Medidas da Coxa Proximal">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="thigh_e">Coxa Proximal Esquerdo</label>
                            <input type="text" name="thigh_e" class="form-control one_n" placeholder="Medidas da Coxa Proximal">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="thigh_md">Coxa Medial Direito</label>
                            <input type="text" name="thigh_md" class="form-control one_n" placeholder="Medidas da Coxa Medial">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="thigh_me">Coxa Medial Esquerdo</label>
                            <input type="text" name="thigh_me" class="form-control one_n" placeholder="Medidas da Coxa Medial">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="calf_d">Panturrilha Direito</label>
                            <input type="text" name="calf_d" class="form-control one_n" placeholder="Medidas da Panturrilha">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="calf_e">Panturilha Esquerdo</label>
                            <input type="text" name="calf_e" class="form-control one_n" placeholder="Medidas da Panturrilha">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Aviso de Protocolos e biometria --}}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <input type="checkbox" name="check_protocol" id="check_protocol" checked>
                        <label>Usar Protocolos e Biometria? <i class="fas fa-exclamation-triangle"></i></label>
                    </div>
                    
                    <div id="alert_protocol"></div>
                </div>
            </div>

            {{-- Protocolos e biometria - Dobras Cutâneas --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Protocolos & Biometria - Dobras Cutâneas</h3>
                </div>
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label for="protocol_dc">Dobras Cutâneas</label>
                        <select class="form-control" name="protocol_dc">
                            <option value="">Selecione o Protocolo de Dobras Cutâneas</option>
                            <option value="P3D">Pollock 3 Dobras</option>
                            <option value="P7D">Pollock 7 Dobras</option>
                            <option value="D4D">Durinn 4 Dobras</option>
                        </select>
                    </div>

                    <hr />

                    <div class="form-row">
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop