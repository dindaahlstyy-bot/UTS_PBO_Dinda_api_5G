<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        return response()->json(Agenda::all());
    }

    public function show($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($agenda);
    }

    public function store(Request $request)
    {
        $agenda = Agenda::create([
            'keterangan' => $request->keterangan
        ]);

        return response()->json($agenda, 201);
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $agenda->update([
            'keterangan' => $request->keterangan
        ]);

        return response()->json($agenda);
    }

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