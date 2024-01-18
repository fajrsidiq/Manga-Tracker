<?php
// app/Http/Controllers/MangaController.php

// app/Http/Controllers/MangaController.php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'chapter' => 'required|numeric',
        ]);

        Manga::create([
            'title' => $request->input('title'),
            'chapter' => $request->input('chapter'),
        ]);

        return redirect('/')->with('success', 'Manga added successfully!');
    }

    public function index()
    {
        $allMangas = Manga::orderBy('updated_at', 'desc')
        ->paginate(15);

        return view('index', ['mangas' => $allMangas]);
    }
    public function edit($id)
    {
        $manga = Manga::find($id);

        return view('edit', compact('manga'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'chapter' => 'required|numeric',
        ]);

        $manga = Manga::find($id);

        if (!$manga) {
            return redirect('/')->with('error', 'Manga not found.');
        }

        $manga->update([
            'title' => $request->input('title'),
            'chapter' => $request->input('chapter'),
        ]);

        return redirect('/')->with('success', 'Manga updated successfully!');
    }
    public function destroy($id)
    {
        $manga = Manga::find($id);

        if ($manga) {
            $manga->delete();
            return redirect('/')->with('success', 'Manga deleted successfully!');
        }

        return redirect('/')->with('error', 'Manga not found.');
    }

    // ... Other methods ...
}

