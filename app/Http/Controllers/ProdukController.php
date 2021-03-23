<?php

namespace App\Http\Controllers;

use App\Models\Produkdata;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Voyager;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataproduk = Produkdata::get();
        $response = $dataproduk;

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'namaproduk' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['required'],
            'harga' => ['required', 'int'],
        ]);
        $file = $request->file('gambar');
        $name = 'produkdatas/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $name);
        $data['gambar'] = $name;
        $user = Produkdata::create($data);
        return response()->json($user);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataproduk = Produkdata::findOrFail($id);
        $response = $dataproduk;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Produkdata::findOrFail($id);
        $data->namaproduk = $request->namaproduk;
        $data->deskripsi = $request->deskripsi;
        $data->gambar = $request->gambar;
        $data->harga = $request->harga;
        $data->save();

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produkdata::findOrFail($id);
        $data->delete();
        return response()->json($data);
    }
}
