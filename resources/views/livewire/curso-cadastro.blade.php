<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Cadastrar Novo Curso</h1>

    <form wire:submit.prevent="salvar" class="space-y-4">
        <!-- Nome -->
        <div>
            <label for="nome" class="block text-sm font-medium text-gray-700">Nome *</label>
            <input 
                type="text" 
                id="nome" 
                wire:model="nome"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('nome') border-red-500 @enderror"
            >
            @error('nome') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        
        <div>
            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
            <textarea 
                id="descricao" 
                wire:model="descricao"
                rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            ></textarea>
        </div>

        <!-- Preço -->
        <div>
            <label for="preco" class="block text-sm font-medium text-gray-700">Preço (R$) *</label>
            <input 
                type="number" 
                id="preco" 
                wire:model="preco"
                step="0.01"
                min="0"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('preco') border-red-500 @enderror"
            >
            @error('preco') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Carga Horária -->
        <div>
            <label for="carga_horaria" class="block text-sm font-medium text-gray-700">Carga Horária (horas) *</label>
            <input 
                type="number" 
                id="carga_horaria" 
                wire:model="carga_horaria"
                min="1"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('carga_horaria') border-red-500 @enderror"
            >
            @error('carga_horaria') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Categoria -->
        <div>
            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria *</label>
            <select 
                id="categoria" 
                wire:model="categoria"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('categoria') border-red-500 @enderror"
            >
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat }}">{{ $cat }}</option>
                @endforeach
            </select>
            @error('categoria') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Ativo -->
        <div class="flex items-center">
            <input 
                type="checkbox" 
                id="ativo" 
                wire:model="ativo"
                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
            >
            <label for="ativo" class="ml-2 block text-sm text-gray-900">Curso ativo</label>
        </div>

        <!-- Botões -->
        <div class="flex gap-4">
            <button 
                type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md"
            >
                Cadastrar Curso
            </button>
            <a 
                href="{{ route('cursos.lista') }}"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-md"
            >
                Cancelar
            </a>
        </div>
    </form>
</div>