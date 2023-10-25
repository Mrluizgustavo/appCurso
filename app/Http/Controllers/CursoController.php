<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use App\Models\Curso;


class CursoController extends Controller
{
    //voltar a home
    public function index(){
        return view('index');
    }
    //mostrar o form-curso
    public function mostrarFormCurso(){
        return view('cad_curso');
    }
    //mostrar manipula-curso
    public function mostrarManipulaCurso(){
        $registrosCurso = Curso::All();
        return view('manipula_curso',['registrosCurso'=> $registrosCurso ]);
    }

    //criar row na tabela
    public function cadastroCurso(Request $request){
        $registrosCurso = $request->validate([
        'idcategoria' => 'required',
        'nomecurso' => 'string|required',
        'cargahoraria'=> 'string|required',
        'valor'=> 'numeric|required',
        ]);

        Curso::create($registrosCurso);

        return Redirect::route('index');
    }
}
