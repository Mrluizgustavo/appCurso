<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AulaController;

//para ir para a Index
Route::get('/',[CategoriaController::class,'index'])->name('index');


//Rotas para Categoria 
Route::get('/cadCategoria',[CategoriaController::class,'mostrarFormCat'])->name("form-cadastro-categoria");
Route::post('/cadCategoria',[CategoriaController::class,'cadastroCat'])->name("cadastro-categoria");
Route::get('/manipulaCategoria',[CategoriaController::class,'mostrarManipulaCategoria'])->name("manipula-categoria");
Route::get('/alterarCategoria/{registrosCategoria}',[CategoriaController::class,'mostrarAlterarCategoria'])->name("alterar-categoria");
Route::delete('/deletarCategoria/{registrosCategoria}',[CategoriaController::class,'DeletarCategoria'])->name("deletar-categoria");

//Rotas para Curso 
Route::get('/cadCurso',[CursoController::class,'mostrarFormCurso'])->name("form-cadastro-curso");
Route::post('/cadCurso',[CursoController::class,'cadastroCurso'])->name("cadastro-curso");
Route::get('/manipulaCurso',[CursoController::class,'mostrarManipulaCurso'])->name("manipula-curso");
Route::delete('/deletarCurso/{registrosCurso}',[CursoController::class,'DeletarCurso'])->name("deletar-curso");

//para ir para o cadastro da aula 
Route::get('/cadAula',[AulaController::class,'mostrarFormAula'])->name("form-cadastro-aula");
Route::post('/cadAula',[AulaController::class,'cadastroAula'])->name("cadastro-aula");
Route::get('/manipulaAula',[AulaController::class,'mostrarManipulaAula'])->name("manipula-Aula");
Route::delete('/deletarAula/{registrosAula}',[AulaController::class,'DeletarAula'])->name("deleta-aula");