<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::where('status', 'ativo')->get();
        return view('eventos.index', ['eventos' => $eventos]);
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_evento' => 'required|date',
            'hora_evento' => 'nullable',
            'local' => 'nullable|string|max:255',
            'status' => 'required|in:ativo,cancelado,concluido',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,heic,webp|max:5120',
        ]);

        $imagemPath = null;
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('eventos', 'public');
        }

        Evento::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_evento' => $request->data_evento,
            'hora_evento' => $request->hora_evento,
            'local' => $request->local,
            'status' => $request->status,
            'imagem' => $imagemPath,
        ]);

        return redirect()->route('eventos.create')->with('success', 'Evento cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.show', compact('evento'));
    }

    public function edit(string $id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, string $id)
    {
        $evento = Evento::findOrFail($id);

        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_evento' => 'required|date',
            'hora_evento' => 'nullable',
            'local' => 'nullable|string|max:255',
            'status' => 'required|string|in:ativo,cancelado,concluido',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,heic,webp|max:5120',
        ]);

        $evento->titulo = $validatedData['titulo'];
        $evento->descricao = $validatedData['descricao'] ?? null;
        $evento->data_evento = $validatedData['data_evento'];
        $evento->hora_evento = $validatedData['hora_evento'] ?? null;
        $evento->local = $validatedData['local'] ?? null;
        $evento->status = $validatedData['status'];

        if ($request->hasFile('imagem')) {
            if ($evento->imagem && Storage::disk('public')->exists($evento->imagem)) {
                Storage::disk('public')->delete($evento->imagem);
            }
            $evento->imagem = $request->file('imagem')->store('eventos', 'public');
        }

        $evento->save();

        return redirect()->route('eventos.edit', $evento->id)
            ->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $evento = Evento::findOrFail($id);

        if ($evento->imagem && Storage::disk('public')->exists($evento->imagem)) {
            Storage::disk('public')->delete($evento->imagem);
        }

        $evento->delete();

        return redirect('/#eventos')->with('success', 'Evento excluído com sucesso!');
    }
}
