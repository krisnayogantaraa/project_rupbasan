@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 text-gray-900 dark:text-white">Edit Data</p>

<form @if(auth()->user()->type == "admin")
    action="{{ route('pemeliharaan.update', $pemeliharaan->id) }}"
    @else
    action="{{ route('posts2.update', $pemeliharaan->id) }}"
    @endif
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="nomor_register" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Registrasi</label>
            <input value="{{$pemeliharaan->nomor_register}}" type="text" id="nomor_register" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="nomor_register">
            <input value="{{$pemeliharaan->id}}" type="text" id="id_baran" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="id_baran">
        </div>
        <div>
            <label for="nama_baran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Baran</label>
            <input value="{{$pemeliharaan->nama_baran}}" type="text" id="nama_baran" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Mobil Avanza" required name="nama_baran">
        </div>
        <div>
            <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
            <input value="{{$pemeliharaan->jumlah}}" type="text" id="jumlah" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 2" required name="jumlah">
        </div>
        <div>
            <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kondisi</label>
            <select id="kondisi" name="kondisi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">--Pilih--</option>
                @if($pemeliharaan->kondisi == "Baik")
                <option selected value="Baik">Baik</option>
                <option value="Rusak">Rusak</option>
                <option value="Rusak Berat">Rusak Berat</option>
                @elseif($pemeliharaan->kondisi == "Rusak")
                <option value="Baik">Baik</option>
                <option selected value="Rusak">Rusak</option>
                <option value="Rusak Berat">Rusak Berat</option>
                @elseif($pemeliharaan->kondisi == "Rusak Berat")
                <option value="Baik">Baik</option>
                <option value="Rusak">Rusak</option>
                <option selected value="Rusak Berat">Rusak Berat</option>
                @endif
            </select>
        </div>
        <div>
            <label for="tanda_tangan_internal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Petugas Pemeliharaan Internal</label>
            <input value="{{$pemeliharaan->tanda_tangan_internal}}" type="text" id="tanda_tangan_internal" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Widi Wijayanto" required name="tanda_tangan_internal">
        </div>
        <div>
            <label for="tanda_tangan_eksternal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Petugas Pemeliharaan Internal</label>
            <input value="{{$pemeliharaan->tanda_tangan_eksternal}}" type="text" id="tanda_tangan_eksternal" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Rudy Setiawan" required name="tanda_tangan_eksternal">
        </div>
        <div>
            <label for="nama_atasan_petugas_pemeliharaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Atasan Petugsas Pemeliharaan</label>
            <input value="{{$pemeliharaan->nama_atasan_petugas_pemeliharaan}}" type="text" id="nama_atasan_petugas_pemeliharaan" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Jaya Wijayanto" required name="nama_atasan_petugas_pemeliharaan">
        </div>
        <div>
            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Baret di pintu kanan">{{$pemeliharaan->keterangan}}</textarea>
        </div>
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto Pelengkap</label>
        <input class="block  text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="foto_1">

    </div>
    <div class="mb-6 ">
        <input class="block  text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="foto_2">
    </div>

    <button type="submit" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
    <button type="reset" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-yellow-400 focus:ring-yellow-300  ">Reset</button>
</form>
@endsection