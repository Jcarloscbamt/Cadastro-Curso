<?php

namespace App\Livewire;

use App\Services\CursoService;
use Livewire\Component;

class CursoLista extends Component
{
    public function render(CursoService $cursoService)
    {
        return view('livewire.curso-lista', [
            'cursos' => $cursoService->listarTodos()
        ]);
    }
}