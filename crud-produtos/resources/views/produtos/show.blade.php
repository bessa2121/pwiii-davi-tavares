@extends('layouts.app')

@section('title', $produto->nome)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white d-flex justify-content-between">
                <h4 class="mb-0">👁 Detalhes do Produto</h4>
                <span class="badge bg-light text-dark">ID: {{ $produto->id }}</span>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Nome</dt>
                    <dd class="col-sm-9">{{ $produto->nome }}</dd>

                    <dt class="col-sm-3">Descrição</dt>
                    <dd class="col-sm-9">{{ $produto->descricao ?? 'Sem descrição' }}</dd>

                    <dt class="col-sm-3">Preço</dt>
                    <dd class="col-sm-9">
                        <strong class="text-success fs-5">
                            R$ {{ number_format($produto->preco, 2, ',', '.') }}
                        </strong>
                    </dd>

                    <dt class="col-sm-3">Quantidade</dt>
                    <dd class="col-sm-9">
                        <span class="{{ $produto->quantidade < 5 ? 'badge bg-danger' : 'badge bg-success' }}">
                            {{ $produto->quantidade }} unidades
                        </span>
                    </dd>

                    <dt class="col-sm-3">Categoria</dt>
                    <dd class="col-sm-9">
                        <span class="badge bg-secondary fs-6">{{ $produto->categoria }}</span>
                    </dd>

                    <dt class="col-sm-3">Criado em</dt>
                    <dd class="col-sm-9">{{ $produto->created_at->format('d/m/Y H:i') }}</dd>

                    <dt class="col-sm-3">Atualizado em</dt>
                    <dd class="col-sm-9">{{ $produto->updated_at->format('d/m/Y H:i') }}</dd>
                </dl>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">
                    ✏️ Editar
                </a>
                <form action="{{ route('produtos.destroy', $produto->id) }}"
                      method="POST"
                      onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑 Deletar</button>
                </form>
                <a href="{{ route('produtos.index') }}" class="btn btn-secondary ms-auto">
                    ← Voltar para lista
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
