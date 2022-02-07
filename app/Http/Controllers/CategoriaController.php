<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = DB::table('categorias')
        ->orderBy('id', 'asc')
        ->where('user_id', \Auth::id())
        ->paginate(8);
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateCategorias  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategorias $request)
    {
        
        DB::table('categorias')->insert([
            'user_id'   => \Auth::id(),
            'nome'      => $request->nome,
            'url'       => $request->url,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorias = DB::table('categorias')->where('id', $id)->first();
        if (!$categorias)
        return redirect()->back();

        return view('admin.categorias.show', compact('categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = DB::table('categorias')->where('id', $id)->first();
        if (!$categorias)
        return redirect()->back();

        return view('admin.categorias.edit', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateCategorias  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategorias $request, $id)
    {
        DB::table('categorias')->where('id', $id)->update([
            'nome'      => $request->nome,
            'url'       => $request->url,
            'descricao' => $request->descricao,
        ]);
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categorias')->where('id', $id)->delete();

        return redirect()->route('categorias.index');

    }
    
    public function pesquisa(Request $request)
    {
        $pesquisa = $request->get('pesquisa');
        $categorias = DB::table('categorias')
                                        ->where('nome', $pesquisa)
                                        ->orWhere('url', $pesquisa)
                                        ->orWhere('descricao', 'like', "%{$pesquisa}%")
                                        ->paginate(5);
        return view('admin.categorias.index', compact('categorias', 'pesquisa'));
    }
   
}