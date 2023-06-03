<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pemesanan;
use App\Models\barang;
use App\Models\Outlet;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class pemesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_customer');
    }
    public function index()
    {
        $data = pemesanan::all();
        return view('Pemesanan.pemesanan',['pemesanan'=>$data]);
    }
    public function create()
    {
        $outlet = outlet::all();
        $barang = barang::all();
        $array = [
            'barang'=>$barang,
            'outlet'=>$outlet,
        ];

        return view('Pemesanan.create-pemesanan', $array);
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'id_outlet'=>'required',
            'id_barang'=>'required',
            'jumlah_pesanan'=>'required',
            'total_harga'=>'required',
        ]);
        pemesanan::create($data);
        return redirect()->route('Pemesanan.pemesanan')
                        ->with('success','pemesanan created seccessfully');
    }
    public function edit($id)
    {
        $data= pemesanan::find($id);
        $barang = barang::all();
        $outlet = Outlet::all();
        $array = [
            'outlet'=>$outlet,
            'barang'=>$barang,
            'pemesanan'=>$data
        ];
        return view('Pemesanan.edit-pemesanan',$array);
    }
    public function update(Request $request,$id)    
    {
        pemesanan::where('id',$id)->update([
            'id_outlet'=>$request->id_outlet,
            'id_barang'=>$request->id_barang,
            'jumlah_pesanan'=>$request->jumlah_pesanan,
            'total_harga'=>$request->total_harga,
        ]);
        return redirect()->route('Pemesanan.pemesanan');
    }
    public function destroy($id)
    {
        $data= pemesanan::find($id);
        $data->delete();
        return redirect()->route('Pemesanan.pemesanan');
    }
    public function cetak()
    {
        $datas = pemesanan::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Pemesanan</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>Id Pemesanan</th>
                <th>Id Outlet</th>
                <th>Id Barang</th>
                <th>Jumlah Pesanan</th>
                <th>Total Harga</th>
			</tr>';
        $id = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $id++ . "</td>
            <td>" . $data->id_outlet . "</td>
            <td>" . $data->id_barang . "</td>
            <td>" . $data->jumlah_pesanan . "</td>
            <td>" . $data->total_harga . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Barang Masuk.pdf');
    }
}
