<?php

namespace App\Livewire;

use App\Services\CursoService;
use Livewire\Component;

class CursoCadastro extends Component
{
    public $nome = '';
    public $descricao = '';
    public $preco = '';
    public $carga_horaria = '';
    public $categoria = '';
    public $ativo = true;

    public $categorias = [
        'Programação',
        'Banco de Dados',
        'Redes',
        'UX/UI',
        'Outros'
    ];

    protected function rules()
    {
        return [
            'nome' => 'required|min:3|max:120',
            'descricao' => 'nullable',
            'preco' => 'required|numeric|min:0',
            'carga_horaria' => 'required|integer|min:1',
            'categoria' => 'required|in:Programação,Banco de Dados,Redes,UX/UI,Outros',
            'ativo' => 'boolean'
        ];
    }

    protected $messages = [
        'nome.required' => 'O nome é obrigatório.',
        'nome.min' => 'O nome deve ter no mínimo 3 caracteres.',
        'nome.max' => 'O nome deve ter no máximo 120 caracteres.',
        'preco.required' => 'O preço é obrigatório.',
        'preco.numeric' => 'O preço deve ser um valor numérico.',
        'preco.min' => 'O preço não pode ser negativo.',
        'carga_horaria.required' => 'A carga horária é obrigatória.',
        'carga_horaria.integer' => 'A carga horária deve ser um número inteiro.',
        'carga_horaria.min' => 'A carga horária deve ser no mínimo 1 hora.',
        'categoria.required' => 'A categoria é obrigatória.',
        'categoria.in' => 'Selecione uma categoria válida.',
    ];

    public function salvar(CursoService $cursoService)
    {
        $this->validate();

        try {
            $cursoService->criar([
                'nome' => $this->nome,
                'descricao' => $this->descricao,
                'preco' => $this->preco,
                'carga_horaria' => $this->carga_horaria,
                'categoria' => $this->categoria,
                'ativo' => $this->ativo,
            ]);

            session()->flash('mensagem', 'Curso cadastrado com sucesso!');
            
            return redirect()->route('cursos.lista');
        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao cadastrar curso: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.curso-cadastro');
    }
}