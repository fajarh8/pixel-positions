<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    /** @use HasFactory<\Database\Factories\JobListingFactory> */
    use HasFactory;
    protected $fillable = [
        "title",
        "salary",
        "location",
        "schedule",
        "url",
        "featured",
    ];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function tag(string $name ){
        $tag = Tag::firstOrCreate(["name"=> $name]);

        $this->tags()->attach($tag);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
