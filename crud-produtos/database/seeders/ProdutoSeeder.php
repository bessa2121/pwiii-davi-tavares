<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $produtos = [
            [
                'nome' => 'Notebook Dell Inspiron',
                'descricao' => 'Intel Core i5, 8GB RAM, 256GB SSD',
                'preco' => 3499.90,
                'quantidade' => 15,
                'categoria' => 'Eletrônicos',
            ],
            [
                'nome' => 'Mouse Logitech MX Master',
                'descricao' => 'Mouse ergonômico sem fio',
                'preco' => 349.90,
                'quantidade' => 50,
                'categoria' => 'Eletrônicos',
            ],
            [
                'nome' => 'Clean Code',
                'descricao' => 'Robert C. Martin - Guia de boas práticas',
                'preco' => 89.90,
                'quantidade' => 30,
                'categoria' => 'Livros',
            ],
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}
