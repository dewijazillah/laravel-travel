<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Pesan;

class PembeliController extends Controller
{
    public function pesan(){       
        return view('order');
    }

    public function storePesan(Request $request){
        $id_user = Session::get('id_user');
        $email = $request->input('email');
        $nama_paket = $request->input('nama_paket');
        $penginapan = $request->input('penginapan');
        $jumlah_orang = $request->input('jumlah_orang');
        $transportasi = $request->input('transportasi');
        $tanggal_berangkat = $request->input('tanggal_berangkat');
        $total_harga = $request->input('total_harga');        

        $data = new Pesan();
        $data->id_user = $id_user;
        $data->email_pemesan = $email;
        $data->nama_paket = $nama_paket;
        $data->penginapan = $penginapan;
        $data->jumlah_orang = $jumlah_orang;
        $data->transportasi = $transportasi;
        $data->tanggal_berangkat = $tanggal_berangkat;
        $data->total_harga = $total_harga;

        $data->save();
        return redirect('/history');
    }

    public function history(){
        $data = Pesan::where('soft_delete', 0)
            ->where('id_user', Session::get('id_user'))
            ->with('User')
            ->orderBy('id_pesan', 'DESC')
            ->get();

        return view('history', ['data' => $data]);
    }
}
