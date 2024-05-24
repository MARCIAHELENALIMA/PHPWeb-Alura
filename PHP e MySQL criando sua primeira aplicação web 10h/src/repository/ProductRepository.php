<?php

namespace repository;

use model\Produto;
use PDO;

class ProductRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados): Produto
    {
        return new Produto($dados['id'],
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['imagem'],
            $dados['preco']);
    }

    public function opcoesCafe(): array
    {
        $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $statement = $this->pdo->query($sql1);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($cafe) {
            return $this->formarObjeto($cafe);
        }, $produtosCafe);
    }

    public function opcoesAlmoco(): array
    {
        $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $statement = $this->pdo->query($sql2);
        $produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($almoco) {
            return $this->formarObjeto($almoco);
        }, $produtosAlmoco);
    }
}