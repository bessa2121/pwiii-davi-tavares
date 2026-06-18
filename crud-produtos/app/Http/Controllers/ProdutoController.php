<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * INDEX — Lista todos os registros
     * Rota: GET /produtos
     * View: produtos/index
     */
    public function index()
    {
        // Busca todos os produtos, ordenados pelo mais recente
        // paginate(10) = 10 por página, com paginação automática!
        $produtos = Produto::orderBy('created_at', 'desc')->paginate(10);

        // Passa os dados para a View
        // compact('produtos') é igual a ['produtos' => $produtos]
        return view('produtos.index', compact('produtos'));
    }

    /**
     * CREATE — Exibe o formulário de criação
     * Rota: GET /produtos/create
     * View: produtos/create
     * Não precisa buscar nada do banco, só mostra o formulário vazio
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * STORE — Salva o novo registro no banco
     * Rota: POST /produtos
     * Recebe os dados do formulário via $request
     */
    public function store(Request $request)
    {
        // VALIDAÇÃO: Garante que os dados estão corretos antes de salvar
        // Se falhar, o Laravel redireciona de volta com os erros automaticamente
        $request->validate([
            'nome'       => 'required|string|max:255',
            'descricao'  => 'nullable|string',
            'preco'      => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
            'categoria'  => 'required|string|max:255',
        ]);

        // Cria o produto com todos os dados validados de uma vez
        Produto::create($request->all());

        // Redireciona para a listagem com uma mensagem de sucesso
        // 'with' envia dados para a sessão (flash message)
        return redirect()->route('produtos.index')
                         ->with('sucesso', 'Produto criado com sucesso!');
    }

    /**
     * SHOW — Exibe os detalhes de um registro específico
     * Rota: GET /produtos/{id}
     * O Laravel já injeta o objeto Produto automaticamente (Route Model Binding)
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    /**
     * EDIT — Exibe o formulário de edição preenchido
     * Rota: GET /produtos/{id}/edit
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    /**
     * UPDATE — Salva as alterações no banco
     * Rota: PUT/PATCH /produtos/{id}
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome'       => 'required|string|max:255',
            'descricao'  => 'nullable|string',
            'preco'      => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
            'categoria'  => 'required|string|max:255',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')
                         ->with('sucesso', 'Produto atualizado com sucesso!');
    }

    /**
     * DESTROY — Remove o registro do banco
     * Rota: DELETE /produtos/{id}
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
                         ->with('sucesso', 'Produto removido com sucesso!');
    }
}
