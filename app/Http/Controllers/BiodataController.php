<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Exception;
use App\Http\Controllers\NotFoundException;
use App\Biodatum;
use Illuminate\Http\Request;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Voyager;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodatum::get();
        $response = $biodata;

        return response()->json($response);
    }


    public function show($id)
    {
        $dataproduk = Biodatum::findOrFail($id);
        $response = $dataproduk;

        return response()->json($response);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HttpRequest $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'picture' => ['required']
        ]);
        // $file = $request->file('picture');
        // $name = 'biodata/March2021/' . uniqid() . '.' . $file->extension();
        // $file->storePubliclyAs('public', $name);
        // $data['picture'] = $name;
        $user = Biodatum::create($data);
        return response()->json($data);
        // if ($request->hasFile('picture')) {
        //     $original_filename = $request->file('picture')->getClientOriginalName();
        //     $original_filename_arr = explode('.', $original_filename);
        //     $file_ext = end($original_filename_arr);
        //     $destination_path = './uploads/files/';
        //     $picture_name = 'C-' . time() . '.' . $file_ext;

        //     if ($request->file('picture')->move($destination_path, $picture_name)) {

        //         $uploadPath = '/uploads/files/' . $picture_name;


        //         return response()->json(['path' => $uploadPath, 'message' => 'File has been Successfully Uploaded'], 201);
        //     } else {
        //         return response()->json('Cannot upload file');
        //     }
        // }
    }
    public function update(Request $request, $id)
    {
        // $file = $request->file('gambar');
        // $name = 'produkdatas/' . uniqid() . '.' . $file->extension();
        // $file->storePubliclyAs('public', $name);
        // $data = Biodatum::findOrFail($id);
        // $data->namaproduk = $request->namaproduk;
        // $data->deskripsi = $request->deskripsi;
        // $data->gambar = $name;
        // $data->harga = $request->harga;
        // $data->save();
        $data = Biodatum::findOrFail($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->save();

        return response()->json($data);
    }
    public function detail($id)
    {
        $dataproduk = Biodatum::findOrFail($id);
        $response = $dataproduk;

        return response()->json($response);
    }
}
