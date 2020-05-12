<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Aluno;

class AlunoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos dados
        if($request['cpf'] == null){
            $validatedData = $request->validate([
                'name'      => 'required|string|max:255',
                'date'      => 'required|date_format:d/m/Y',
            ]);
        }else{
            if(Aluno::where('user_id',auth()->user()->id)->get()->count() <= 1){
                $validatedData = $request->validate([
                    'name'      => 'required|string|max:255',
                    'date'      => 'required|date_format:d/m/Y',
                ]);
            }else{
                $validatedData = $request->validate([
                    'cpf'       => 'unique:alunos,cpf' ,
                    'name'      => 'required|string|max:255',
                    'date'      => 'required|date_format:d/m/Y',
                ]);
            }
        }

        // Criação do codigo do usuario
        do{
            $code = rand(10, 15); 
            $access_code = substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnPpQqRrSsTtUuVvYyXxWwZz0123456789"), 0, $code);

            $code_rand = Aluno::where('access_code',$access_code)->first();
        }while($code_rand !== null);

        $date = date("Y-m-d", strtotime(str_replace('/','-',$request['date'])));

        // Salvbando dados
        $create_aluno = Aluno::create([
            'user_id'       => auth()->user()->id,
            'access_code'   => $access_code,
            'cpf'           => $request['cpf'],
            'name'          => mb_convert_case($request['name'], MB_CASE_TITLE),
            'date'          => $date,
            'email'         => $request['email'],
            'mobile'        => $request['mobile'],
        ]);

        return redirect()->back()->with('success', 'Aluno cadastrado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($access_code)
    {
        $aluno = Aluno::where('user_id',auth()->user()->id)->where('access_code', $access_code)->get();

        return view('alunos.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($access_code)
    {
        $aluno = Aluno::where('access_code', $access_code)->get();

        return view('alunos.editar', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $access_code)
    {
        // Validação dos dados
        if($request['cpf'] == null){
            $validatedData = $request->validate([
                'name'      => 'required|string|max:255',
                'date'      => 'required|date_format:d/m/Y',
            ]);
        }else{
            if(Aluno::where('user_id',auth()->user()->id)->get()->count() <= 1){
                $validatedData = $request->validate([
                    'name'      => 'required|string|max:255',
                    'date'      => 'required|date_format:d/m/Y',
                ]);
            }else{
                $validatedData = $request->validate([
                    'cpf'       => 'unique:alunos,cpf' ,
                    'name'      => 'required|string|max:255',
                    'date'      => 'required|date_format:d/m/Y',
                ]);
            }
        }

        $date = date("Y-m-d", strtotime(str_replace('/','-',$request['date'])));

        $alunocpf = Aluno::where('user_id',auth()->user()->id)->where('access_code',$access_code)->get();

        $cpf = isset($request['cpf']) ? $request['cpf'] : $alunocpf[0]->cpf;

        // Salvbando dados
        $create_aluno = Aluno::where('user_id',auth()->user()->id)->where('access_code',$access_code)->update([
            'cpf'           => $cpf,
            'name'          => mb_convert_case($request['name'], MB_CASE_TITLE),
            'date'          => $date,
            'email'         => $request['email'],
            'mobile'        => $request['mobile'],
        ]);

        return redirect('/admin/alunos')->with('success', 'Aluno atualizado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($access_code)
    {
        $user_id = auth()->user()->id;
        $aluno = Aluno::where('user_id',$user_id)->where('access_code',$access_code);

        $aluno->delete();

        return redirect('/admin/alunos')->with('success','Aluno apagado com sucesso!!');
    }
}