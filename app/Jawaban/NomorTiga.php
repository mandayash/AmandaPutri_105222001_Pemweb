<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorTiga {

	public function getData () {
		// Tuliskan code mengambil semua data jadwal user, simpan di variabel $data
		$data = Event::where('user_id', Auth::id())
                    ->orderBy('start', 'desc')
                    ->get();
        return $data;
    }

	public function getSelectedData (Request $request) {

		// Tuliskan code mengambil 1 data jadwal user dengan id jadwal, simpan di variabel $data
		$data = Event::where('id', $request->id)
                    ->where('user_id', Auth::id())
                    ->first();
        return response()->json($data);
    }

	public function update (Request $request) {

		// Tuliskan code mengupdate 1 jadwal
		try {
            // Mencari jadwal yang akan diupdate
            $event = Event::where('id', $request->id)
                         ->where('user_id', Auth::id())
                         ->first();

            if ($event) {
                // Update data jadwal
                $event->update([
                    'event' => $request->event,
                    'start' => $request->start,
                    'end' => $request->end
                ]);
                return redirect()->route('event.home')
                               ->with('message', ['Jadwal berhasil diperbarui', 'success']);
            }
            return redirect()->route('event.home')
                           ->with('message', ['Jadwal tidak ditemukan', 'danger']);
        } catch (\Exception $e) {
            return redirect()->route('event.home')
                           ->with('message', ['Gagal memperbarui jadwal', 'danger']);
        }
    }

	public function delete (Request $request) {

		// Tuliskan code menghapus 1 jadwal
		try {
            // Mencari dan menghapus jadwal
            $event = Event::where('id', $request->id)
                         ->where('user_id', Auth::id())
                         ->first();

            if ($event) {
                $event->delete();
                return redirect()->route('event.home')
                               ->with('message', ['Jadwal berhasil dihapus', 'success']);
            }
            return redirect()->route('event.home')
                           ->with('message', ['Jadwal tidak ditemukan', 'danger']);
        } catch (\Exception $e) {
            return redirect()->route('event.home')
                           ->with('message', ['Gagal menghapus jadwal', 'danger']);
        }
    }
}


?>
