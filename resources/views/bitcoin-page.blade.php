@extends('layout.base-template', [
    'title'       => 'Bitcoin Private Key Page '.($isShortNumberString ? $pageNumber : ''),
    'description' => 'SEO description',
])

@section('content')

    <div>
        @if ($isShortNumberString)
            <h1 class="text-base mb-4">Page {{ $pageNumber }} of {{ $lastPage }}</h1>
        @else
            <div class="flex flex-col text-base font-bold">
                <span>Page</span>
                <span>{{ $pageNumber }} of</span>
                <span>{{ config('keys.bitcoin-max-page') }}</span>
            </div>
        @endif

        @include('components.bitcoin-page-pagination')
    </div>


    <p class="mb-4 max-w-md">
        @if ($isOnFirstPage)
            This is the first page of bitcoin private keys.
            There are 128 wallets on this page.
            Wallets are seeded based on page number, this page contains wallets with seeds from 1 to 128.
        @elseif($isOnLastPage)
            This is the last page, this page only has 64 wallets on it.
        @else
            This page contains 128 bitcoin private keys.
        @endif

        Every bitcoin private key is on this website.
    </p>

    <bitcoin-page page="{{ $pageNumber }}"></bitcoin-page>

    <div>
        @include('components.bitcoin-page-pagination', ['includeFirstAndLast' => false])
    </div>

@endsection