@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">➕ Novo Produto</h4>
            </div>
            <div class="card-body">

                {{-- Erros de validação --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Corrija os erros abaixo:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{--
                    action: para onde o formulário envia os dados (rota store)
                    method: POST (único método que HTML suporta além de GET)
                    @csrf: token obrigatório de segurança (Laravel rejeita sem ele)
                --}}
                <form action="{{ route('produtos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nome" class="form-label fw-bold">Nome *</label>
                        {{--
                            old('nome'): repreenchimento automático se a validação falhar
                            is-invalid: classe Bootstrap para mostrar erro
                        --}}
                        <input type="text"
                               class="form-control @error('nome') is-invalid @enderror"
                               id="nome"
                               name="nome"
                               value="{{ old('nome') }}"
                               placeholder="Ex: Notebook Dell"
                               required>
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label fw-bold">Descrição</label>
                        <textarea class="form-control @error('descricao') is-invalid @enderror"
                                  id="descricao"
                                  name="descricao"
                                  rows="3"
                                  placeholder="Descrição opcional do produto">{{ old('descricao') }}</textarea>
                        @error('descricao')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="preco" class="form-label fw-bold">Preço (R$) *</label>
                            <input type="number"
                                   class="form-control @error('preco') is-invalid @enderror"
                                   id="preco"
                                   name="preco"
                                   value="{{ old('preco') }}"
                                   step="0.01"
                                   min="0"
                                   placeholder="0.00"
                                   required>
                            @error('preco')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="quantidade" class="form-label fw-bold">Quantidade *</label>
                            <input type="number"
                                   class="form-control @error('quantidade') is-invalid @enderror"
                                   id="quantidade"
                                   name="quantidade"
                                   value="{{ old('quantidade') }}"
                                   min="0"
                                   placeholder="0"
                                   required>
                            @error('quantidade')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="categoria" class="form-label fw-bold">Categoria *</label>
                        <select class="form-select @error('categoria') is-invalid @enderror"
                                id="categoria"
                                name="categoria"
                                required>
                            <option value="">Selecione uma categoria...</option>
                            @foreach(['Eletrônicos', 'Roupas', 'Alimentos', 'Livros', 'Móveis', 'Outros'] as $cat)
                                <option value="{{ $cat }}" {{ old('categoria') == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            💾 Salvar Produto
                        </button>
                        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                            ← Voltar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
