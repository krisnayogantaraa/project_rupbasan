@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Daftar Permohonan Baru</p>
<a @if(auth()->user()->type == "admin")
    href="{{ route('posts.create') }}"
    @else
    href="{{ route('posts2.create') }}"
    @endif
    >
    <button type="button" class="focus:outline-none text-white font-medium rounded-lg text-lg px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-56">Pengajuan Baru</button>
</a>

<div>
    <form class="w-48 mb-3 float-right" @if(auth()->user()->type == "admin")
        action="/posts"
        @else
        action="/posts2"
        @endif
        method="get">
        <div class="flex">
            <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
            <div class="relative w-full">
                <input type="search" id="search-dropdown" name="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-2 border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search">
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
    </form>
</div>

<div class=" overflow-x-scroll w-full">
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="green" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="red" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                    @endif
                </td>
                <td class="px-6 pl-24 py-4">
                    @if($post->file2)
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="green" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="red" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                    @endif
                </td>
                <td class="px-6 pl-12 py-4">
                    @if($post->file3)
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="green" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="red" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                    @endif
                </td>
                <td class="px-6 pl-12 py-4">
                    @if($post->file4)
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="green" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="red" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                    @endif
                </td>
                <td class="px-6 pl-12 py-4">
                    @if($post->file5)
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="green" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="red" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                    @endif
                </td>
                <td class="px-2 py-4 w-48">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" @if(auth()->user()->type == "admin")
                        action="{{ route('posts.destroy', $post->id) }}"
                        @else
                        action="{{ route('posts2.destroy', $post->id) }}"
                        @endif
                        method="POST">
                        <input type="hidden" name="no_keputusan_pengadilan" value="{{ $post->no_keputusan_pengadilan }}">
                        <a @if(auth()->user()->type == "admin")
                            href="{{ route('posts.show', $post->id) }}"
                            @else
                            href="{{ route('posts2.show', $post->id) }}"
                            @endif
                            >
                            <button data-popover-target="popover-show{{$post->id}}" type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4  font-medium rounded-lg text-sm px-2  py-2.5 me-2 mb-2 focus:ring-yellow-900  w-11 h-11">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mx-auto" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" fill="white" />
                                </svg>
                            </button> </a>
                        <a @if(auth()->user()->type == "admin")
                            href="{{ route('posts.edit', $post->id) }}"
                            @else
                            href="{{ route('posts2.edit', $post->id) }}"
                            @endif
                            >
                            <button data-popover-target="popover-edit{{$post->id}}" type="button" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-2  py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800  w-11 h-11">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mx-auto" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" fill="white" />
                                </svg>
                            </button> </a>
                        <a @if(auth()->user()->type == "admin")
                            href="{{ route('posts.cetak_bukti', ['no_keputusan_pengadilan' => $post->no_keputusan_pengadilan]) }}"
                            @else
                            href="{{ route('posts2.cetak_bukti', ['no_keputusan_pengadilan' => $post->no_keputusan_pengadilan]) }}"
                            @endif
                            >
                            <button data-popover-target="popover-bukti{{$post->id}}" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 w-11">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 mx-auto" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z" fill="white" />
                                </svg>
                            </button>
                        </a>
                        <a @if(auth()->user()->type == "admin")
                            href="{{ route('berita_acara.create', ['no_keputusan_pengadilan' => $post->no_keputusan_pengadilan]) }}"
                            @else
                            href="{{ route('berita_acara2.create', ['no_keputusan_pengadilan' => $post->no_keputusan_pengadilan]) }}"
                            @endif
                            >
                            <button data-popover-target="popover-berita{{$post->id}}" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-11">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 mx-auto" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z" fill="white" />
                                </svg>
                            </button>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button data-popover-target="popover-hapus{{$post->id}}" type="submit" class="focus:outline-none text-white focus:ring-4 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900 w-11 h-11">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="white" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>

            <!-- popover modal -->
            <div data-popover id="popover-show{{$post->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-26 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Show Data</h3>
                </div>
                <div data-popper-arrow></div>
            </div>

            <div data-popover id="popover-edit{{$post->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-26 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Edit Data</h3>
                </div>
                <div data-popper-arrow></div>
            </div>

            <div data-popover id="popover-bukti{{$post->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-42 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Cetak Bukti Pengajuan</h3>
                </div>
                <div data-popper-arrow></div>
            </div>

            <div data-popover id="popover-berita{{$post->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-46 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Cetak Berita Acara</h3>
                </div>
                <div data-popper-arrow></div>
            </div>

            <div data-popover id="popover-hapus{{$post->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-26 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Hapus Data</h3>
                </div>
                <div data-popper-arrow></div>
            </div>
            @empty
            <div class="bg-red-200 p-2 rounded border border-red-900">
                Data Pengajuan belum Tersedia.
            </div>
            @endforelse
        </tbody>
    </table>
    {{$posts->links()}}
</div>
@endsection