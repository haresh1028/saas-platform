<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'name' => 'Basic Project Management',
                'key' => 'basic_projects',
                'description' => 'Create and manage basic projects',
            ],
            [
                'name' => 'Team Assignment',
                'key' => 'team_assignment',
                'description' => 'Assign team members to projects',
            ],
            [
                'name' => 'Advanced Analytics',
                'key' => 'advanced_analytics',
                'description' => 'View detailed project analytics and reports',
            ],
            [
                'name' => 'Priority Support',
                'key' => 'priority_support',
                'description' => 'Get priority customer support',
            ],
        ];

        foreach ($features as $feature) {
            Feature::firstOrCreate(['key' => $feature['key']], $feature);
        }
    }
}
