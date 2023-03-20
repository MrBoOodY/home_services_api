<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PreviewVisit;
use App\Models\Service;
use App\Models\Visit;
use App\Models\VisitRequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Visit::factory(10)->create();
        VisitRequest::factory(10)->create();
        PreviewVisit::factory(10)->create();
        Service::factory(10)->create();
    }
}
