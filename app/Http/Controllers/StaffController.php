<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;
use App\Models\Barang;
use App\Models\Staff;
use App\Models\Pesan;
use Carbon\Carbon;

class StaffController extends Controller
{    
    public function konfirmasi(){
        $data = pesan::where('soft_delete', 0)
            ->with('User')
            ->orderBy('id_pesan', 'DESC')
            ->get();

        return view('konfirmasi', ['data' => $data]);
    }

    public function konfirmasiPembelian($id){
        $pesan = Pesan::find($id);
        $pesan->status = 1;                
        
        $pesan->save();

        return redirect('/konfirmasi');
    }
}
