<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['produtos'] = produto::orderBy('id','desc')->paginate(5);
        return view('produtos.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Produto::create([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ]);

        return redirect()->route('produtos.index')
        ->with('success','Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = produto::find($id);

        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('produtos.edit', compact('produto'));
       
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
        $request->validate([
            'valor' => 'required',
            'descricao' => 'required',
        ]);

        $data = [
            "valor"=>$request->valor,
            "descricao"=>$request->descricao,
        ];

        produto::where('id', $id)->update($data);

        return redirect()->route('produtos.index')
        ->with('success','Produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Produto::where('id', $id)->delete();
       
        return redirect()->route('produtos.index')
        ->with('success','Produto excluído com sucesso');
    }

    public function excluirClientes(request $request)
    {
        foreach($request->valores as $valor){
            produto::destroy($valor);
        }

        return response()->json([
            'message' => 'Produtos excluídos com sucesso',
          ]);
          
    }
}
