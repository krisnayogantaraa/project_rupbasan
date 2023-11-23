@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Daftar Permohonan Baru</p>
<a href="{{ route('posts.create') }}">
    <button type="button" class="focus:outline-none text-white font-medium rounded-lg text-lg px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-56">Pengajuan Baru</button>
</a>
<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700  uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No Keputusan Pengadilan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NAMA Pemohon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Surat permohonan pengambilan Basan Baran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Surat penetapan putusan pengadilan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Salinan barang bukti
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Surat eksekusi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Surat kuasa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr class=" odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $post->no_keputusan_pengadilan }}</td>
                    <td class="px-6 py-4">{{ $post->nama }}</td>
                    <td class="px-6 pl-24 py-4">
                        @if($post->file1)
                        <i class="fas fa-check text-success"></i>
                        @else
                        <i class="fas fa-times text-danger"></i>
                        @endif
                    </td>
                    <td class="px-6 pl-24 py-4">
                        @if($post->file2)
                        <i class="fas fa-check text-success"></i>
                        @else
                        <i class="fas fa-times text-danger"></i>
                        @endif
                    </td>
                    <td class="px-6 pl-12 py-4">
                        @if($post->file3)
                        <i class="fas fa-check text-success"></i>
                        @else
                        <i class="fas fa-times text-danger"></i>
                        @endif
                    </td>
                    <td class="px-6 pl-12 py-4">
                        @if($post->file4)
                        <i class="fas fa-check text-success"></i>
                        @else
                        <i class="fas fa-times text-danger"></i>
                        @endif
                    </td>
                    <td class="px-6 pl-12 py-4">
                        @if($post->file5)
                        <i class="fas fa-check text-success"></i>
                        @else
                        <i class="fas fa-times text-danger"></i>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            <a href="{{ route('posts.show', $post->id) }}">
                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:ring-yellow-900 w-44">Show</button>
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}">
                                <button type="button" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800 w-44">Edit</button>
                            </a>
                            <a href="{{ route('posts.cetak_bukti', ['no_keputusan_pengadilan' => $post->no_keputusan_pengadilan]) }}">
                                <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 w-44">Cetak Bukti Pengajuan</button>
                            </a>
                            <a href="{{ route('berita_acara.create', ['no_keputusan_pengadilan' => $post->no_keputusan_pengadilan]) }}">
                                <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-44">Cetak Berita acara</button>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="focus:outline-none text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900 w-44">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data Pengajuan belum Tersedia.
                </div>
                @endforelse
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</div>
@endsection