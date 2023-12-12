<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Request;
use Request as RequestForInertia;

use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function store()
    {
        $validatedData = RequestForInertia::validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'symbol' => ['required', 'string'],
            'extra_attributes' => ['nullable'],
        ]);

        $category = Category::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'symbol' => $validatedData['symbol'],
            'extra_attributes' => isset($validatedData['extra_attributes']) ? json_encode($validatedData['extra_attributes']) : null,
        ]);

        return back()->with('message', 'Udało się!');
    }


    public function create()
    {
        return Inertia::render('Categories/Create', [

            
        ]);
    }
}
