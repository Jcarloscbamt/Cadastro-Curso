<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CursoCadastro;
use App\Livewire\CursoLista;

Route::get('/', function () {
    return redirect()->route('cursos.lista');
});

Route::get('/cursos', CursoLista::class)->name('cursos.lista');
Route::get('/cursos/novo', CursoCadastro::class)->name('cursos.novo');