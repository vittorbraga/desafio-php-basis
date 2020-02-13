<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Automovel;
use App\Filial;

class AutomovelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $automoveis = Automovel::all();

        return view('automovel.index', compact('automoveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filiais = Filial::all();
        return view('automovel.create', compact('filiais'));
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
            'nome'=>'required',
            'ano'=>'required',
            'modelo'=>'required',
            'cor'=>'required',
            'numero_chassi'=>'required',
            'categoria'=>'required',
            'id_filial'=>'required'
        ]);

        $automovel = new Automovel([
            'nome' => $request->get('nome'),
            'ano' => $request->get('ano'),
            'modelo' => $request->get('modelo'),
            'cor' => $request->get('cor'),
            'numero_chassi' => $request->get('numero_chassi'),
            'categoria' => $request->get('categoria'),
            'id_filial' => $request->get('id_filial')
        ]);
        $automovel->save();
        return redirect('/automovel')->with('success', 'Automóvel criado!');
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
        $automovel = Automovel::find($id);
        $filiais = Filial::all();
        return view('automovel.edit', compact(['automovel', 'filiais']));
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
            'nome'=>'required',
            'ano'=>'required',
            'modelo'=>'required',
            'cor'=>'required',
            'numero_chassi'=>'required',
            'categoria'=>'required',
            'id_filial'=>'required'
        ]);

        $automovel = Automovel::find($id);
        $automovel->nome =  $request->get('nome');
        $automovel->ano = $request->get('ano');
        $automovel->modelo = $request->get('modelo');
        $automovel->cor = $request->get('cor');
        $automovel->numero_chassi = $request->get('numero_chassi');
        $automovel->categoria = $request->get('categoria');
        $automovel->id_filial = $request->get('id_filial');
        $automovel->save();

        return redirect('/automovel')->with('success', 'Automóvel atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $automovel = Automovel::find($id);
        $automovel->delete();

        return redirect('/automovel')->with('success', 'Automóvel excluído!');
    }
}
