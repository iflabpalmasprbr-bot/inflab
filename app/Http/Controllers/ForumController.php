<?php

namespace App\Http\Controllers;

use App\Models\Topico;
use App\Models\Conversa;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    // Lista todos os tópicos
    public function index()
    {
        $topicos = Topico::orderBy('created_at', 'desc')->get();
        return view('forum.index', compact('topicos'));
    }

    // Mostra o tópico e suas conversas
    public function show($id)
    {
        $topico = Topico::findOrFail($id);
        $conversas = $topico->conversas()->orderBy('created_at', 'asc')->get();
        return view('forum.show', compact('topico', 'conversas'));
    }

    // Criar novo tópico
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria' => 'required|string',
            'categoria_outro' => 'nullable|string|max:255'
        ]);

        $user = auth()->user();
        $admins = [
            'carolbrm265@gmail.com',
            'fernandes.junior@ifpr.edu.br',
            'jean.gentilini@ifpr.edu.br'
        ];

        $isAdmin = in_array(strtolower($user->email), $admins);

        // Limite: 1 tópico por semana para usuários comuns
        if (!$isAdmin) {

            $jaCriouEstaSemana = Topico::where("autor", $user->name)
                ->whereBetween("created_at", [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ])
                ->exists();

            if ($jaCriouEstaSemana) {
                return back()->with("error", "Você só pode criar 1 tópico por semana.");
            }
        }

        /*
        |--------------------------------------------------------------------------
        | TRATAMENTO DA CATEGORIA "OUTRO"
        |--------------------------------------------------------------------------
        | Se o usuário selecionar "Outro", usamos o texto digitado no campo
        | categoria_outro. Caso contrário, usamos a categoria selecionada.
        |--------------------------------------------------------------------------
        */

        $categoria = $request->categoria;

        if ($categoria === 'Outro') {
            $categoria = $request->categoria_outro; // usa o texto digitado
        }

        Topico::create([
            "titulo" => $request->titulo,
            "descricao" => $request->descricao,
            "autor" => $user->name,
            "categoria" => $categoria
        ]);

        return redirect()->route("forum.index")->with("success", "Tópico criado com sucesso!");
    }

    // Responder dentro do tópico
    public function responder(Request $request, $id)
    {
        $request->validate([
            'conteudo' => 'required|string'
        ]);

        Conversa::create([
            'topico_id' => $id,
            'autor' => auth()->user()->name,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->route('forum.show', $id);
    }

    // Deletar vários tópicos
    public function destroyMultiple(Request $request)
    {
        $request->validate([
            'topicos' => 'required|array'
        ]);

        Topico::whereIn('id', $request->topicos)->delete();

        return redirect()->route('forum.index')->with('success', 'Tópicos excluídos com sucesso!');
    }
}
