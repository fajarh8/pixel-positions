<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(){
        $jobListings = JobListing::query()
        ->with(['employer', 'tags'])
        ->where("title", "LIKE", "%" . request('q') . '%')
        ->get();

        return view('results', ['searchResults' => $jobListings]);
    }
}
