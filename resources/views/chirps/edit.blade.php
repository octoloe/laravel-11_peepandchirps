@extends('layouts.app')

@section('content')

    <div class="container">

        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle"
                    viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                </svg>

                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <form method="POST" action="{{ route('chirps.update', $chirp) }}">
            @csrf
            @method('patch')

            <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message"
                style="height: 100px">{{ old('message', $chirp->message) }}</textarea>

            @error('message')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror

            <div class="mt-4">
                <button type="submit" class="btn btn-outline-success btn-sm mt-3">
                    Save
                </button>
                <a href="{{ route('chirps.index') }}"
                    class="btn btn-outline-secondary btn-sm mt-3 p-1">{{ __('Cancel') }}</a>
            </div>

        </form>

    </div>
@endsection
