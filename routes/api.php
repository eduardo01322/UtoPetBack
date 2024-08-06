<?php

use App\Http\Controllers\AnimaisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::post('animais/cadastro', [AnimaisController::class, 'cadastroAnimais']);
