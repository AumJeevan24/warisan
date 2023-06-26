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
     * Show the form for updating the specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warisanData = WarisanData::find($id);

        if (!$warisanData) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return view('warisan.edit', ['warisanData' => $warisanData]);
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

        $validatedData = $request->validate([
            'kategori' => 'required',
            'nama' => 'required',
            'desc' => 'required',
            'date' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $warisanData->kategori = $validatedData['kategori'];
        $warisanData->nama = $validatedData['nama'];
        $warisanData->desc = $validatedData['desc'];
        $warisanData->date = $validatedData['date'];

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
