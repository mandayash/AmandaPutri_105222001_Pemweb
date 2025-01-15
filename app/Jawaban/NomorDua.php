<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorDua {
    public function submit(Request $request) {
        // Validasi input
        $validatedData = $request->validate([
            'event' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start'
        ]);

        // Simpan ke database
        $event = Event::create([
            'event' => $request->event,
            'start' => $request->start,
            'end' => $request->end,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('event.home')
                        ->with('message', ['Jadwal berhasil ditambahkan', 'success']);
    }
}

?>
