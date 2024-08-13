<?php

use App\Http\Controllers\AnimaisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//ANIMAIS
route::post('animais/cadastro', [AnimaisController::class, 'cadastroAnimais']);
route::get('animais/listagem', [AnimaisController::class, 'retornarTodos']);
route::get('animais/id/{id}', [AnimaisController::class, 'pesquisarPorId']);
route::get('animais/nome', [AnimaisController::class, 'pesquisarPorNome']);
route::get('animais/raca', [AnimaisController::class, 'pesquisarPorRaca']);
route::delete('animais/excluir/{id}', [AnimaisController::class, 'excluir']);
route::put('animais/update', [AnimaisController::class, 'update']);
