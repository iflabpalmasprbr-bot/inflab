<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;

class AgendamentoController extends Controller
{
    /**
     * Exibe todos os agendamentos.
     * 
     * 
     */
    public function excluir(Request $request)
    {
        $ids = $request->ids ?? [];
        try {
            Agendamento::whereIn('id', $ids)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function index(Request $request)
    {
        $query = Agendamento::query();

        // Filtra apenas se os campos estiverem preenchidos
        if ($request->filled('data_inicio') && $request->filled('data_fim')) {
            $query->whereBetween('data_desejada', [$request->data_inicio, $request->data_fim]);
        } else {
            // Se nenhum intervalo for fornecido, mostra a partir de hoje
            $query->where('data_desejada', '>=', now()->format('Y-m-d'));
        }

        $agendamentos = $query->orderBy('id', 'desc')->get();

        return view('agendamento.index', compact('agendamentos'));
    }

    /**
     * Exibe o formulário de criação de agendamento.
     */
    public function create()
    {
        return view('agendamento.create');
    }

    /**
     * Armazena um novo agendamento no banco.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:20',
            'category' => 'required|string',
            'service' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'project' => 'required|string',
        ]);

        Agendamento::create([
            'nome' => $validated['name'],
            'email' => $validated['email'],
            'telefone' => $validated['phone'],
            'categoria' => $validated['category'],
            'servico' => $validated['service'],
            'data_desejada' => $validated['date'],
            'horario_desejado' => $validated['time'],
            'descricao_projeto' => $validated['project'],
            'status' => $request->status, // valor padrão inicial
            'comentario' => $request->comentario, // valor padrão inicial
        ]);

        return redirect()->route('home')->with('success', 'Agendamento realizado com sucesso!');
    }

    /**
     * Exibe o formulário para edição de um agendamento.
     */
    public function edit(string $id)
    {
        $agendamento = Agendamento::findOrFail($id);
        return view('agendamento.edit', compact('agendamento'));
    }

    /**
     * Atualiza um agendamento existente.
     */
    public function update(Request $request, string $id)
    {
        $agendamento = Agendamento::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:20',
            'category' => 'required|string',
            'service' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'project' => 'required|string',
        ]);

        $agendamento->update([
            'nome' => $validated['name'],
            'email' => $validated['email'],
            'telefone' => $validated['phone'],
            'categoria' => $validated['category'],
            'servico' => $validated['service'],
            'data_desejada' => $validated['date'],
            'horario_desejado' => $validated['time'],
            'descricao_projeto' => $validated['project'],
        ]);

        return redirect()->route('home')->with('success', 'Agendamento atualizado com sucesso!');
    }

    /**
     * Remove agendamento(s) (individual ou múltiplo via array de ids).
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('ids'); // pode ser array ou único id

        if (!$ids) {
            return response()->json(['success' => false, 'message' => 'Nenhum ID fornecido'], 400);
        }

        if (!is_array($ids)) {
            $ids = [$ids];
        }

        $deleted = Agendamento::whereIn('id', $ids)->delete();

        if ($deleted) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Erro ao excluir'], 404);
    }

    /**
     * Método extra para funcionalidades futuras.
     */
    public function livre()
    {
        // Pode implementar algo futuro aqui
    }

    public function aceitar(Request $request)
    {

        $ids = $request->ids ?? [];

        foreach ($ids as $id) {
            $agendamento = Agendamento::find($id);
            if ($agendamento) {
                $agendamento->status = 'Aceito'; // atualiza o status
                $agendamento->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function recusar(Request $request)
    {
        $ids = $request->ids ?? [];

        foreach ($ids as $id) {
            $agendamento = Agendamento::find($id);
            if ($agendamento) {
                $agendamento->status = 'Recusado'; // atualiza o status
                $agendamento->save();
            }
        }

        return response()->json(['success' => true]);
    }
    public function agenda_semana()
    {
        $hoje = now();

        // sempre começa na segunda-feira da semana atual
        $segunda = $hoje->copy()->startOfWeek(\Carbon\Carbon::MONDAY);
        $domingo = $hoje->copy()->endOfWeek(\Carbon\Carbon::FRIDAY); // só dias úteis

        $agendamentos = Agendamento::whereBetween('data_desejada', [
            $segunda->toDateString(),
            $domingo->toDateString()
        ])
            ->whereRaw('LOWER(TRIM(status)) = ?', ['aceito'])
            ->get();

        return response()->json($agendamentos);
    }
    public function update_comentario(Request $request)
    {
        // Busca o agendamento pelo ID enviado na requisição
        $agendamento = Agendamento::find($request->id);

        if ($agendamento) {
            // Salva o comentário corrigido
            $agendamento->comentario = $request->comentario;
            $agendamento->save();

            // Redireciona de volta com uma mensagem de sucesso
            return back()->with('success', 'Comentário atualizado com sucesso!');
        }

        // Se não encontrar, volta com uma mensagem de erro
        return back()->with('error', 'Agendamento não encontrado.');
    }
}
