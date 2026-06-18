@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h4 class="mb-0">✏️ Editar: {{ $produto->nome }}</h4>
            </div>
            <div class="card-body">

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
                    Para UPDATE, o método real é PUT, mas HTML só aceita GET e POST.
                    Solução: usar POST + @method('PUT') — o Laravel entende isso.
                --}}
                <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nome" class="form-label fw-bold">Nome *</label>
                        <input type="text"
                               class="form-control @error('nome') is-invalid @enderror"
                               id="nome"
                               name="nome"
                               value="{{ old('nome', $produto->nome) }}"
                               required>
                        {{-- old('nome', $produto->nome): usa old se existir, senão usa o valor atual --}}
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label fw-bold">Descrição</label>
                        <textarea class="form-control @error('descricao') is-invalid @enderror"
                                  id="descricao"
                                  name="descricao"
                                  rows="3">{{ old('descricao', $produto->descricao) }}</textarea>
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
                                   value="{{ old('preco', $produto->preco) }}"
                                   step="0.01"
                                   min="0"
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
                                   value="{{ old('quantidade', $produto->quantidade) }}"
                                   min="0"
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
                                <option value="{{ $cat }}"
                                    {{ old('categoria', $produto->categoria) == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            💾 Atualizar Produto
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
