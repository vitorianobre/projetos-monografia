<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AtividadeController extends Controller
{
    public function index() {
        $submetidas = Atividade::where('situacao', 'Em análise')->get();
        $integralizadas = Atividade::where('situacao', 'Integralizada')->get();
        $indeferidas = Atividade::where('situacao', 'Indeferida')->get();

        return view('index', compact('submetidas', 'integralizadas', 'indeferidas'));
    }


    public function create() {
        return view('cadastrar-atividade');
    }

    public function store(Request $request) {
        // Verificar se o arquivo foi enviado
        if ($request->hasFile('anexo')) {
            $anexoPath = $request->file('anexo')->store('anexos', 'public');
        } else {
            return redirect()->back()->withErrors(['anexo' => 'O arquivo deve ser enviado.']);
        }

        $atividade = Atividade::create([
            'acao_extensao' => $request->input('acao_extensao'),
            'tipo' => $request->input('tipo-curso') ?? $request->input('tipo-evento'),
            'horas' => $request->input('horas'),
            'anexo' => $anexoPath
        ]);

        return redirect('/')->with('success', 'Atividade cadastrada com sucesso!');
    }

    public function show($id) {
        $atividade = Atividade::findOrFail($id);
        return view('exibir-atividade', compact('atividade'));
    }

    public function download($id) {
        $atividade = Atividade::findOrFail($id);

        if ($atividade->anexo) {
            $filePath = storage_path('app/public/' . $atividade->anexo);

            // Verifica se o arquivo existe
            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return redirect()->back()->with('error', 'Anexo não encontrado.');
            }
        }

        return redirect()->back()->with('error', 'Anexo não disponível.');
    }
}
