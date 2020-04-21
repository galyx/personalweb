<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Aluno;
use App\AF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Dispatcher $events)
    {
        return view('home');
    }

    /* ALUNOS */
    //Chamada de novo aluno
    public function novoaluno()
    {
        return view('alunos.novoaluno');
    }

    //Chamada para selecionar aluno
    public function alunos()
    {
        $qty_page = isset($_GET['quantidade_pagina']) ? $_GET['quantidade_pagina'] : 5;
        $filter_aluno = isset($_GET['filter_aluno']) ? $_GET['filter_aluno'] : '';

        $alunos = Aluno::where('user_id',auth()->user()->id)->where('name','like','%'.$filter_aluno.'%')->orWhere('access_code',$filter_aluno)->paginate($qty_page);
        
        return view('alunos.alunos', compact('alunos','qty_page','filter_aluno'));
    }

    /* AF */
    //Nova Avaliação Fisica
    public function novaaf($access_code)
    {
        $aluno = Aluno::where('user_id',auth()->user()->id)->where('access_code', $access_code)->get();
        $af_n = AF::where('access_code', $access_code)->count();

        //Contar idade do aluno
        $dmy = explode("-", $aluno[0]->date);
        $d = $dmy[2];
        $m = $dmy[1];
        $y = $dmy[0];

        $da = date("d");
        $ma = date("m");
        $ya = date("Y");

        $idade = $ya - $y;
        if($ma < $m || $ma == $m && $da < $d){
            $idade--;
        }
        //---->

        return view('af.novaaf', compact('aluno','idade','af_n'));
    }

}
