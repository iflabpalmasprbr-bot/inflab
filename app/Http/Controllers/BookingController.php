<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Armazena um novo agendamento.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'category' => 'required|string',
            'service' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'project' => 'required|string|max:1000',
        ]);

        // Verifica se já existe agendamento para a data e horário informados
        $exists = Booking::where('date', $validated['date'])
                         ->where('time', $validated['time'])
                         ->exists();

        if ($exists) {
            return back()
                ->withErrors(['time' => 'Este horário já está reservado.'])
                ->withInput();
        }

        // Cria o agendamento no banco de dados
        Booking::create($validated);

        // Retorna para a página anterior com mensagem de sucesso
        return back()->with('success', 'Agendamento realizado com sucesso!');
    }

    /**
     * Retorna os horários reservados para uso no calendário (formato JSON).
     */
    public function horariosReservados()
    {
        $bookings = Booking::select('date', 'time')->get();

        $eventos = $bookings->map(function ($booking) {
            return [
                'title' => 'Reservado',
                'start' => $booking->date . 'T' . $booking->time,
                'color' => 'red',
                'display' => 'background', // Indica no calendário como horário indisponível
            ];
        });

        return response()->json($eventos);
    }
}
