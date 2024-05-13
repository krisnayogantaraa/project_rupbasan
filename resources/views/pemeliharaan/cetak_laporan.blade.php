<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Bukti</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        /* Gaya untuk cetak */
        @media print {

            /* Set ukuran kertas ke A4 */
            @page {
                size: A4 landscape;
                /* Mode landscape */
                margin: 1cm;
            }

            /* Set margin halaman dan font size atau gaya lainnya sesuai kebutuhan */
            body {
                max-width: 297mm;
                /* Lebar A4 dalam milimeter */
                margin: 0 auto;
                /* Pusatkan body di tengah halaman */
            }

        }
    </style>
</head>

<body class="bg-white">
    <div class="w-full">
        <div class="w-96 font-bold mx-auto text-center">
            BUKU PEMELIHARAAN BASAN DAN BARAN 
        </div>
        <div class="w-96 font-bold mx-auto text-center">
            Periode {{$awal}} - {{$akhir}}
        </div>

        <div class="w-full mt-4">
            <table class="w-full border border-collapse border-solid border-black text-sm font-light">
                <tr>
                    <th rowspan="3" class="border border-collapse border-solid border-black px-2">Nomor</th>
                    <th rowspan="3" class="border border-collapse border-solid border-black w-32">Nomor Register</th>
                    <th rowspan="3" class="border border-collapse border-solid border-black">Nama Baran Dan Basan</th>
                    <th rowspan="3" class="border border-collapse border-solid border-black px-2">Jumlah</th>
                    <th rowspan="3" class="border border-collapse border-solid border-black">Tanggal Pemeliharaan</th>
                    <th colspan="3" class="border border-collapse border-solid border-black">Kondisi</th>
                    <th colspan="2" rowspan="2" class="border border-collapse border-solid border-black px-1">Nama dan tandatangan Petugas pemeliharaan</th>
                    <th rowspan="3" class="border border-collapse border-solid border-black w-32 py-2">Nama dan tandatangan Atasan Petugas pemeliharaan</th>
                    <th rowspan="3" class="border border-collapse border-solid border-black w-24">Ket.</th>
                </tr>
                <tr>
                    <th rowspan="2" class="border border-collapse border-solid border-black w-14">Baik</th>
                    <th rowspan="2" class="border border-collapse border-solid border-black w-14">Rusak</th>
                    <th rowspan="2" class="border border-collapse border-solid border-black w-14">Rusak Berat</th>
                </tr>
                <tr>
                    <th class="border border-collapse border-solid border-black py-2">Internal</th>
                    <th class="border border-collapse border-solid border-black py-2">Pihak Ke 3</th>
                </tr>
                <tr>
                    <th class="border border-collapse border-solid border-black">1</th>
                    <th class="border border-collapse border-solid border-black">2</th>
                    <th class="border border-collapse border-solid border-black">3</th>
                    <th class="border border-collapse border-solid border-black">4</th>
                    <th class="border border-collapse border-solid border-black">5</th>
                    <th class="border border-collapse border-solid border-black">6</th>
                    <th class="border border-collapse border-solid border-black">7</th>
                    <th class="border border-collapse border-solid border-black">8</th>
                    <th class="border border-collapse border-solid border-black">9</th>
                    <th class="border border-collapse border-solid border-black">10</th>
                    <th class="border border-collapse border-solid border-black">11</th>
                    <th class="border border-collapse border-solid border-black">12</th>
                </tr>

                @forelse ($pemeliharaans as $index => $pemeliharaan)
                <tr class="text-center text-black font-medium">
                    <td class="border border-collapse border-solid border-black px-1 py-1">{{ $index + 1 }}</td>
                    <td class="border border-collapse border-solid border-black px-1 py-1">{{ $pemeliharaan->nomor_register }}</td>
                    <td class="border border-collapse border-solid border-black px-1 py-1">{{ $pemeliharaan->nama_baran }}</td>
                    <td class="border border-collapse border-solid border-black px-1 py-1">{{ $pemeliharaan->jumlah }}</td>
                    <td class="border border-collapse border-solid border-black px-1 py-1">{{ $pemeliharaan->tgl_pemeliharaan }}</td>
                    <td class="border border-collapse border-solid border-black px-1 py-1">
                        @if($pemeliharaan->kondisi == "Baik")
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="green" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="grey" d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                        </svg>
                        @endif
                    </td>
                    <td class="border border-collapse border-solid border-black">
                        @if($pemeliharaan->kondisi == "Rusak")
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="green" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="grey" d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                        </svg>
                        @endif
                    </td>
                    <td class="border border-collapse border-solid border-black">
                        @if($pemeliharaan->kondisi == "Rusak Berat")
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="green" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mx-auto" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="grey" d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                        </svg>
                        @endif
                    </td>
                    <td class="border border-collapse border-solid border-black px-1 py-1">{{ $pemeliharaan->tanda_tangan_internal }}</td>
                    <td class="border border-collapse border-solid border-black px-1 py-1">{{ $pemeliharaan->tanda_tangan_eksternal }}</td>
                    <td class="border border-collapse border-solid border-black px-1 py-1">{{ $pemeliharaan->nama_atasan_petugas_pemeliharaan }}</td>
                    <td class="border border-collapse border-solid border-black px-1 py-1">{{ $pemeliharaan->keterangan }}</td>
                </tr>
                @empty
                <div class="bg-red-200 p-2 rounded border border-red-900">
                    Silahkan Masukan tanggal yang valid.
                </div>
                @endforelse
            </table>

        </div>


    </div>

    <script>
        // Jalankan fungsi cetak saat halaman dimuat
        window.onload = function() {
            document.title = 'BuktiPengajuan';
            window.print();
        };
    </script>
</body>

</html>