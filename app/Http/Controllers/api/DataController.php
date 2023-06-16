<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Barang;
use Alert;

class DataController extends Controller
{
    public function index()
    {
        $client = new Client();
        $username = "tesprogrammer170623C03";
        $password = md5('bisacoding-17-06-23');
        $response = $client->request('POST', 'https://recruitment.fastprint.co.id/tes/api_tes_programmer', [
            'form_params' => [
                'username' => $username,
                'password' => $password
            ],
            'header' => [
                'Content-type' => 'application/x-www-form-urlencoded request',
            ],
        ]);

        $res = $response->getBody();

        $data = json_decode($res, true);
        foreach($data['data'] as $d => $value){
            $barang = Barang::create([
                'id_produk' => $value['id_produk'],
                'nama_produk' => $value['nama_produk'],
                'harga' => $value['harga'],
                'kategori' => $value['kategori'],
                'status' => $value['status']
            ]);
        }
        Alert::success('Berhasil !!', 'Data berhasil di Ambil');
        return redirect()->route('barangs.index');
    }

    public function show()
    {
        $data = Barang::where(['status' => 'bisa dijual'])->orWhere('status', 'bisadijual')->get()->all();
        return view('barang.show', compact('data'));
    }
}
