<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Filial;
use App\Ufs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FuncionarioController extends Controller
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
        $users = User::all();

        return view('funcionario.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filiais = Filial::all();
        $ufs = Ufs::getUfs();
        $password = Str::random(6);
        return view('funcionario.create', compact(['filiais', 'ufs', 'password']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['data_nascimento'] = date('Y-m-d', strtotime(str_replace("/", "-", $request['data_nascimento'])));

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'data_nascimento' => ['required', 'date'],
            'sexo' => ['required'],
            'cpf' => ['required', 'string', 'max:11', 'min:11', 'unique:users'],
            'endereco' => ['required', 'string'],
            'bairro' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'uf' => ['required', 'string'],
            'cargo' => ['required', 'string'],
            'salario' => ['required'],
            'situacao' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'id_filial' => ['required'],
        ]);

        $user = new User([
            'name' => $request['name'],
            'data_nascimento' => $request['data_nascimento'],
            'sexo' => $request['sexo'],
            'cpf' => $request['cpf'],
            'endereco' => $request['endereco'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
            'cargo' => $request['cargo'],
            'salario' => $request['salario'],
            'situacao' => $request['situacao'],
            'password' => Hash::make($request['password']),
            'id_filial' => $request['id_filial'],

        ]);
        $user->save();
        return redirect('/funcionario')->with('success', 'Funcionário criado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $filiais = Filial::all();
        $ufs = Ufs::getUfs();
        $show = array(
            "show" => true
        );
        return view('funcionario.edit', compact(['user', 'filiais', 'ufs', 'show']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $filiais = Filial::all();
        $ufs = Ufs::getUfs();
        return view('funcionario.edit', compact(['user', 'filiais', 'ufs']));
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
        $request['data_nascimento'] = date('Y-m-d', strtotime(str_replace("/", "-", $request['data_nascimento'])));
        $data = [
            'name' => ['required', 'string', 'max:255'],
            'data_nascimento' => ['required', 'date'],
            'sexo' => ['required'],
            'endereco' => ['required', 'string'],
            'bairro' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'uf' => ['required', 'string'],
            'cargo' => ['required', 'string'],
            'salario' => ['required'],
            'situacao' => ['required'],
            'id_filial' => ['required']
        ];
        if(strlen($request['password']) > 0) {
            $data['password'] = ['required', 'string', 'min:6', 'confirmed'];
        }
        $request->validate($data);

        $user = User::find($id);
        $user->name = $request['name'];
        $user->data_nascimento = $request['data_nascimento'];
        $user->sexo = $request['sexo'];
        $user->endereco = $request['endereco'];
        $user->bairro = $request['bairro'];
        $user->cidade = $request['cidade'];
        $user->uf = $request['uf'];
        $user->cargo = $request['cargo'];
        $user->salario = $request['salario'];
        $user->situacao = $request['situacao'];
        if(strlen($request['password']) > 0) {
            $user->password = Hash::make($request['password']);
        }
        $user->id_filial = $request['id_filial'];
        $user->save();
        return redirect('/funcionario')->with('success', 'Funcionário atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/funcionario')->with('success', 'Funcionário excluído!');
    }
}
