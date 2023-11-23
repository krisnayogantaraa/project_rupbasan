@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ auth()->user()->nip }}
                    Selamat anda mau njing
                    <a href="" class="text-grey-900">aduh</a>
                    <form action="{{ route('logout') }}" method="POST">
                    @csrf
                        <button type="submit">aaaa</button>
                    </form>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection