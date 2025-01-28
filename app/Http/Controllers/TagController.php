<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke(Tag $tag){
        return view('results', ['searchResults' => $tag->jobListings->load(['employer', 'tags'])]);
    }
}
