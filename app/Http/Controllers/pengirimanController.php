<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pemesanan;
use App\Models\Pengiriman;
use App\Models\jadwal_pengiriman;
use Illuminate\Http\Request;

class pengirimanController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_supir');
    }
    public function index()
    {
        return view('Pengiriman.pengirim',[
            'pengiriman'=> Pengiriman::all()
        ]);
    }
    public function create()
    {
        $pemesanan = pemesanan::all();
        $jadwal = jadwal_pengiriman::all();
        $array = [
            'pemesanan'=>$pemesanan,
            'jadwal'=>$jadwal,
        ];

        return view('Pengiriman.create-pengiriman',$array);
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'id_pemesanan'=>'required',
            'id_jadwal'=>'required',
        ]);
        Pengiriman::create($data);
        return redirect()->route('Pengiriman.pengirim')
                        ->with('success','pengiriman created seccessfully');
    }
    public function edit($id)
    {
        $data= Pengiriman::find($id);
        $pemesanan = pemesanan::all();
        $jadwal = jadwal_pengiriman::all();
        $array = [
            'pemesanan'=>$pemesanan,
            'jadwal'=>$jadwal,
            'pengiriman'=>$data
        ];
        return view('Pengiriman.edit-pengiriman',$array);
    }
    public function update(Request $request,$id)    
    {
        Pengiriman::where('id',$id)->update([
            'id_pemesanan'=>$request->id_pemesanan,
            'id_jadwal'=>$request->id_jadwal,
        ]);
        return redirect()->route('Pengiriman.pengirim');
    }
    public function destroy($id)
    {
        $data= Pengiriman::find($id);
        $data->delete();
        return redirect()->route('Pengiriman.pengirim');
    }
}
