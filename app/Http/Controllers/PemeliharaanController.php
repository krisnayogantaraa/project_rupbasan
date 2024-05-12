<?php

namespace App\Http\Controllers;

use App\Models\Berita_acara;
use App\Models\pemeliharaan;
use App\Models\Post;
use App\Models\Warehouse;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class PemeliharaanController extends Controller
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
    public function index(Request $request): View
    {

        if ($request->has('search')) {
            $pemeliharaans = pemeliharaan::where('nomor_register', 'LIKE', "%$request->search%")
                ->orWhere('nama_baran', 'LIKE', "%$request->search%")
                ->orWhere('kondisi', 'LIKE', "%$request->search%")
                ->orWhere('nama_petugas_pemeliharaan', 'LIKE', "%$request->search%")
                ->paginate(10);
        } else {
            $pemeliharaans = pemeliharaan::latest()->paginate(10);
        }

        //render view with pemeliharaan
        return view('pemeliharaan.index', compact('pemeliharaans'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create($id): View
    {
        $warehouse = Warehouse::findOrFail($id);

        return view('pemeliharaan.create', compact('warehouse'));
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
            'id_baran'    => 'required',
            'nama_baran'    => 'required',
            'nomor_register'    => 'required',
            'jumlah'    => 'required',
            'kondisi'    => 'required',
            'tanda_tangan_internal'    => 'required',
            'tanda_tangan_eksternal'    => 'required',
            'nama_atasan_petugas_pemeliharaan'    => 'required',
            'keterangan'    => 'required',
        ]);

        $tgl_pemeliharaan = Date::now();

        //upload foto 1
        $foto_1 = $request->file('foto_1');
        $foto_1->storeAs('public/pemeliharaan', $foto_1->hashName());

        //upload foto 2
        $foto_2 = $request->file('foto_2');
        $foto_2->storeAs('public/pemeliharaan', $foto_2->hashName());

        //create pemeliharaan
        pemeliharaan::create([
            'id_baran'      => $request->id_baran,
            'nama_baran'      => $request->nama_baran,
            'no_keputusan_pengadilan'      => $request->no_keputusan_pengadilan,
            'nomor_register'      => $request->nomor_register,
            'jumlah'      => $request->jumlah,
            'tgl_pemeliharaan'      => $tgl_pemeliharaan,
            'kondisi'      => $request->kondisi,
            'tanda_tangan_internal'      => $request->tanda_tangan_internal,
            'tanda_tangan_eksternal'    => $request->tanda_tangan_eksternal,
            'nama_atasan_petugas_pemeliharaan'    => $request->nama_atasan_petugas_pemeliharaan,
            'foto_1'     => $foto_1->hashName(),
            'foto_2'     => $foto_2->hashName(),
            'keterangan'    => $request->keterangan,
        ]);

        //redirect to index
        if (auth()->user()->type == "admin") {
            return redirect()->route('pemeliharaan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('pemeliharaan2.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }
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
        $pemeliharaan = pemeliharaan::findOrFail($id);

        //render view with pemeliharaan
        return view('pemeliharaan.show', compact('pemeliharaan'));
    }

    /**
     * cetak_bukti
     *
     * @param  mixed $no_keputusan_pengadilan
     * @return View
     */
    public function cetak_bukti(string $no_keputusan_pengadilan): View
    {
        //get post by no_keputusan pengadilan
        $post = Post::where('no_keputusan_pengadilan', $no_keputusan_pengadilan)->firstOrFail();

        //get warehouse by no_keputusan pengadilan
        $warehouses = Warehouse::where('no_keputusan_pengadilan', $post->no_keputusan_pengadilan)->get();

        //render view
        return view('pemeliharaan.cetak_bukti', compact('post', 'warehouses'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get pemeliharaan by ID
        $pemeliharaan = pemeliharaan::findOrFail($id);

        //render view with pemeliharaan
        return view('pemeliharaan.edit', compact('pemeliharaan'));
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
            'id_baran'    => 'required',
            'nama_baran'    => 'required',
            'nomor_register'    => 'required',
            'jumlah'    => 'required',
            'kondisi'    => 'required',
            'tanda_tangan_internal'    => 'required',
            'tanda_tangan_eksternal'    => 'required',
            'nama_atasan_petugas_pemeliharaan'    => 'required',
            'keterangan'    => 'required',
        ]);

        //get pemeliharaan by ID
        $pemeliharaan = pemeliharaan::findOrFail($id);

        if ($request->hasFile('foto_1')) {
            Storage::delete($pemeliharaan->foto_1);
        }
        if ($request->hasFile('foto_2')) {
            Storage::delete($pemeliharaan->foto_2);
        }

        if ($request->hasFile('foto_1')) {
            $foto1Path = $request->file('foto_1')->store('public/foto');
            $pemeliharaan->foto_1 = $foto1Path;
        }
        if ($request->hasFile('foto_2')) {
            $foto2Path = $request->file('foto_2')->store('public/foto');
            $pemeliharaan->foto_2 = $foto2Path;
        }

        $pemeliharaan->update([
            'id_baran'      => $request->id_baran,
            'nama_baran'      => $request->nama_baran,
            'no_keputusan_pengadilan'      => $request->no_keputusan_pengadilan,
            'nomor_register'      => $request->nomor_register,
            'jumlah'      => $request->jumlah,
            'kondisi'      => $request->kondisi,
            'tanda_tangan_internal'      => $request->tanda_tangan_internal,
            'tanda_tangan_eksternal'    => $request->tanda_tangan_eksternal,
            'nama_atasan_petugas_pemeliharaan'    => $request->nama_atasan_petugas_pemeliharaan,
            'keterangan'    => $request->keterangan,
        ]);

        if (auth()->user()->type == "admin") {
            return redirect()->route('pemeliharaan.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('pemeliharaan2.index')->with(['success' => 'Data Berhasil Diubah!']);
        }
    }

    /**
     * destroy
     *
     * @param  mixed $pemeliharaan
     * @return void
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        //get pemeliharaan by ID
        $pemeliharaan = pemeliharaan::findOrFail($id);

        //delete pemeliharaan
        $pemeliharaan->delete();


        //redirect to index
        if (auth()->user()->type == "admin") {
            return redirect()->route('pemeliharaan.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('pemeliharaan2.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}
