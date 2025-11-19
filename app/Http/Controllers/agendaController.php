<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // GET: Semua data agenda
    public function index()
    {
        return response()->json(Agenda::all());
    }

    // POST: Tambah agenda
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'is_done' => 'boolean'
        ]);

        $agenda = Agenda::create([
            'judul' => $validated['judul'],
            'keterangan' => $validated['keterangan'] ?? null,
            'is_done' => $validated['is_done'] ?? false
        ]);

        return response()->json($agenda, 201);
    }

    // GET: Detail 1 agenda
    public function show($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($agenda);
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        if (!$agenda) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

        // Validasi
        $validated = $request->validate([
            'judul' => 'string|nullable',
            'keterangan' => 'string|nullable',
            'is_done' => 'nullable'
    ]);

        // Update field
        if ($request->has('judul')) {
            $agenda->judul = $request->judul;
   }

        if ($request->has('keterangan')) {
            $agenda->keterangan = $request->keterangan;
    }

        if ($request->has('is_done')) {
            $agenda->is_done = filter_var($request->is_done, FILTER_VALIDATE_BOOLEAN);
            // ini memaksa "true", "1", true menjadi TRUE
    }

        $agenda->save();

        return response()->json($agenda);
    }


    // DELETE: Hapus agenda
    public function destroy($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $agenda->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
