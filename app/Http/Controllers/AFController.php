<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Aluno;
use App\AF;
use App\Perimetria;
use App\RightLeft;
use App\Protocol;
use App\Bicipital;
use App\Tricipital;
use App\Toracica;
use App\Subescapular;
use App\AxiliarMedia;
use App\SupraIliaca;
use App\Abdominal;
use App\Coxa;
use App\PanturrilhaMedial;
use App\Bioimpedancia;
use App\TesteResistenciaMuscular;

class AFController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'      => 'required|date_format:d/m/Y',
            'height'    => 'required',
            'weight'    => 'required',
            'sex'       => 'required',
            'neck'      => 'required',
            'deltoids'  => 'required',
            'chest'     => 'required',
            'abdomeC'   => 'required',
            'abdomeM'   => 'required',
            'hip'       => 'required',
            'arm_cd'    => 'required',
            'arm_ce'    => 'required',
            'arm_rd'    => 'required',
            'arm_re'    => 'required',
            'forearm_d' => 'required',
            'forearm_e' => 'required',
            'thigh_d'   => 'required',
            'thigh_e'   => 'required',
            'thigh_md'  => 'required',
            'thigh_me'  => 'required',
            'calf_d'    => 'required',
            'calf_e'    => 'required',
            'protocol_dc'           => 'required_with:check_protocol, protocol_dc',
            'bicipital_r1'          => 'required_with:check_protocol, bicipital_r1',
            'bicipital_ls'          => 'required_with:check_protocol, bicipital_ls',
            'tricipital_r1'         => 'required_with:check_protocol, tricipital_r1',
            'tricipital_ls'         => 'required_with:check_protocol, tricipital_ls',
            'toracica_r1'           => 'required_with:check_protocol, toracica_r1',
            'toracica_ls'           => 'required_with:check_protocol, toracica_ls',
            'subescapular_r1'       => 'required_with:check_protocol, subescapular_r1',
            'subescapular_ls'       => 'required_with:check_protocol, subescapular_ls',
            'axiliarmedia_r1'       => 'required_with:check_protocol, axiliarmedia_r1',
            'axiliarmedia_ls'       => 'required_with:check_protocol, axiliarmedia_ls',
            'suprailiaca_r1'        => 'required_with:check_protocol, suprailiaca_r1',
            'suprailiaca_ls'        => 'required_with:check_protocol, suprailiaca_ls',
            'abdominal_r1'          => 'required_with:check_protocol, abdominal_r1',
            'abdominal_ls'          => 'required_with:check_protocol, abdominal_ls',
            'coxa_r1'               => 'required_with:check_protocol, coxa_r1',
            'coxa_ls'               => 'required_with:check_protocol, coxa_ls',
            'panturrilhamedial_r1'  => 'required_with:check_protocol, panturrilhamedial_r1',
            'panturrilhamedial_ls'  => 'required_with:check_protocol, panturrilhamedial_ls',
            'gorduracorporal'       => 'required_with:check_bioimpedancia, gorduracorporal',
            'massamuscular'         => 'required_with:check_bioimpedancia, massamuscular',
            'agua'                  => 'required_with:check_bioimpedancia, agua',
            'proteina'              => 'required_with:check_bioimpedancia, proteina',
            'gorduravisceral'       => 'required_with:check_bioimpedancia, gorduravisceral',
            'massaossea_p'          => 'required_with:check_bioimpedancia, massaossea_p',
            'idadecorporal'         => 'required_with:check_bioimpedancia, idadecorporal',
            'taxametabolismo'       => 'required_with:check_bioimpedancia, taxametabolismo',
            'abdomen'               => 'required_with:abdomencheck, abdomen',
            'flexao'                => 'required_with:flexaocheck, flexao',
        ]);

        $af['access_code'] = $request->access_code;
        $af['af_n'] = $request->af_n;
        $af['date'] = $request->date;
        $af['goal'] = $request->goal;
        $af['note'] = $request->note;
        $af['height'] = $request->height;
        $af['age'] = $request->age;
        $af['weight'] = $request->weight;
        $af['sex'] = $request->sex;

        $perimetria['access_code'] = $request->access_code;
        $perimetria['af_n'] = $request->af_n;
        $perimetria['neck'] = $request->neck;
        $perimetria['deltoids'] = $request->deltoids;
        $perimetria['chest'] = $request->chest;
        $perimetria['abdome_c'] = $request->abdomeC;
        $perimetria['abdome_m'] = $request->abdomeM;
        $perimetria['hip'] = $request->hip;

        $r_l['access_code'] = $request->access_code;
        $r_l['af_n'] = $request->af_n;
        $r_l['arm_cd'] = $request->arm_cd;
        $r_l['arm_ce'] = $request->arm_ce;
        $r_l['arm_rd'] = $request->arm_rd;
        $r_l['arm_re'] = $request->arm_re;
        $r_l['forearm_d'] = $request->forearm_d;
        $r_l['forearm_e'] = $request->forearm_e;
        $r_l['thigh_d'] = $request->thigh_d;
        $r_l['thigh_e'] = $request->thigh_e;
        $r_l['thigh_md'] = $request->thigh_md;
        $r_l['thigh_me'] = $request->thigh_me;
        $r_l['calf_d'] = $request->calf_d;
        $r_l['calf_e'] = $request->calf_e;

        if($request->check_protocol == "1"){
            $protocol['access_code'] = $request->access_code;
            $protocol['af_n'] = $request->af_n;
            $protocol['protocol'] = $request->protocol_dc;

            $bicipital['access_code'] = $request->access_code;
            $bicipital['af_n'] = $request->af_n;
            $bicipital['bicipital_r1'] = $request->bicipital_r1;
            $bicipital['bicipital_r2'] = $request->bicipital_r2;
            $bicipital['media_br'] = $request->media_br;
            $bicipital['bicipital_ls'] = $request->bicipital_ls;

            $tricipital['access_code'] = $request->access_code;
            $tricipital['af_n'] = $request->af_n;
            $tricipital['tricipital_r1'] = $request->tricipital_r1;
            $tricipital['tricipital_r2'] = $request->tricipital_r2;
            $tricipital['media_tr'] = $request->media_tr;
            $tricipital['tricipital_ls'] = $request->tricipital_ls;

            $toracica['access_code'] = $request->access_code;
            $toracica['af_n'] = $request->af_n;
            $toracica['toracica_r1'] = $request->toracica_r1;
            $toracica['toracica_r2'] = $request->toracica_r2;
            $toracica['media_t_r'] = $request->media_t_r;
            $toracica['toracica_ls'] = $request->toracica_ls;

            $subescapular['access_code'] = $request->access_code;
            $subescapular['af_n'] = $request->af_n;
            $subescapular['subescapular_r1'] = $request->subescapular_r1;
            $subescapular['subescapular_r2'] = $request->subescapular_r2;
            $subescapular['media_sr'] = $request->media_sr;
            $subescapular['subescapular_ls'] = $request->subescapular_ls;

            $axiliarmedia['access_code'] = $request->access_code;
            $axiliarmedia['af_n'] = $request->af_n;
            $axiliarmedia['axiliarmedia_r1'] = $request->axiliarmedia_r1;
            $axiliarmedia['axiliarmedia_r2'] = $request->axiliarmedia_r2;
            $axiliarmedia['media_amr'] = $request->media_amr;
            $axiliarmedia['axiliarmedia_ls'] = $request->axiliarmedia_ls;

            $suprailiaca['access_code'] = $request->access_code;
            $suprailiaca['af_n'] = $request->af_n;
            $suprailiaca['suprailiaca_r1'] = $request->suprailiaca_r1;
            $suprailiaca['suprailiaca_r2'] = $request->suprailiaca_r2;
            $suprailiaca['media_sir'] = $request->media_sir;
            $suprailiaca['suprailiaca_ls'] = $request->suprailiaca_ls;

            $abdominal['access_code'] = $request->access_code;
            $abdominal['af_n'] = $request->af_n;
            $abdominal['abdominal_r1'] = $request->abdominal_r1;
            $abdominal['abdominal_r2'] = $request->abdominal_r2;
            $abdominal['media_ar'] = $request->media_ar;
            $abdominal['abdominal_ls'] = $request->abdominal_ls;

            $coxa['access_code'] = $request->access_code;
            $coxa['af_n'] = $request->af_n;
            $coxa['coxa_r1'] = $request->coxa_r1;
            $coxa['coxa_r2'] = $request->coxa_r2;
            $coxa['media_cr'] = $request->media_cr;
            $coxa['coxa_ls'] = $request->coxa_ls;

            $panturrilhamedial['access_code'] = $request->access_code;
            $panturrilhamedial['af_n'] = $request->af_n;
            $panturrilhamedial['panturrilhamedial_r1'] = $request->panturrilhamedial_r1;
            $panturrilhamedial['panturrilhamedial_r2'] = $request->panturrilhamedial_r2;
            $panturrilhamedial['media_pmr'] = $request->media_pmr;
            $panturrilhamedial['panturrilhamedial_ls'] = $request->panturrilhamedial_ls;
        }else{
            $protocol['access_code'] = $request->access_code;
            $protocol['af_n'] = $request->af_n;

            $bicipital['access_code'] = $request->access_code;
            $bicipital['af_n'] = $request->af_n;

            $tricipital['access_code'] = $request->access_code;
            $tricipital['af_n'] = $request->af_n;

            $toracica['access_code'] = $request->access_code;
            $toracica['af_n'] = $request->af_n;

            $subescapular['access_code'] = $request->access_code;
            $subescapular['af_n'] = $request->af_n;

            $axiliarmedia['access_code'] = $request->access_code;
            $axiliarmedia['af_n'] = $request->af_n;

            $suprailiaca['access_code'] = $request->access_code;
            $suprailiaca['af_n'] = $request->af_n;

            $abdominal['access_code'] = $request->access_code;
            $abdominal['af_n'] = $request->af_n;

            $coxa['access_code'] = $request->access_code;
            $coxa['af_n'] = $request->af_n;

            $panturrilhamedial['access_code'] = $request->access_code;
            $panturrilhamedial['af_n'] = $request->af_n;
        }
        
        if($request->check_bioimpedancia == "1"){
            $bioimpedancia['access_code'] = $request->access_code;
            $bioimpedancia['af_n'] = $request->af_n;
            $bioimpedancia['gorduracorporal'] = $request->gorduracorporal;
            $bioimpedancia['massamuscular'] = $request->massamuscular;
            $bioimpedancia['agua'] = $request->agua;
            $bioimpedancia['proteina'] = $request->proteina;
            $bioimpedancia['gorduravisceral'] = $request->gorduravisceral;
            $bioimpedancia['massaossea_p'] = $request->massaossea_p;
            $bioimpedancia['massaossea_kg'] = $request->massaossea_kg;
            $bioimpedancia['idadecorporal'] = $request->idadecorporal;
            $bioimpedancia['taxametabolismo'] = $request->taxametabolismo;
        }else{
            $bioimpedancia['access_code'] = $request->access_code;
            $bioimpedancia['af_n'] = $request->af_n;
        }

        $t_r_m['access_code'] = $request->access_code;
        $t_r_m['af_n'] = $request->af_n;
        $t_r_m['abdomen'] = $request->abdomencheck == "1" ? $request->abdomen : null;
        $t_r_m['abdomencheck'] = $request->abdomencheck;
        $t_r_m['flexao'] = $request->flexaocheck == "1" ? $request->flexao : null;
        $t_r_m['flexaocheck'] = $request->flexaocheck;

        AF::create($af);
        Perimetria::create($perimetria);
        RightLeft::create($r_l);
        Protocol::create($protocol);
        Bicipital::create($bicipital);
        Tricipital::create($tricipital);
        Toracica::create($toracica);
        Subescapular::create($subescapular);
        AxiliarMedia::create($axiliarmedia);
        SupraIliaca::create($suprailiaca);
        Abdominal::create($abdominal);
        Coxa::create($coxa);
        PanturrilhaMedial::create($panturrilhamedial);
        Bioimpedancia::create($bioimpedancia);
        TesteResistenciaMuscular::create($t_r_m);

        return redirect('admin/alunos')->with('success', 'Avalição Fisica salva com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
