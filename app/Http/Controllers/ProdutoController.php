<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Produto $produto)
    {
        //        dd($request);
        $this->request = $request;

        $this->repository = $produto;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $teste = 123;
        $texto = '<b>teste</b>';
        $teste2 = 'Olá';
        $teste3 = ['opa'];
        $produtos = ['TV', 'Geladeira', 'Forno', 'Sofá'];

        return view('admin.pages.produtos.index', compact('teste', 'texto', 'teste2', 'teste3', 'produtos'));*/

        $produtos = Produto::paginate();
        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.produtos.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\StoreUpdateProdutoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProdutoRequest $request)
    {

        $data = $request->only('nome', 'descricao', 'preco');

        if ($request->hasFile('imagem') && $request->imagem->isValid())
        {
            $imagePath = $request->imagem->store('produtos');

            $data['imagem'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('produtos.index');

        // if ($request->file('photo')->isValid()){
        // $nameFile = $request->file('photo')->getClientOriginalName();
        // dd($nameFile);
        // dd($request->file('photo')->storeAs('produtos',$nameFile));
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$produto = Produto::where('id',$id)->first();

        if (!$produto = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.produtos.show', [
            'produto' => $produto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$produto = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request\StoreUpdateProdutoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProdutoRequest $request, $id)
    {
        if (!$produto = $this->repository->find($id)) {
            return redirect()->back();
        }

        $produto->update($request->all());

        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd("Deletando o produto $id");
        $produto = $this->repository->where('id', $id)->first();
        if (!$produto) {
            return redirect()->back();
        }

        $produto->delete();

        return redirect()->route('produtos.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $produtos = $this->repository->search($request->filter);

        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
            'filters' => $filters,
        ]);


    }
}
