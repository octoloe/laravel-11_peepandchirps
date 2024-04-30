<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChirpRequest;
use App\Models\Chirp;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;


class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('chirps.index',  [

            'chirps' => Chirp::with('user')->latest()->paginate(10)
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChirpRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $request->user()->chirps()->create($validated);

        return redirect()->route('chirps.index')->with('success', 'Your chirp has been created sucessfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp): View
    {;
        Gate::authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ])->with('success', 'Your chirp has been created sucessfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreChirpRequest $request, Chirp $chirp): RedirectResponse
    {
        Gate::authorize('update', $chirp);

        $validated = $request->validated();

        // Update the chirp
        $chirp->update($validated);

        return redirect()->route('chirps.index')->with('success', 'Your chirp has been updated sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        Gate::authorize('delete', $chirp);
        $chirp->delete();

        return redirect()->route('chirps.index')->with('success', 'Your chirp has been deleted sucessfully!');
    }
}