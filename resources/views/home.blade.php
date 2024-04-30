@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header text-center text-white p-2 bg-info bg-info-subtle">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (auth()->user()->is_admin)
                            <div class="row">
                                <div class="col-8">
                                    <p class="mt-2">Hello Admin - do something...</p>
                                </div>
                                <div class="col-4">

                                    <ul class="nav nav-underline">
                                        <li class="nav-item">
                                            <a href="{{ route('chirps.index') }}" class="nav-link text-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-music-note mb-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2" />
                                                    <path fill-rule="evenodd" d="M9 3v10H8V3z" />
                                                    <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5z" />
                                                </svg>
                                                {{ __('Chirps') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.show.users') }}" class="nav-link text-info mx-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-people mb-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                                </svg>
                                                {{ __('Users') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-8">
                                    <p class="mt-2">{{ __('Hello, you are logged in!') }}</p>

                                </div>
                                <div class="col-4">

                                    <ul class="nav nav-underline">
                                        <li class="nav-item">
                                            <a href="{{ route('chirps.index') }}" class="nav-link text-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-music-note mb-1" viewBox="0 0 16 16">
                                                    <path
                                                        d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2" />
                                                    <path fill-rule="evenodd" d="M9 3v10H8V3z" />
                                                    <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5z" />
                                                </svg>
                                                {{ __('Chirps') }}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        @endif


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
