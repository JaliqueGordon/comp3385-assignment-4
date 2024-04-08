<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return response()->json(['message' => 'Movies retrieved successfully', 'movies' => $movies]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'poster' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $posterPath = $request->file('poster')->store('posters');

        $movie = Movie::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'poster' => $posterPath,
        ]);

        return response()->json(['message' => 'Movie created successfully', 'movie' => $movie]);
    }
}
