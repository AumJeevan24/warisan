<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WarisanData;

class WarisanDataController extends Controller
{
    /**
     * Get all items from the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warisanData = WarisanData::all();
        return view('warisan.index', ['warisanData' => $warisanData]);
    }

    /**
     * Update the specified item in the database.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $warisanData = WarisanData::find($id);

        if (!$warisanData) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $warisanData->kategori = $request->input('kategori');
        $warisanData->nama = $request->input('nama');
        $warisanData->desc = $request->input('desc');
        $warisanData->date = $request->input('date');

        // Handle file upload if needed
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $filename);
            $warisanData->gambar = $filename;
        }

        $warisanData->save();

        return redirect('/warisan_data')->with('success', 'Item updated successfully');
    }
}
