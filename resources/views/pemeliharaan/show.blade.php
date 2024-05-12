@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Detail</p>
<table class="text-xl w-full mb-5">
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">No Register</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $pemeliharaan->nomor_register }}</p>
        </td>
    </tr>
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">Nama Baran dan Basan </p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $pemeliharaan->nama_baran }}</p>
        </td>
    </tr>
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">Jumlah</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $pemeliharaan->jumlah }}</p>
        </td>
    </tr>
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">Tanggal Pemeliharaan</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $pemeliharaan->tgl_pemeliharaan }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Kondisi</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $pemeliharaan->kondisi }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Nama Petugas Pemeliharaan Internal</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $pemeliharaan->tanda_tangan_internal }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Nama Petugas Pemeliharaan Eksternal</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $pemeliharaan->tanda_tangan_eksternal }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Nama Atasan Petugas Pemeliharaan</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $pemeliharaan->nama_atasan_petugas_pemeliharaan }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Keterangan</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $pemeliharaan->keterangan }}</p>
        </td>
    </tr>
</table>
<hr>
<div class="text-3xl ">
    <p class="dark:text-white">Foto Pelengkap</p>
    <br>
    <iframe src="{{ asset('storage/pemeliharaan/'.$pemeliharaan->foto_1) }}" style="width:950px; height:600px;" frameborder="0"></iframe>
    <iframe src="{{ asset('storage/pemeliharaan/'.$pemeliharaan->foto_2) }}" style="width:950px; height:600px;" frameborder="0"></iframe>
    <br>
</div>

@endsection