<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //abri o formulario de cadastro
    public function mostrarFormCat(){
        return view('cad_categoria');
    }
    public function index(){
        return view('index');
    }
    public function mostrarFormCurso(){
        return view('cad_curso');
    }
    public function mostrarFormAula(){
        return view('cad_aula');
    }

    public function mostrarManipulaCategoria(){
        $registrosCat = Categoria::All();
        return view('manipula_categoria',['registrosCategoria'=> $registrosCat ]);
    }

    public function mostrarManipulaCurso(){
        $registrosCurso = Categoria::All();
        return view('manipula_curso',['registrosCurso'=> $registrosCurso ]);
    }

    public function mostrarManipulaAula(){
        $registrosAula = Categoria::All();
        return view('manipula_aula',['registrosAula'=> $registrosAula ]);
    }

    public function cadastroCat(Request $request){
        $registrosCat = $request->validate([
        'nomecategoria' => 'string|required'
        ]);

        Categoria::create($registrosCat);

        return Redirect::route('index');
    }

}
