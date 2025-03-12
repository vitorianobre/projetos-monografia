<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contato;

class ContatosController extends Controller
{
    public function index()
    {
        $contatos = Contato::all();

        return view('listar-contatos', ['contatos'=>$contatos]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $nomeContato = $request->input(key:'nome');
        $telefoneContato = $request->input(key: 'telefone');
        $contato = new Contato();
        $contato->nome = $nomeContato;
        $contato->telefone = $telefoneContato;
        $contato->save();

        return redirect(to:'/contatos');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $contato = Contato::findOrFail($id);
        return view('editar-contato', compact('contato'));
    }

    public function update(Request $request, $id)
    {
        $contato = Contato::findOrFail($id);

        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->save();

        return redirect('/contatos');
    }

    public function destroy($id)
    {
        $contato = Contato::findOrFail($id);
        $contato->delete();

        return redirect('/contatos');
    }
}
