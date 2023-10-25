<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AulaController;

//para ir para a Index
Route::get('/',[CategoriaController::class,'index'])->name('index');

//para ir para o cadastro do curso
Route::get('/cadcurso',[CursoController::class,'mostrarFormCurso'])->name("form-cadastro-curso");
Route::post('/cadcurso',[CursoController::class,'cadastroCurso'])->name("cadastro-curso");


//para ir para o cadastro da categoria 
Route::get('/cadcategoria',[CategoriaController::class,'mostrarFormCat'])->name("form-cadastro-categoria");
Route::post('/cadcategoria',[CategoriaController::class,'cadastroCat'])->name("cadastro-categoria");

//para ir para o cadastro da aula 
Route::get('/cadAula',[AulaController::class,'mostrarFormAula'])->name("form-cadastro-aula");
Route::post('/cadAula',[AulaController::class,'cadastroAula'])->name("cadastro-aula");

//rota para manipular categoria
Route::get('/manipulacategoria',[CategoriaController::class,'mostrarManipulaCategoria'])->name("manipula-categoria");

//rota para manipular aula
Route::get('/manipulaAula',[CategoriaController::class,'mostrarManipulaAula'])->name("manipula-Aula");

//rota para manipular curso
Route::get('/manipulaCurso',[CategoriaController::class,'mostrarManipulaCurso'])->name("manipula-Curso");


Route::get('/alterar-categoria/{registrosCategoria}',[CategoriaController::class,'mostrarAlterarCategoria'])->name("alterar-categoria");