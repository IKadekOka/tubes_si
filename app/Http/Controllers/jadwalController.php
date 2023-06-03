<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\jadwal_pengiriman;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class jadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_supir');
    }
    public function index()
    {
        $data = jadwal_pengiriman::all();
        return view('Jadwal.jadwal',['jadwal'=>$data]);
    }
    public function create()
    {
        $kendaraan = Kendaraan::all();
        $array = [
            'kendaraan'=>$kendaraan,
        ];
        return view('Jadwal.create-jadwal',$array);
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'id_kendaraan'=>'required',
            'tanggal_pengiriman'=>'required',
        ]);
        jadwal_pengiriman::create($data);
        return redirect()->route('Jadwal.jadwal')
                        ->with('success','jadwal created seccessfully');
    }
    public function edit($id)
    {
        $data= jadwal_pengiriman::find($id);
        $kendaraan = Kendaraan::all();
        $array = [
            'kendaraan'=>$kendaraan,
            'jadwal_pengiriman'=>$data
        ];
        return view('Jadwal.edit-jadwal',$array);
    }
    public function update(Request $request,$id)
    {
        jadwal_pengiriman::where('id',$id)->update([
            'id_kendaraan'=>$request->id_kendaraan,
            'tanggal_pengiriman'=>$request->tanggal_pengiriman,
        ]);
        return redirect()->route('Jadwal.jadwal');
    }
    public function destroy($id)
    {
        $data= jadwal_pengiriman::find($id);
        $data->delete();
        return redirect()->route('Jadwal.jadwal');
    }
}
