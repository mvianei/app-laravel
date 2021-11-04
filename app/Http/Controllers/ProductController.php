<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller {

    public function index() {

        $products = ['Produto 1', 'Produto 2', 'Produto 3'];

        return $products;
    }
    
    public function show($id){
        return "Detalhes do produto: $id";
    }

    public function create(){
        return "Imprimindo o form de cadastro de um novo produto";
    }

    public function edit($id){
        return "Form para editar o produto: {$id}";
    }
    
    public function store(){
        return "Cadastrando um novo produto";
    }
    
    public function update($id){
        return "Editando um produto {$id}";
    }
    public function destroy($id){
        return "Deletando o produto {$id}";
    }
}
