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

    //voltar a home
    public function index(){
        return view('index');
    }
   
    //entrar em manipula-categoria
    public function mostrarManipulaCategoria(){
        $registrosCat = Categoria::All();
        return view('manipula_categoria',['registrosCategoria'=> $registrosCat ]);
    }
  

    public function DeletarCategoria(Categoria $registrosCategoria){
        $registrosCategoria->delete();
        return Redirect::route('manipula-categoria');
    }

    //criar linha na tabela
    public function cadastroCat(Request $request){
        $registrosCat = $request->validate([
        'nomecategoria' => 'string|required'
        ]);

        Categoria::create($registrosCat);

        return Redirect::route('form-cadastro-categoria');
    }

    public function BuscarCategoriaNome(Request $request){

        $registrosCategoria= Categoria::query();
        $registrosCategoria->when($request->categoria,function($query,$valor)
        {
            $query->where('nomecategoria', 'like', '%' . $valor . '%');
        });

        $registrosCategoria = $registrosCategoria->get();
        return view('manipula_categoria',['registrosCategoria' => $registrosCategoria]);

    }

    public function MostrarAlterarCategoria(Categoria $registrosCategoria){
        return view('altera_categoria',['registrosCategoria'=> $registrosCategoria]);
    }

    public function AlterarBancoCategoria(Categoria $registrosCategoria, Request $request){

        $registrosCat = $request->validate([
            'nomecategoria' => 'string|required'
        ]);

        $idCategoria = $registrosCategoria->id;
        $categoria = Categoria::find($idCategoria);
        $categoria->update($registrosCat);
        return redirect()->route('manipula-categoria');
    }

}



