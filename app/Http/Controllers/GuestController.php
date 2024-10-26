<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Guest::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate(Guest::$rules);

        // Определение страны, если она не указана
        if (empty($validatedData['country'])) {
            $validatedData['country'] = Guest::determineCountry($validatedData['phone']);
        }

        $guest = Guest::create($validatedData);

        return response()->json($guest, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        return $guest;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest)
    {
        // Валидация данных
        $validatedData = $request->validate(Guest::$rules);

        // Определение страны, если она не указана
        if (empty($validatedData['country'])) {
            $validatedData['country'] = Guest::determineCountry($validatedData['phone']);
        }

        $guest->update($validatedData);
        return $guest;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();
        return response()->noContent();
    }
}
