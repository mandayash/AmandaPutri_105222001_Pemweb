<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorEmpat {

    public function getJson() {
        // Mengambil semua event dari database
        $events = Event::all();

        // Mengubah format data sesuai kebutuhan FullCalendar
        $formattedEvents = $events->map(function($event) {
            return [
                'id' => $event->id,
                'title' => $event->event,  // Nama event yang akan ditampilkan
                'start' => $event->start,  // Waktu mulai
                'end' => $event->end,      // Waktu selesai
                // Warna berbeda untuk event milik user yang sedang login
                'color' => $event->user_id === Auth::id() ? '#5e72e4' : '#808080'
            ];
        });

        return response()->json($formattedEvents);
    }
}

?>
