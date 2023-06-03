<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kategori_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    public function index(){
        $data  = kategori_barang::all();
        return view('Kategori.kategori', ['kategori' => $data]);
    }
    public function create()
    {
        return view('Kategori.Create-kategori');
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'jenis_barang'=>'required',
            'bahan_baku'=>'required',
        ]);
        kategori_barang::create($data);
        return redirect()->route('Kategori.kategori')
                        ->with('success','kategori created seccessfully');
    }
    public function edit($id)
    {
        $data= kategori_barang::find($id);
        $array = [
            'kategori_barang'=>$data
        ];
        return view('Kategori.edit-kategori',$array);
        
    } 
    public function update(Request $request, $id)
    {
        kategori_barang::where('id',$id)->update([
            'jenis_barang'=>$request->jenis_barang,
            'bahan_baku'=>$request->bahan_baku,
        ]);
        return redirect()->route('Kategori.kategori');
    }
    public function destroy($id)
    {
        $data= kategori_barang::find($id);
        $data->delete();
        return redirect()->route('Kategori.kategori');
    }
    public function cetak()
    {
        $datas = kategori_barang::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Kategori Barang</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>Id Kategori Barang</th>
                <th>Jenis Barang</th>
                <th>Bahan Baku</th>
			</tr>';
        $id = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $id++ . "</td>
            <td>" . $data->jenis_barang . "</td>
            <td>" . $data->bahan_baku . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Barang Masuk.pdf');
    }
}
