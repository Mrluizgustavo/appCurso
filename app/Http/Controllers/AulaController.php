<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use App\Models\Aula;



class AulaController extends Controller
{
    public function index(){
        return view('index');
    }
    public function mostrarFormAula(){
        return view('cad_aula');
    }

    public function mostrarManipulaAula(){
        $registrosAula = Aula::All();
        return view('manipula_aula',['registrosAula'=> $registrosAula ]);
    }
    public function DeletarAula(Aula $registrosAula){
        $registrosAula->delete();

        return Redirect::route('manipula-Aula');
    }

    public function cadastroAula(Request $request){
        $registrosAula = $request->validate([
        'idcurso' => 'required',
        'tituloaula' => 'string|required',
        'urlaula'=> 'string|required',
        ]);

        Aula::create($registrosAula);

        return Redirect::route('form-cadastro-aula');
    }

       public function BuscarAulaNome(Request $request){

        $registrosAula= Aula::query();
        $registrosAula->when($request->aula,function($query,$valor)
        {
            $query->where('tituloaula', 'like', '%' . $valor . '%');
        });

        $registrosAula = $registrosAula->get();
        return view('manipula_aula',['registrosAula' => $registrosAula]);

    }

    public function MostrarAlterarAula(Aula $registrosAula){
        return view('altera_aula',['registrosAula'=> $registrosAula]);
    }

    public function AlterarBancoAula(Aula $registrosAula, Request $request){

        $dadosValidados = $request->validate([
            'idcurso' => 'required',
            'tituloaula' => 'string|required',
            'urlaula'=> 'string|required',
        ]);
    
        $idAula = $registrosAula->id;
        
        $Aula = Aula::find($idAula);
    
        $Aula->update($dadosValidados);
    
        return redirect()->route('manipula-Aula');
    }
}
