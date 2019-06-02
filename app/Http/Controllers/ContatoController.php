<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Contato\Contato;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contato = new Contato;
        return view('create')->with('contato', $contato);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome_vendedor'=> 'required',
            'nome_contato'=> 'required',
            'email'=> 'required',
            'telefone'=> 'required',
        ]);


        // $newDataContato = strtotime($request->data_contato);
        // $newDataValidade = strtotime($request->data_validade);

        // $request->data_contato = date('Y-m-d', $newDataContato);
        // $request->data_validade = date('Y-m-d', $newDataValidade);

        $validade = explode('/', $request->data_validade);
        $validade = array_reverse($validade);
        $request->data_validade = implode('-', $validade);
        $request->data_validade = strtotime($request->data_validade);

        $contato = explode('/', $request->data_contato);
        $contato = array_reverse($contato);
        $request->data_contato = implode('-', $contato);
        $request->data_contato = strtotime($request->data_contato);

        // return($request->data_validade);

        $contato = new Contato;
        $contato->nome_vendedor = $request->nome_vendedor;
        $contato->empresa       = $request->empresa;
        $contato->nome_contato  = $request->nome_contato;
        $contato->email         = $request->email;
        $contato->telefone      = $request->telefone;
        $contato->data_contato  = $request->data_contato;
        $contato->data_validade = $request->data_validade;
        $contato->save();

        return route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato = Contato::find($id);
        return view('create')->with('contato', $contato);
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
        $this->validate($request, [
            'nome_vendedor'=> 'required',
            'nome_contato'=> 'required',
            'email'=> 'required',
            'telefone'=> 'required',
        ]);

        $contato = Contato::findOrFail($id);
        $contato->nome_vendedor = $request->nome_vendedor;
        $contato->empresa       = $request->empresa;
        $contato->nome_contato  = $request->nome_contato;
        $contato->email         = $request->email;
        $contato->telefone      = $request->telefone;
        $contato->data_contato  = $request->data_contato;
        $contato->data_validade = $request->data_validade;
        $contato->save();

        return route('index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato = Contato::findOrFail($id);
        $contato->delete();

        return route('index');
    }
}
