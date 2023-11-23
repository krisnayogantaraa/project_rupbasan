<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class WarehouseController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {


        //get warehouse
        $warehouses = Warehouse::latest()->paginate(5);

        //render view with warehouse
        return view('warehouses.index', compact('warehouses'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('warehouses.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_barang' => 'required|min:5',
            'deskripsi_barang' => 'required|min:5',
            'foto_barang' => 'required|image|mimes:jpeg,jpg,png',
            'pihak_yang_menitipkan' => 'required|min:3',
            'asal_instansi' => 'required|min:3',
            'nama_pemilik_barang' => 'required|min:5',
            'no_keputusan_pengadilan' => 'required|min:5',
        ]);

        //upload foto_barang
        $foto_barang = $request->file('foto_barang');
        $foto_barang->storeAs('public/warehouse', $foto_barang->hashName());

        //create post
        Warehouse::create([

            'nama_barang' => $request->nama_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'foto_barang' => $foto_barang->hashName(),
            'pihak_yang_menitipkan' => $request->pihak_yang_menitipkan,
            'asal_instansi' => $request->asal_instansi,
            'nama_pemilik_barang' => $request->nama_pemilik_barang,
            'no_keputusan_pengadilan' => $request->no_keputusan_pengadilan,
        ]);

        //redirect to index
        return redirect()->route('warehouse.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get warehouse by ID
        $warehouse = Warehouse::findOrFail($id);

        //render view with warehouse
        return view('warehouses.show', compact('warehouse'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get warehouse by ID
        $warehouse = Warehouse::findOrFail($id);

        //render view with warehouse
        return view('warehouses.edit', compact('warehouse'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_barang' => 'required|min:5',
            'deskripsi_barang' => 'required|min:5',
            'foto_barang' => 'sometimes|image|mimes:jpeg,jpg,png',
            'pihak_yang_menitipkan' => 'required|min:3',
            'asal_instansi' => 'required|min:3',
            'nama_pemilik_barang' => 'required|min:5',
            'no_keputusan_pengadilan' => 'required|min:5',
        ]);

        //get post by ID
        $post = Warehouse::findOrFail($id);

        //check if foto_barang is uploaded
        if ($request->hasFile('foto_barang')) {

            //upload new foto_barang
            $foto_barang = $request->file('foto_barang');
            $foto_barang->storeAs('public/posts', $foto_barang->hashName());

            //delete old image
            Storage::delete('public/warehouse/' . $post->foto_barang);

            //update post with new image
            $post->update([
                'nama_barang' => $request->nama_barang,
                'deskripsi_barang' => $request->deskripsi_barang,
                'foto_barang' => $foto_barang->hashName(),
                'pihak_yang_menitipkan' => $request->pihak_yang_menitipkan,
                'asal_instansi' => $request->asal_instansi,
                'nama_pemilik_barang' => $request->nama_pemilik_barang,
                'no_keputusan_pengadilan' => $request->no_keputusan_pengadilan,
            ]);
        } else {

            //update post without image
            $post->update([
                'nama_barang' => $request->nama_barang,
                'deskripsi_barang' => $request->deskripsi_barang,
                'pihak_yang_menitipkan' => $request->pihak_yang_menitipkan,
                'asal_instansi' => $request->asal_instansi,
                'nama_pemilik_barang' => $request->nama_pemilik_barang,
                'no_keputusan_pengadilan' => $request->no_keputusan_pengadilan,
            ]);
        }

        //redirect to index
        return redirect()->route('warehouse.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get warehouse by ID
        $warehouse = Warehouse::findOrFail($id);

        //delete image
        Storage::delete('public/warehouse/' . $warehouse->foto_barang);

        //delete warehouse
        $warehouse->delete();

        //redirect to index
        return redirect()->route('warehouse.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
