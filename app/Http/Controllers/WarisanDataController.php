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
     * Get all items from the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $warisanData = WarisanData::all();
        return view('welcome', ['warisanData' => $warisanData]);
    }

    /**
     * display detail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $warisanData = WarisanData::find($id);

        if (!$warisanData) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return view('warisan.view', ['warisanData' => $warisanData]);
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
        ]);
    
        $warisanData->kategori = $validatedData['kategori'];
        $warisanData->nama = $validatedData['nama'];
        $warisanData->desc = $validatedData['desc'];
        $warisanData->date = $validatedData['date'];
    
        $warisanData->save();
    
        return redirect('/')->with('success', 'Item updated successfully');
    }
    

    /**
     * Delete the specified item from the database.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $warisanData = WarisanData::find($id);

        if(!$warisanData){
            return response()->json(['message' => 'Item not found'], 404);
        }

        $warisanData->delete();
        
        return redirect('/')->with('success', 'Item deleted successfully');
    }

    /**
     * Show the form for creating a new item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warisan.create');
    }

    /**
     * Store a newly created item in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required',
            'nama' => 'required',
            'desc' => 'required',
            'date' => 'required|date',
            'gambar' => 'required|url', // Update validation rule to expect a URL instead of an image file
        ]);
    
        $warisanData = new WarisanData();
        $warisanData->kategori = $validatedData['kategori'];
        $warisanData->nama = $validatedData['nama'];
        $warisanData->desc = $validatedData['desc'];
        $warisanData->date = $validatedData['date'];
        $warisanData->gambar = $validatedData['gambar']; // Store the image address directly
    
        $warisanData->save();
    
        return redirect('/')->with('success', 'Item created successfully');
    }
    
    

}
