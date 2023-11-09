<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index()
    {
        return inertia('Gifts/Index', [
            
        ]);
    }

    public function create()
    {
        return inertia('Gifts/Create', [
            
        ]);
    }
}
