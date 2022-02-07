<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutos;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categorias;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

class ProdutoController extends Controller
{
    protected $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $produtos = $this->produto->get();
        $produtos = Produto::paginate(8);
        return view('admin.produtos.index', compact('produtos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorias::all();

        return view('admin.produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProdutos $request)
    {   
        $categorias = Categorias::find($request->categorias_id);
        $produtos = $categorias->produtos()->create($request->all());
        return redirect()->route('produtos.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtos = $this->produto->with('categorias')->where('id', $id)->first();
        if (!$produtos)
        return redirect()->back();

        return view('admin.produtos.show', compact('produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categorias::all();
        $produtos = DB::table('produtos')->where('id', $id)->first();
        return view('admin.produtos.edit', compact('produtos', 'categorias'));
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
        
      $produto = $this->produto->find($id);

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
        DB::table('produtos')->where('id', $id)->delete();

        return redirect()->route('produtos.index');

    }
}
