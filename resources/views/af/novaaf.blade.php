@extends('adminlte::page')

@section('title', 'PersonalWEB')

@section('content_header')
    <h1 class="m-0 text-dark">Criar Nova Avalição Fisica</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('AF.store')}}" method="post">
            @csrf
            {{-- pre dados do aluno --}}
            <div class="card card-primary">
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
                            <input type="text" name="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }} date" value="{{ old('date') }}" placeholder="Data da Avaliação">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="goal">Objetivo</label>
                            <input type="text" name="goal" class="form-control" value="{{ old('goal') }}" placeholder="Qual o Objetivo">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="note">Observação</label>
                            <input type="text" name="note" class="form-control" value="{{ old('note') }}" placeholder="Alguma Observação">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="height">Altura</label>
                            <input type="text" name="height" class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }} two_n" value="{{ old('height') }}" placeholder="Altura do Aluno">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="weight">Peso</label>
                            <input type="text" name="weight" class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }} one_n" value="{{ old('weight') }}" id="weight" placeholder="Peso do Aluno">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="sex">Sexo</label>
                            <select class="form-control {{ $errors->has('sex') ? 'is-invalid' : '' }}" name="sex">
                                <option value="">Selecione o sexo</option>
                                <option value="MASCULINO" {{ old('sex') == "MASCULINO" ? "selected" : ""}}>Masculino</option>
                                <option value="FEMININO" {{ old('sex') == "FEMININO" ? "selected" : "" }}>Feminino</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Perimetria --}}
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Perimetria</h3>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="neck">Pescoço</label>
                            <input type="text" name="neck" class="form-control {{ $errors->has('neck') ? 'is-invalid' : '' }} one_n" value="{{ old('neck') }}" placeholder="Medidas do Pescoço">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="deltoids">Deltoides</label>
                            <input type="text" name="deltoids" class="form-control {{ $errors->has('deltoids') ? 'is-invalid' : '' }} one_n" value="{{ old('deltoids') }}" placeholder="Medidas do Deltoides">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="chest">Tórax</label>
                            <input type="text" name="chest" class="form-control {{ $errors->has('chest') ? 'is-invalid' : '' }} one_n" value="{{ old('chest') }}" placeholder="Medidas do Torax">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="abdomeC">Abdome C</label>
                            <input type="text" name="abdomeC" class="form-control {{ $errors->has('abdomeC') ? 'is-invalid' : '' }} one_n" value="{{ old('abdomeC') }}" placeholder="Medidas do Abdome C">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="abdomeM">Abdome M</label>
                            <input type="text" name="abdomeM" class="form-control {{ $errors->has('abdomeM') ? 'is-invalid' : '' }} one_n" value="{{ old('abdomeM') }}" placeholder="Medidas do Abdome M">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="hip">Quadril</label>
                            <input type="text" name="hip" class="form-control {{ $errors->has('hip') ? 'is-invalid' : '' }} one_n" value="{{ old('hip') }}" placeholder="Medidas do Quadril">
                        </div>
                    </div>

                    <hr />

                    {{-- Direito e Esquerdo --}}
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-5">
                            <label for="arm_cd">Braço Contraído Direito</label>
                            <input type="text" name="arm_cd" class="form-control {{ $errors->has('arm_cd') ? 'is-invalid' : '' }} one_n" value="{{ old('arm_cd') }}" placeholder="Medidas do Braço Contraido">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="arm_ce">Braço Contraído Esquerdo</label>
                            <input type="text" name="arm_ce" class="form-control {{ $errors->has('arm_ce') ? 'is-invalid' : '' }} one_n" value="{{ old('arm_ce') }}" placeholder="Medidas do Braço Contraido">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="arm_rd">Braço Relaxado Direito</label>
                            <input type="text" name="arm_rd" class="form-control {{ $errors->has('arm_rd') ? 'is-invalid' : '' }} one_n" value="{{ old('arm_rd') }}" placeholder="Medidas do Braço Relaxado">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="arm_re">Braço Relaxado Esquerdo</label>
                            <input type="text" name="arm_re" class="form-control {{ $errors->has('arm_re') ? 'is-invalid' : '' }} one_n" value="{{ old('arm_re') }}" placeholder="Medidas do Braço Relaxado">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="forearm_d">Antebraço Direito</label>
                            <input type="text" name="forearm_d" class="form-control {{ $errors->has('forearm_d') ? 'is-invalid' : '' }} one_n" value="{{ old('forearm_d') }}" placeholder="Medidas do Antebraço">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="forearm_e">Antebraço Esquerdo</label>
                            <input type="text" name="forearm_e" class="form-control {{ $errors->has('forearm_e') ? 'is-invalid' : '' }} one_n" value="{{ old('forearm_e') }}" placeholder="Medidas do Antebraço">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="thigh_d">Coxa Proximal Direito</label>
                            <input type="text" name="thigh_d" class="form-control {{ $errors->has('thigh_d') ? 'is-invalid' : '' }} one_n" value="{{ old('thigh_d') }}" placeholder="Medidas da Coxa Proximal">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="thigh_e">Coxa Proximal Esquerdo</label>
                            <input type="text" name="thigh_e" class="form-control {{ $errors->has('thigh_e') ? 'is-invalid' : '' }} one_n" value="{{ old('thigh_e') }}" placeholder="Medidas da Coxa Proximal">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="thigh_md">Coxa Medial Direito</label>
                            <input type="text" name="thigh_md" class="form-control {{ $errors->has('thigh_md') ? 'is-invalid' : '' }} one_n" placeholder="Medidas da Coxa Medial">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="thigh_me">Coxa Medial Esquerdo</label>
                            <input type="text" name="thigh_me" class="form-control {{ $errors->has('thigh_me') ? 'is-invalid' : '' }} one_n" placeholder="Medidas da Coxa Medial">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="calf_d">Panturrilha Direito</label>
                            <input type="text" name="calf_d" class="form-control {{ $errors->has('calf_d') ? 'is-invalid' : '' }} one_n" placeholder="Medidas da Panturrilha">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="calf_e">Panturilha Esquerdo</label>
                            <input type="text" name="calf_e" class="form-control {{ $errors->has('calf_e') ? 'is-invalid' : '' }} one_n" placeholder="Medidas da Panturrilha">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Aviso de Protocolos e biometria --}}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <input type="checkbox" name="check_protocol" id="check_protocol" value="1" checked>
                        <label>Usar Protocolos e Biometria? <i class="fas fa-exclamation-triangle"></i></label>
                    </div>
                    
                    <div id="alert_protocol"></div>
                </div>
            </div>

            {{-- Protocolos e biometria - Dobras Cutâneas --}}
            <div class="card card-primary" id="protocolos">
                <div class="card-header">
                    <h3 class="card-title">Protocolos & Biometria - Dobras Cutâneas</h3>
                </div>
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label for="protocol_dc">Dobras Cutâneas</label>
                        <select class="form-control {{ $errors->has('protocol_dc') ? 'is-invalid' : '' }}" name="protocol_dc">
                            <option value="">Selecione o Protocolo de Dobras Cutâneas</option>
                            <option value="P3D">Pollock 3 Dobras</option>
                            <option value="P7D">Pollock 7 Dobras</option>
                            <option value="D4D">Durinn 4 Dobras</option>
                        </select>
                    </div>

                    <hr />

                    <div class="form-row" id="biometria_media">
                        {{-- Bicipital --}}
                        <div class="form-group col-sm-3">
                            <label for="bicipital_r1">Bicipital Direito 1</label>
                            <input type="text" name="bicipital_r1" class="form-control {{ $errors->has('bicipital_r1') ? 'is-invalid' : '' }} BR one_n" value="{{ old('bicipital_r1') }}" placeholder="Medidas do Bicipital">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="bicipital_r2">Bicipital Direito 2</label>
                            <input type="text" name="bicipital_r2" class="form-control BR one_n" value="{{ old('bicipital_r2') }}" placeholder="Medidas do Bicipital">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="media_br">Media</label>
                            <input type="text" class="form-control BRM" value="{{ old('media_br') }}" placeholder="Media" disabled>
                            <input type="hidden" name="media_br" value="{{ old('media_br') }}" class="BRM">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="bicipital_ls">Bicipital Esquerda unica</label>
                            <input type="text" name="bicipital_ls" class="form-control {{ $errors->has('bicipital_ls') ? 'is-invalid' : '' }} one_n" value="{{ old('bicipital_ls') }}" placeholder="Medidas do Bicipital">
                        </div>

                        {{-- Tricipital --}}
                        <div class="form-group col-sm-3">
                            <label for="tricipital_r1">tricipital Direito 1</label>
                            <input type="text" name="tricipital_r1" class="form-control {{ $errors->has('tricipital_r1') ? 'is-invalid' : '' }} TR one_n" value="{{ old('tricipital_r1') }}" placeholder="Medidas do Tricipital">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="tricipital_r2">tricipital Direito 2</label>
                            <input type="text" name="tricipital_r2" class="form-control TR one_n" value="{{ old('tricipital_r2') }}" placeholder="Medidas do Tricipital">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="media_tr">Media</label>
                            <input type="text" class="form-control TRM" value="{{ old('media_tr') }}" placeholder="Media" disabled>
                            <input type="hidden" name="media_tr" value="{{ old('media_tr') }}" class="TRM">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="tricipital_ls">tricipital Esquerda unica</label>
                            <input type="text" name="tricipital_ls" class="form-control {{ $errors->has('tricipital_ls') ? 'is-invalid' : '' }} one_n" value="{{ old('tricipital_ls') }}" placeholder="Medidas do Tricipital">
                        </div>

                        {{-- Toracica --}}
                        <div class="form-group col-sm-3">
                            <label for="toracica_r1">Torácica Direito 1</label>
                            <input type="text" name="toracica_r1" class="form-control {{ $errors->has('toracica_r1') ? 'is-invalid' : '' }} T_R one_n" value="{{ old('toracica_r1') }}" placeholder="Medidas do Toracica">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="toracica_r2">Torácica Direito 2</label>
                            <input type="text" name="toracica_r2" class="form-control T_R one_n" value="{{ old('toracica_r2') }}" placeholder="Medidas do Toracica">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="media_t_r">Media</label>
                            <input type="text" class="form-control T_RM" value="{{ old('media_t_r') }}" placeholder="Media" disabled>
                            <input type="hidden" name="media_t_r" class="T_RM" value="{{ old('media_t_r') }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="toracica_ls">Torácica Esquerda unica</label>
                            <input type="text" name="toracica_ls" class="form-control {{ $errors->has('toracica_ls') ? 'is-invalid' : '' }} one_n" value="{{ old('toracica_ls') }}" placeholder="Medidas do Toracica">
                        </div>

                        {{-- Subescapular --}}
                        <div class="form-group col-sm-3">
                            <label for="subescapular_r1">Subescapular Direito 1</label>
                            <input type="text" name="subescapular_r1" class="form-control {{ $errors->has('subescapular_r1') ? 'is-invalid' : '' }} SR one_n" value="{{ old('subescapular_r1') }}" placeholder="Medidas do Subescapular">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="subescapular_r2">Subescapular Direito 2</label>
                            <input type="text" name="subescapular_r2" class="form-control SR one_n" value="{{ old('subescapular_r2') }}" placeholder="Medidas do Subescapular">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="media_sr">Media</label>
                            <input type="text" class="form-control SRM" value="{{ old('media_sr') }}" placeholder="Media" disabled>
                            <input type="hidden" name="media_sr" class="SRM" value="{{ old('media_sr') }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="subescapular_ls">Subescapular Esquerda unica</label>
                            <input type="text" name="subescapular_ls" class="form-control {{ $errors->has('subescapular_ls') ? 'is-invalid' : '' }} one_n" value="{{ old('subescapular_ls') }}" placeholder="Medidas do Subescapular">
                        </div>

                        {{-- Axiliar media --}}
                        <div class="form-group col-sm-3">
                            <label for="axiliarmedia_r1">Axiliar Média Direito 1</label>
                            <input type="text" name="axiliarmedia_r1" class="form-control {{ $errors->has('axiliarmedia_r1') ? 'is-invalid' : '' }} AMR one_n" value="{{ old('axiliarmedia_r1') }}" placeholder="Medidas do Axiliar Média">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="axiliarmedia_r2">Axiliar Média Direito 2</label>
                            <input type="text" name="axiliarmedia_r2" class="form-control AMR one_n" value="{{ old('axiliarmedia_r2') }}" placeholder="Medidas do Axiliar Média">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="media_amr">Media</label>
                            <input type="text" class="form-control AMRM" value="{{ old('media_amr') }}" placeholder="Media" disabled>
                            <input type="hidden" name="media_amr" class="AMRM"value=" {{ old('media_amr') }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="axiliarmedia_ls">Axiliar Média Esquerda unica</label>
                            <input type="text" name="axiliarmedia_ls" class="form-control {{ $errors->has('axiliarmedia_ls') ? 'is-invalid' : '' }} one_n" value="{{ old('axiliarmedia_ls') }}" placeholder="Medidas do Axiliar Média">
                        </div>

                        {{-- Supra Iliaca --}}
                        <div class="form-group col-sm-3">
                            <label for="suprailiaca_r1">Supra Ilíaca Direito 1</label>
                            <input type="text" name="suprailiaca_r1" class="form-control {{ $errors->has('suprailiaca_r1') ? 'is-invalid' : '' }} SIR one_n" value="{{ old('suprailiaca_r1') }}" placeholder="Medidas do Supra Ilíaca">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="suprailiaca_r2">Supra Ilíaca Direito 2</label>
                            <input type="text" name="suprailiaca_r2" class="form-control SIR one_n" value="{{ old('suprailiaca_r2') }}" placeholder="Medidas do Supra Ilíaca">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="media_sir">Media</label>
                            <input type="text" class="form-control SIRM" value="{{ old('media_sir') }}" placeholder="Media" disabled>
                            <input type="hidden" name="media_sir" class="SIRM" value="{{ old('media_sir') }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="suprailiaca_ls">Supra Ilíaca Esquerda unica</label>
                            <input type="text" name="suprailiaca_ls" class="form-control {{ $errors->has('suprailiaca_ls') ? 'is-invalid' : '' }} one_n" value="{{ old('suprailiaca_ls') }}" placeholder="Medidas do Supra Ilíaca">
                        </div>

                        {{-- Abdominal --}}
                        <div class="form-group col-sm-3">
                            <label for="abdominal_r1">Abdominal Direito 1</label>
                            <input type="text" name="abdominal_r1" class="form-control {{ $errors->has('abdominal_r1') ? 'is-invalid' : '' }} AR one_n" value="{{ old('abdominal_r1') }}" placeholder="Medidas do Abdominal">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="abdominal_r2">Abdominal Direito 2</label>
                            <input type="text" name="abdominal_r2" class="form-control AR one_n" value="{{ old('abdominal_r2') }}" placeholder="Medidas do Abdominal">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="media_ar">Media</label>
                            <input type="text" class="form-control ARM" value="{{ old('media_ar') }}" placeholder="Media" disabled>
                            <input type="hidden" name="media_ar" class="ARM" value="{{ old('media_ar') }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="abdominal_ls">Abdominal Esquerda unica</label>
                            <input type="text" name="abdominal_ls" class="form-control {{ $errors->has('abdominal_ls') ? 'is-invalid' : '' }} one_n" value="{{ old('abdominal_ls') }}" placeholder="Medidas da Abdominal">
                        </div>

                        {{-- Coxa --}}
                        <div class="form-group col-sm-3">
                            <label for="coxa_r1">Coxa Direito 1</label>
                            <input type="text" name="coxa_r1" class="form-control {{ $errors->has('coxa_r1') ? 'is-invalid' : '' }} CR one_n" value="{{ old('coxa_r1') }}" placeholder="Medidas da Coxa">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="coxa_r2">Coxa Direito 2</label>
                            <input type="text" name="coxa_r2" class="form-control CR one_n" value="{{ old('coxa_r2') }}" placeholder="Medidas da Coxa">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="media_cr">Media</label>
                            <input type="text" class="form-control CRM" value="{{ old('media_cr') }}" placeholder="Media" disabled>
                            <input type="hidden" name="media_cr" class="CRM" value="{{ old('media_cr') }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="coxa_ls">Coxa Esquerda unica</label>
                            <input type="text" name="coxa_ls" class="form-control {{ $errors->has('coxa_ls') ? 'is-invalid' : '' }} one_n" value="{{ old('coxa_ls') }}" placeholder="Medidas da Coxa">
                        </div>

                        {{-- Panturrilha Medial --}}
                        <div class="form-group col-sm-3">
                            <label for="panturrilhamedial_r1">Panturrilha Medial Direito 1</label>
                            <input type="text" name="panturrilhamedial_r1" class="form-control {{ $errors->has('panturrilhamedial_r1') ? 'is-invalid' : '' }} PMR one_n" value="{{ old('panturrilhamedial_r1') }}" placeholder="Medidas da Panturrilha Medial">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="panturrilhamedial_r2">Panturrilha Medial Direito 2</label>
                            <input type="text" name="panturrilhamedial_r2" class="form-control PMR one_n" value="{{ old('panturrilhamedial_r2') }}" placeholder="Medidas da Panturrilha Medial">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="media_pmr">Media</label>
                            <input type="text" class="form-control PMRM" value="{{ old('media_pmr') }}" placeholder="Media" disabled>
                            <input type="hidden" name="media_pmr" class="PMRM" value="{{ old('media_pmr') }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="panturrilhamedial_ls">Panturrilha Medial Esquerda unica</label>
                            <input type="text" name="panturrilhamedial_ls" class="form-control {{ $errors->has('panturrilhamedial_ls') ? 'is-invalid' : '' }} one_n" value="{{ old('panturrilhamedial_ls') }}" placeholder="Medidas da Panturrilha Medial">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Aviso de Bioimpedancia --}}
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <input type="checkbox" name="check_bioimpedancia" id="check_bioimpedancia" value="1" checked>
                        <label>Usar Bioimpedância? <i class="icon fa fa-warning"></i></label>
                    </div>

                    <div id="alert_bioimpedancia"></div>
                </div>
            </div>

            {{-- Bioimpedancia --}}
            <div class="card card-primary" id="bioimpedancias">
                <div class="card-header">
                    <h3 class="card-title">Bioimpedância</h3>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="gorduracorporal">Gordura Corporal</label>
                            <div class="input-group">
                                <input type="text" name="gorduracorporal" class="form-control {{ $errors->has('gorduracorporal') ? 'is-invalid' : '' }} one_n" value="{{ old('gorduracorporal') }}" placeholder="Porcentagem da Gordural Corporal">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="massamuscular">Massa Muscular</label>
                            <div class="input-group">
                                <input type="text" name="massamuscular" class="form-control {{ $errors->has('massamuscular') ? 'is-invalid' : '' }} one_n" value="{{ old('massamuscular') }}" placeholder="Porcentagem da Massa Muscular">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="agua">Água</label>
                            <div class="input-group">
                                <input type="text" name="agua" class="form-control {{ $errors->has('agua') ? 'is-invalid' : '' }} one_n" value="{{ old('agua') }}" placeholder="Porcentagem de Água">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="proteina">Proteína</label>
                            <div class="input-group">
                                <input type="text" name="proteina" class="form-control {{ $errors->has('proteina') ? 'is-invalid' : '' }} one_n" value="{{ old('proteina') }}" placeholder="Porcentagem da Proteína">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="gorduravisceral">Gordura Visceral</label>
                            <input type="text" name="gorduravisceral" class="form-control {{ $errors->has('gorduravisceral') ? 'is-invalid' : '' }}" value="{{ old('gorduravisceral') }}" placeholder="Gordura viceral">
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="massaossea_p">Massa Óssea(%)</label>
                            <div class="input-group">
                                <input type="text" name="massaossea_p" id="massaossea_p" class="form-control {{ $errors->has('massaossea_p') ? 'is-invalid' : '' }} one_n" value="{{ old('massaossea_p') }}" placeholder="Porcentagem da Massa Osséa">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="massaossea_kg">Massa Óssea(Kg)</label>
                            <div class="input-group">
                                <input type="text" class="form-control massaossea_kg" value="{{ old('massaossea_kg') }}" placeholder="Massa Óssea Kg" disabled>
                                <input type="hidden" name="massaossea_kg" class="massaossea_kg" value="{{ old('massaossea_kg') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="idadecorporal">Idade Corporal</label>
                            <input type="text" name="idadecorporal" class="form-control {{ $errors->has('idadecorporal') ? 'is-invalid' : '' }}" value="{{ old('idadecorporal') }}" placeholder="Idade Corporal">
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="taxametabolismo">Taxa de Metabolismo</label>
                            <input type="text" name="taxametabolismo" class="form-control {{ $errors->has('taxametabolismo') ? 'is-invalid' : '' }}" value="{{ old('taxametabolismo') }}" placeholder="Taxa de Metabolismo">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Teste de Resistencia Muscular --}}
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Teste de Resistencia Muscular</h3>
                </div>

                <div class="card-body">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-sm-7">
                            <label for="abdomen">Abdomen</label>
                            <div class="input-group">
                                <input type="text" name="abdomen" class="form-control {{ $errors->has('abdomen') ? 'is-invalid' : '' }}" value="{{ old('abdomen') }}" placeholder="Teste de Abdomen">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="abdomencheck" value="1" {{ old('abdomencheck') == 1 ? "checked" : "" }}>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-7">
                            <label for="flexao">Flexão</label>
                            <div class="input-group">
                                <input type="text" name="flexao" class="form-control {{ $errors->has('flexao') ? 'is-invalid' : '' }}" value="{{ old('flexao') }}" placeholder="Teste de Flexão">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="flexaocheck" value="1" {{ old('flexaocheck') == 1 ? "checked" : "" }}>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('js')
    <script>
        $('.one_n').maskMoney({ decimal: ',', thousands: '', precision: 1});
        $('.two_n').maskMoney({ decimal: ',', thousands: '', precision: 2});

        // --Medias do bicipital
        $("#biometria_media").on("keyup blur change", function(){
            var Mbicipital = 0;
            var bicipital = 0;
            var bilength = 0;
            $(".BR").each(function(){
                bicipital += parseFloat($(this).val().replace(',','.')) || 0;
                if($(this).val() == "" || $(this).val() == '0,0'){
                    bilength += $(this).length;
                }
                // -----
                if(bilength == 0){
                    Mbicipital = bicipital / 2;
                    $(".BRM").val(Mbicipital.toFixed(2).replace('.',','));
                }else if(bilength == 1){
                    Mbicipital = bicipital / 1;
                    $(".BRM").val(Mbicipital.toFixed(2).replace('.',','));
                }
            });
            // -----
            var Mtricipital = 0;
            var tricipital = 0;
            var trilength = 0;
            $(".TR").each(function(){
                tricipital += parseFloat($(this).val().replace(',','.')) || 0;
                if($(this).val() == "" || $(this).val() == '0,0'){
                    trilength += $(this).length;
                }
                // -----
                if(trilength == 0){
                    Mtricipital = tricipital / 2;
                    $(".TRM").val(Mtricipital.toFixed(2).replace('.',','));
                }else if(trilength == 1){
                    Mtricipital = tricipital / 1;
                    $(".TRM").val(Mtricipital.toFixed(2).replace('.',','));
                }
            });
            // -----
            var Mtoracica = 0;
            var toracica = 0;
            var tolength = 0;
            $(".T_R").each(function(){
                toracica += parseFloat($(this).val().replace(',','.')) || 0;
                if($(this).val() == "" || $(this).val() == '0,0'){
                    tolength += $(this).length;
                }
                // -----
                if(tolength == 0){
                    Mtoracica = toracica / 2;
                    $(".T_RM").val(Mtoracica.toFixed(2).replace('.',','));
                }else if(tolength == 1){
                    Mtoracica = toracica / 1;
                    $(".T_RM").val(Mtoracica.toFixed(2).replace('.',','));
                }
            });
            // -----
            var Msubescapular = 0;
            var subescapular = 0;
            var sublength = 0;
            $(".SR").each(function(){
                subescapular += parseFloat($(this).val().replace(',','.')) || 0;
                if($(this).val() == "" || $(this).val() == '0,0'){
                    sublength += $(this).length;
                }
                // -----
                if(sublength == 0){
                    Msubescapular = subescapular / 2;
                    $(".SRM").val(Msubescapular.toFixed(2).replace('.',','));
                }else if(sublength == 1){
                    Msubescapular = subescapular / 1;
                    $(".SRM").val(Msubescapular.toFixed(2).replace('.',','));
                }
            });
            // -----
            var MaxiliarM = 0;
            var axiliarM = 0;
            var axilengthM = 0;
            $(".AMR").each(function(){
                axiliarM += parseFloat($(this).val().replace(',','.')) || 0;
                if($(this).val() == "" || $(this).val() == '0,0'){
                    axilengthM += $(this).length;
                }
                // -----
                if(axilengthM == 0){
                    MaxiliarM = axiliarM / 2;
                    $(".AMRM").val(MaxiliarM.toFixed(2).replace('.',','));
                }else if(axilengthM == 1){
                    MaxiliarM = axiliarM / 1;
                    $(".AMRM").val(MaxiliarM.toFixed(2).replace('.',','));
                }
            });
            // ------
            var MsupraI = 0;
            var supraI = 0;
            var suplength = 0;
            $(".SIR").each(function(){
                supraI += parseFloat($(this).val().replace(',','.')) || 0;
                if($(this).val() == "" || $(this).val() == '0,0'){
                    suplength += $(this).length;
                }
                // -----
                if(suplength == 0){
                    MsupraI = supraI / 2;
                    $(".SIRM").val(MsupraI.toFixed(2).replace('.',','));
                }else if(suplength == 1){
                    MsupraI = supraI / 1;
                    $(".SIRM").val(MsupraI.toFixed(2).replace('.',','));
                }
            });
            // ------
            var Mabdominal = 0;
            var abdominal = 0;
            var abdlength = 0;
            $(".AR").each(function(){
                abdominal += parseFloat($(this).val().replace(',','.')) || 0;
                if($(this).val() == "" || $(this).val() == '0,0'){
                    abdlength += $(this).length;
                }
                // -----
                if(abdlength == 0){
                    Mabdominal = abdominal / 2;
                    $(".ARM").val(Mabdominal.toFixed(2).replace('.',','));
                }else if(abdlength == 1){
                    Mabdominal = abdominal / 1;
                    $(".ARM").val(Mabdominal.toFixed(2).replace('.',','));
                }
            });
            // ------
            var Mcoxa = 0;
            var coxa = 0;
            var coxalength = 0;
            $(".CR").each(function(){
                coxa += parseFloat($(this).val().replace(',','.')) || 0;
                if($(this).val() == "" || $(this).val() == '0,0'){
                    coxalength += $(this).length;
                }
                // -----
                if(coxalength == 0){
                    Mcoxa = coxa / 2;
                    $(".CRM").val(Mcoxa.toFixed(2).replace('.',','));
                }else if(coxalength == 1){
                    Mcoxa = coxa / 1;
                    $(".CRM").val(Mcoxa.toFixed(2).replace('.',','));
                }
            });
            // ------
            var MpanturrilhaM = 0;
            var panturrilhaM = 0;
            var panlength = 0;
            $(".PMR").each(function(){
                panturrilhaM += parseFloat($(this).val().replace(',','.')) || 0;
                if($(this).val() == "" || $(this).val() == '0,0'){
                    panlength += $(this).length;
                }
                // -----
                if(panlength == 0){
                    MpanturrilhaM = panturrilhaM / 2;
                    $(".PMRM").val(MpanturrilhaM.toFixed(2).replace('.',','));
                }else if(panlength == 1){
                    MpanturrilhaM = panturrilhaM / 1;
                    $(".PMRM").val(MpanturrilhaM.toFixed(2).replace('.',','));
                }
            });
        });

        // Validação contraditoria ----
        $("#check_protocol").on("click focus", function(){
            $("#alert_protocol").empty();

            if($("#check_protocol").prop("checked")){
                $("#alert_protocol").empty();
            }else{
                $("#alert_protocol").html(
                    '<div class="alert alert-warning alert-dismissible">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                        '<h4><i class="fas fa-exclamation-triangle"></i> Cuidado!</h4>'+
                        'Cuidado! ao desmarcar a caixa você não precisará utilizar os <strong>Protocolos e Biometrias</strong> mas também não sera possivel determinar certos pontos de contas.'+
                    '</div>'
                );
                $("#protocolos input, #protocolos select").removeClass('is-invalid');
            }
        });
        // ---->
        $("#check_bioimpedancia").on("click focus", function(){
            $("#alert_bioimpedancia").empty();

            if($("#check_bioimpedancia").prop("checked")){
                $("#alert_bioimpedancia").empty();
            }else{
                $("#alert_bioimpedancia").html(
                    '<div class="alert alert-warning alert-dismissible">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                        '<h4><i class="icon fa fa-exclamation-triangle"></i> Cuidado!</h4>'+
                        'Cuidado! ao desmarcar a caixa você não precisará utilizar a <strong>Bioimpedância</strong> mas também não sera possivel determinar certos pontos de contas.'+
                    '</div>'
                );
                $("#bioimpedancias input, #bioimpedancias select").removeClass('is-invalid');
            }
        });

        // Multiplicação do peso com a porcentagem da massa ossea
        $("#weight, #massaossea_p").on("keyup blur", function(){
            var peso = $("#weight").val().replace(",",".");
            var massaossea_p = $("#massaossea_p").val().replace(",",".");

            var result = (massaossea_p * peso) / 100;

            if(result != 0.0){
                $(".massaossea_kg").val(result.toFixed(2).replace(".",","));
            }
        });

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