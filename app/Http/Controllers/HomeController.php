<?php

namespace App\Http\Controllers;

use App\Models\pemeliharaan;
use App\Models\Warehouse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request): View
    {

        if ($request->has('search') && !empty($request->search)) {
            $warehouses = Warehouse::where('no_keputusan_pengadilan', '=', "$request->search")
                ->orWhere('pihak_yang_menitipkan', '=', "$request->search")
                ->orWhere('nama_pemilik_barang', '=', "$request->search")
                ->orWhere('nama_barang', '=', "$request->search")
                ->paginate(100);
        } else {
            $warehouses = Warehouse::whereNull('id'); // Query yang tidak akan mengembalikan hasil
        }

        //render view with warehouse
        return view('welcome', compact('warehouses'));
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get pemeliharaan by ID
        $pemeliharaan = Pemeliharaan::where('id_baran', $id)->latest()->firstOrFail();


        //render view with pemeliharaan
        return view('show',compact('pemeliharaan'));
    }
}
