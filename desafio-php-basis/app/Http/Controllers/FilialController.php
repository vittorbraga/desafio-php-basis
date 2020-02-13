<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filial;

class FilialController extends Controller
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
        $filiais = Filial::all();

        return view('filial.index', compact('filiais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filial.create');
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
            'endereco'=>'required',
            'bairro'=>'required',
            'cidade'=>'required',
            'uf'=>'required',
            'inscricao_estadual'=>'required',
            'cnpj'=>'required'
        ]);

        $filial = new Filial([
            'nome' => $request->get('nome'),
            'endereco' => $request->get('endereco'),
            'bairro' => $request->get('bairro'),
            'cidade' => $request->get('cidade'),
            'uf' => $request->get('uf'),
            'inscricao_estadual' => $request->get('inscricao_estadual'),
            'cnpj' => $request->get('cnpj')
        ]);
        $filial->save();
        return redirect('/filial')->with('success', 'Filial criada!');
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
        $filial = Filial::find($id);
        return view('filial.edit', compact('filial'));
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
            'endereco'=>'required',
            'bairro'=>'required',
            'cidade'=>'required',
            'uf'=>'required',
            'inscricao_estadual'=>'required',
            'cnpj'=>'required'
        ]);

        $filial = Filial::find($id);
        $filial->nome =  $request->get('nome');
        $filial->endereco = $request->get('endereco');
        $filial->bairro = $request->get('bairro');
        $filial->cidade = $request->get('cidade');
        $filial->uf = $request->get('uf');
        $filial->inscricao_estadual = $request->get('inscricao_estadual');
        $filial->cnpj = $request->get('cnpj');
        $filial->save();

        return redirect('/filial')->with('success', 'Filial atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filial = Filial::find($id);
        $filial->delete();

        return redirect('/filial')->with('success', 'Filial excluída!');
    }
}
