<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        //        dd($request);
        $this->request = $request;
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
        return view('admin.pages.produtos.index',[
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProdutoRequest $request)
    {

        $data = $request->only('nome','descricao','preco');

        Produto::create($data);

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

        if (!$produto = Produto::find($id)){
            return redirect()->back();
        }

        return view('admin.pages.produtos.show',[
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
        return view('admin.pages.produtos.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd("Editando produto { $id }");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
