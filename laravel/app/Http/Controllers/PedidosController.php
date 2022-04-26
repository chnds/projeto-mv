<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\cliente;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clientes'] = cliente::all();

        $data['pedidos'] = pedido::join('clientes', 'clientes.id', '=', 'pedidos.cliente')
              ->get(['pedidos.*','clientes.nome']);

        return view('pedidos.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedidos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required',
            'produto' => 'required',
            'numero' => 'required',
            'quantidade' => 'required',
        ]);

        $pedido = new pedido;
        $pedido->cliente = $request->cliente;
        $pedido->produto = $request->produto;
        $pedido->numero = $request->numero;
        $pedido->status = 'Em andamento';
        $pedido->quantidade = $request->quantidade;
        $pedido->save();

        return redirect()->route('pedidos.index')->with('msg','O pedido foi cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = pedido::find($id);

        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = cliente::all();
        $pedido = pedido::find($id);
        
        return view('pedidos.edit', compact('pedido','clientes'));
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
            'cliente' => 'required',
            'produto' => 'required',
            'numero' => 'required',
            'quantidade' => 'required',
        ]);

        $data = [
            "cliente"=>$request->cliente,
            "produto"=>$request->produto,
            "numero"=>$request->numero,
            "quantidade"=>$request->quantidade,
        ];

        pedido::where('id', $id)->update($data);

        return redirect()->route('pedidos.index')
        ->with('success','Pedido atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cliente::destroy($id);
        return redirect()->route('pedidos.index')->with('msg','O pedido foi excluído com sucesso.');
    }
}
