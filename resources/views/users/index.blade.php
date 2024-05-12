@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Daftar Akun</p>
<a href="{{ route('users.create') }}">
    <button type="button" class="focus:outline-none text-white font-medium rounded-lg text-lg px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-56">Akun Baru</button>
</a>

<div>
    <form class="w-48 mb-3 float-right" action="/users" method="get">
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
                    ID Akun
                </th>
                <th scope="col" class="px-6 py-3">
                    ROLE
                </th>
                <th scope="col" class="px-6 py-3">
                    NAMA
                </th>
                <th scope="col" class="px-6 py-3">
                    EMAIL
                </th>
                <th scope="col" class="px-6 py-3">
                    NIP
                </th>
                <th scope="col" class="px-6 py-3 w-12">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr class=" odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$user->id}}</td>
                <td class="px-6 py-4">{{$user->type}}</td>
                <td class="px-6 py-4">{{$user->name}}</td>
                <td class="px-6 py-4">{{$user->email}}

                </td>
                <td class="px-6 py-4">
                    <div class=" text-container">
                        {{$user->nip}}
                    </div>
                </td>
                <td class="px-2 py-4 w-32">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $user->id) }}" method="POST">
                        <a href="{{ route('users.edit', $user->id) }}">
                            <button data-popover-target="popover-edit{{$user->id}}" type="button" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-2  py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800  w-11 h-11">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mx-auto" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" fill="white" />
                                </svg>
                            </button>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button data-popover-target="popover-hapus{{$user->id}}" type="submit" class="focus:outline-none text-white focus:ring-4 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900 w-11 h-11">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="white" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>

            <!-- popover modal -->
            <div data-popover id="popover-edit{{$user->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-26 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Edit Data</h3>
                </div>
                <div data-popper-arrow></div>
            </div>

            <div data-popover id="popover-hapus{{$user->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-26 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Hapus Data</h3>
                </div>
                <div data-popper-arrow></div>
            </div>
            @empty
            <div class="bg-red-200 p-2 rounded border border-red-900">
                Data Akun belum Tersedia.
            </div>
            @endforelse
        </tbody>
    </table>
    {{$users->links()}}
</div>
@endsection