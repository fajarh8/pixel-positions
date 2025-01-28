<?php

namespace Database\Seeders;

use App\Models\JobListing;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(3)->create();
        JobListing::factory(20)->hasAttached($tags)->create(new Sequence([
            'featured' => true,
        ], [
            'featured' => false,
        ]));
    }
}
