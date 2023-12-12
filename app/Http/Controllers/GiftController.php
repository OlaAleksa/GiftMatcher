<?php

namespace App\Http\Controllers;

use Request;
use Request as RequestForInertia;

use App\Models\Gift;
use App\Models\Category;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;


class GiftController extends Controller
{
    public function store()
    {
        $validatedData = RequestForInertia::validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'picture' => ['required', 'file', 'max:8192'],
            'category_id' => ['required', 'exists:id, categories'],
        ]);

        $filename = '';

        if (isset($validatedData['picture'])) {
            $preview_path = Storage::disk('uploads')->putFile('gifts', $validatedData['picture']);
            $filename = basename($preview_path);
        }

        $gift = Gift::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $filename,
            'category_id' => $validatedData['category_id'],
        ]);

        return back()->with('message', 'Udało się!');
    }

    public function index()
    {
        return Inertia::render('Gifts/Index', [
            
        ]);
    }

    public function create()
    {
        return Inertia::render('Gifts/Create', [
            'categories' => Category::all(),
        ]);
    }
}
