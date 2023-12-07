<?php

namespace App\Http\Controllers;

use Request;
use Request as RequestForInertia;

use App\Models\Gift;
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
            
        ]);
    }
}
