<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rupbasan Kelas 1 Bandung</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('storage/img/LOGO.png') }}" />

    <!-- Scripts -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 fixed top-0 w-full z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('storage/img/LOGO.png') }}" class="h-8" alt="Logo Pengayoman" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Sistem Pengajuan Barang Sitaan</span>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="/#pengajuan" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pengajuan</a>
                    </li>
                    <li>
                        <a href="/#list" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Daftar Barang</a>
                    </li>
                    <li>
                        @if (Route::has('login'))
                        <div>
                            @auth
                            @if(auth()->user()->type == "user")
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent">
                                    <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                                </button>
                            </form>
                            @else
                            <a href="{{ route('posts.index') }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent">Home</a>
                            @endif
                            @else
                            <a href="{{ route('login') }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent">Log in</a>
                            @endauth
                        </div>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mt-16">
        <div class="w-11/12 px-4">
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
        </div>

    </div>

    <div class="w-full h-32 bg-blue-950 flex justify-center items-center text-white">
        <p>
            Copyright © 2024
        </p>
    </div>

</body>

</html>