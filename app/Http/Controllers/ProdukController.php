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
        // $validated = $request->validate([
        //     'namaproduk' => 'required',
        //     'deskripsi' => 'required',
        //     'gambar' => 'required',
        //     'harga' => 'required',
        // ]);
        // $data = new Produkdata;
        // $data->namaproduk = $request->namaproduk;
        // $data->deskripsi = $request->deskripsi;
        // $data->gambar = $request->gambar;
        // $data->harga = $request->harga;
        // $data->save();
        // return;
        $validator = Validator::make($request->all(), [
            'namaproduk' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'harga' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
            );
        }
        try {
            $data = Produkdata::create($request->all());
            return response()->json($data);
        } catch (QueryException $e) {
            return response()->json([
                'PESAN' => "GAGAL" . $e->errorInfo
            ]);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
