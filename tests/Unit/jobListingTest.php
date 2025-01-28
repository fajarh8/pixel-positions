<?php

use App\Models\Employer;
use App\Models\JobListing;

it('Belongs to an employer', function () {
    $employer = Employer::factory()->create();
    $job_listing = JobListing::factory()->create([
        'employer_id' => $employer->id,
    ]);

    expect($job_listing->employer()->is($employer))->toBeTrue();
});

it('Can have tags', function () {
    $job_listing = JobListing::factory()->create();
    $job_listing->tag('frontend');

    expect($job_listing->tags)->toHaveCount(1);
});
