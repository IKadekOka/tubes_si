<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\kategori_barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class barangsController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    public function index()
    {
        $data = barang::all();
        return view('Barang.barang',['barang' => $data]);
    }
    public function create()
    {
        $kategori = kategori_barang::all();
        $array = [
            'kategori_barang'=>$kategori,
        ];
        return view('Barang.create-barang', $array);
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'id_kategori'=>'required',
            'nama_barang'=>'required',
            'harga_barang'=>'required',
        ]);
        barang::create($data);
        return redirect()->route('Barang.barang')
                        ->with('success','barang created seccessfully');
    }
    public function edit($id)
    {
        $data= barang::find($id);
        $kategori = kategori_barang::all();
        $array = [
            'kategori_barang'=>$kategori,
            'barang'=>$data
        ];
        return view('Barang.edit-barang',$array);
        
    } 
    public function update(Request $request,$id)
    {
        barang::where('id',$id)->update([
            'id_kategori'=>$request->id_kategori,
            'nama_barang'=>$request->nama_barang,
            'harga_barang'=>$request->harga_barang,
        ]);
        return redirect()->route('Barang.barang');
    }
    public function destroy($id)
    {
        $data= barang::find($id);
        $data->delete();
        return redirect()->route('Barang.barang');
    }
    public function cetak()
    {
        $datas = barang::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Barang</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>Id Barang</th>
                <th>Id Kategori Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
			</tr>';
        $id = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $id++ . "</td>
            <td>" . $data->id_kategori . "</td>
            <td>" . $data->nama_barang . "</td>
            <td>" . $data->harga_barang . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Barang Masuk.pdf');
    }
}