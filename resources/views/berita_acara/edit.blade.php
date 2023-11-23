<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    @vite('resources/css/app.css')
    <style>
        
    </style>
</head>

<body class="bg-gray-50">

    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 " aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 border border-gray-800">
            <a href="#" class="flex items-center ps-2.5 mb-5">
                <img src="{{ asset('storage/img/LOGO.png') }}" class="h-20 me-3 sm:h-15" alt="Cikoantar Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">CIKOANTAR</span>
            </a>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('posts.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 transition duration-75 text-gray-400 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75 text-gray-400 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('warehouse.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75 text-gray-400 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Barang</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-2 sm:ml-64">
        <div class="container mt-2">
            <div class="card border-1 shadow-sm rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-800 p-4">
                <p class="text-5xl mb-3 dark:text-white">Buat Surat BA Baran dan Basan Keluar Baru</p>
                <div>
                    <form method="post" action="{{ route('berita_acara.create', $post) }}">
                        @csrf

                        @if(isset($beritaAcara->nama_pihak_1))
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Keputusan Pengadilan</label>
                                <input type="text" id="first_name" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="no_keputusan_pengadilan" value="{{$post}}" readonly>
                            </div>
                            <div>
                                <label for="perihal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">perihal</label>
                                <textarea id="perihal" rows="4" class="block p-2.5 w-full text-sm  rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : Pencabutan penitipan barang bukti" name="perihal" value="">{{$beritaAcara->perihal}}</textarea>
                            </div>
                        </div>
                        <h1 class="font-bold text-lg">Pihak Petama</h1>
                        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
                            <div>
                                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pihak Pertama</label>
                                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_pihak_1" value="{{$beritaAcara->nama_pihak_1}}">
                            </div>
                            <div>
                                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Pihak Pertama</label>
                                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_pihak_1" value="{{$beritaAcara->nip_pihak_1}}">
                            </div>
                            <div>
                                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat Pihak Pertama</label>
                                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : " required name="pangkat_pihak_1" value="{{$beritaAcara->pangkat_pihak_1}}">
                            </div>
                            <div>
                                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Pihak Pertama</label>
                                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : " required name="jabatan_pihak_1" value="{{$beritaAcara->jabatan_pihak_1}}">
                            </div>
                        </div>

                        <h1 class="font-bold text-lg">Pihak Kedua</h1>
                        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
                            <div>
                                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pihak Kedua</label>
                                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_pihak_2" value="{{$beritaAcara->nama_pihak_2}}">
                            </div>
                            <div>
                                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Pihak Kedua</label>
                                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_pihak_2" value="{{$beritaAcara->nip_pihak_2}}">
                            </div>
                            <div>
                                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat Pihak Kedua</label>
                                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : DPR" required name="pangkat_pihak_2" value="{{$beritaAcara->pangkat_pihak_2}}">
                            </div>
                            <div>
                                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Pihak Kedua</label>
                                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : DPR" required name="jabatan_pihak_2" value="{{$beritaAcara->jabatan_pihak_2}}">
                            </div>
                        </div>

                        <h1 class="font-bold text-lg">Saksi Pertama</h1>
                        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
                            <div>
                                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Saksi Pertama</label>
                                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_saksi_1" value="{{$beritaAcara->nama_saksi_1}}">
                            </div>
                            <div>
                                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Saksi Pertama</label>
                                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_saksi_1" value="{{$beritaAcara->nip_saksi_1}}">
                            </div>
                        </div>

                        <h1 class="font-bold text-lg">Saksi Kedua</h1>
                        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
                            <div>
                                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Saksi Kedua</label>
                                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_saksi_2" value="{{$beritaAcara->nama_saksi_2}}">
                            </div>
                            <div>
                                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Saksi Kedua</label>
                                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_saksi_2" value="{{$beritaAcara->nip_saksi_2}}">
                            </div>
                        </div>
                        @else
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Keputusan Pengadilan</label>
                                <input type="text" id="first_name" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 122345544" required name="no_keputusan_pengadilan" value="{{$post}}" readonly>
                            </div>
                            <div>
                                <label for="perihal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">perihal</label>
                                <textarea id="perihal" rows="4" class="block p-2.5 w-full text-sm  rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : Pencabutan penitipan barang bukti" name="perihal" value="{{}}"></textarea>
                            </div>
                        </div>
                        <h1 class="font-bold text-lg">Pihak Petama</h1>
                        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
                            <div>
                                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pihak Pertama</label>
                                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_pihak_1">
                            </div>
                            <div>
                                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Pihak Pertama</label>
                                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_pihak_1">
                            </div>
                            <div>
                                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat Pihak Pertama</label>
                                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : " required name="pangkat_pihak_1">
                            </div>
                            <div>
                                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Pihak Pertama</label>
                                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : " required name="jabatan_pihak_1">
                            </div>
                        </div>

                        <h1 class="font-bold text-lg">Pihak Kedua</h1>
                        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
                            <div>
                                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pihak Kedua</label>
                                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_pihak_2">
                            </div>
                            <div>
                                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Pihak Kedua</label>
                                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_pihak_2">
                            </div>
                            <div>
                                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat Pihak Kedua</label>
                                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : DPR" required name="pangkat_pihak_2">
                            </div>
                            <div>
                                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan Pihak Kedua</label>
                                <input type="text" id="instansi" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : DPR" required name="jabatan_pihak_2">
                            </div>
                        </div>

                        <h1 class="font-bold text-lg">Saksi Pertama</h1>
                        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
                            <div>
                                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Saksi Pertama</label>
                                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_saksi_1">
                            </div>
                            <div>
                                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Saksi Pertama</label>
                                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_saksi_1">
                            </div>
                        </div>

                        <h1 class="font-bold text-lg">Saksi Kedua</h1>
                        <div class="grid gap-6 mb-6 mt-6 md:grid-cols-2">
                            <div>
                                <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Saksi Kedua</label>
                                <input type="text" id="Nama" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_saksi_2">
                            </div>
                            <div>
                                <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Saksi Kedua</label>
                                <input type="text" id="no_ktp" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 32732612345678" required name="nip_saksi_2">
                            </div>
                        </div>
                        @endif
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                        <button type="reset" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Reset</button>
                    </form>
                </div>
            </div>
        </div>




        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


        <script>

        </script>

</body>

</html>