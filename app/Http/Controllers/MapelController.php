<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        return response()->json(Mapel::all());
    }

    public function store(Request $request)
    {
        $mapel = Mapel::create($request->all());

        return response()->json($mapel, 201);
    }

    public function show(string $id)
    {
        return response()->json(Mapel::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $mapel = Mapel::findOrFail($id);

        $mapel->update($request->all());

        return response()->json($mapel);
    }

    public function destroy(string $id)
    {
        Mapel::destroy($id);

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}