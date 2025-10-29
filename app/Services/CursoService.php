<?php

namespace App\Services;

use App\Models\Curso;

class CursoService
{
    public function criar(array $dados): Curso
    {
        
        $dados['nome'] = trim($dados['nome']);
        $dados['descricao'] = isset($dados['descricao']) ? trim($dados['descricao']) : null;
        
    
        return Curso::create($dados);
    }

    public function listarTodos()
    {
        return Curso::orderBy('created_at', 'desc')->get();
    }
}