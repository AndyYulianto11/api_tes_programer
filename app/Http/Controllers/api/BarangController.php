<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Barang;
use Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::all();
        $barang = Barang::get()->all();
        return view('barang.index', compact('data', 'barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),
            [
                'nama_produk' => 'required',
                'harga' => 'required|numeric',
                'kategori' => 'required',
                'status' => 'required'
            ],
            [
                'nama_produk.required' => 'Nama harus di isi',
                'harga.numeric' => 'Harga harus berupa inputan angka',
                'harga.required' => 'Harga harus di isi',
                'kategori.required' => 'Kategori harus di isi',
                'status.required' => 'Status harus di isi'
            ]
        );

        if($validation->fails())
        {
            $message = $validation->messages();
            return redirect()->route('barangs.create')->withErrors($message);
        }else{
            Barang::create([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
                'status' => $request->status
            ]);

            Alert::success('Berhasil !!', 'Data berhasil di Tambahkan');
            return redirect()->route('barangs.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     try{
    //         $barang = Barang::findOrFail($id);
    //         $response = [
    //             $barang
    //         ];
    //         return response()->json($response, Response::HTTP_OK);
    //     } catch (\Exception $e){
    //         return response()->json([
    //             'error' => 'No result'
    //         ], Response::HTTP_FORBIDDEN);
    //     }
    // }

    public function edit($id)
    {
        $data = Barang::where('id_produk', $id)->first();
        return view('barang.edit', compact('data'));
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
        $validation = Validator::make($request->all(),
            [
                'nama_produk' => 'required',
                'harga' => 'required|numeric',
                'kategori' => 'required',
                'status' => 'required'
            ],
            [
                'nama_produk.required' => 'Nama harus di isi',
                'harga.numeric' => 'Harga harus berupa inputan angka',
                'kategori.required' => 'Kategori harus di isi',
                'status.required' => 'Status harus di isi'
            ]
        );

        if($validation->fails())
        {
            $message = $validation->messages();
            return redirect()->route('barangs.edit', $id)->withErrors($message);
        }else{
            Barang::where('id_produk', $id)->update([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
                'status' => $request->status,
            ]);

            Alert::success('Berhasil !!', 'Data berhasil di Update');
            return redirect()->route('barangs.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::where('id_produk', $id);

        $barang->delete();
    }
}
