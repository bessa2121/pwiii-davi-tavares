@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>📋 Produtos</h1>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary">
        + Novo Produto
    </a>
</div>

@if($produtos->isEmpty())
    <div class="alert alert-info">
        Nenhum produto cadastrado ainda.
        <a href="{{ route('produtos.create') }}">Cadastre o primeiro!</a>
    </div>
@else
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>
                            <strong>{{ $produto->nome }}</strong>
                            @if($produto->descricao)
                                <br><small class="text-muted">{{ Str::limit($produto->descricao, 50) }}</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ $produto->categoria }}</span>
                        </td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>
                            <span class="{{ $produto->quantidade < 5 ? 'text-danger fw-bold' : '' }}">
                                {{ $produto->quantidade }}
                            </span>
                        </td>
                        <td>
                            {{-- Botão Ver --}}
                            <a href="{{ route('produtos.show', $produto->id) }}"
                               class="btn btn-sm btn-info text-white">
                                👁 Ver
                            </a>

                            {{-- Botão Editar --}}
                            <a href="{{ route('produtos.edit', $produto->id) }}"
                               class="btn btn-sm btn-warning">
                                ✏️ Editar
                            </a>

                            {{-- Botão Deletar --}}
                            {{-- Formulário porque DELETE não existe em HTML puro --}}
                            <form action="{{ route('produtos.destroy', $produto->id) }}"
                                  method="POST"
                                  style="display:inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    🗑 Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Links de paginação --}}
    <div class="mt-3">
        {{ $produtos->links() }}
    </div>
@endif
@endsection
