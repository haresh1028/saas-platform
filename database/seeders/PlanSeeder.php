<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;
use App\Models\Feature;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        // Create plans
        $freePlan = Plan::firstOrCreate([
            'slug' => 'free'
        ], [
            'name' => 'Free',
            'description' => 'Perfect for getting started',
            'price' => 0,
            'billing_cycle' => 'monthly',
            'max_projects' => 1,
            'can_assign_teams' => false,
        ]);

        $basicPlan = Plan::firstOrCreate([
            'slug' => 'basic'
        ], [
            'name' => 'Basic',
            'description' => 'Great for small teams',
            'price' => 29.99,
            'billing_cycle' => 'monthly',
            'max_projects' => 5,
            'can_assign_teams' => true,
        ]);

        $premiumPlan = Plan::firstOrCreate([
            'slug' => 'premium'
        ], [
            'name' => 'Premium',
            'description' => 'For growing businesses',
            'price' => 99.99,
            'billing_cycle' => 'monthly',
            'max_projects' => -1, // unlimited
            'can_assign_teams' => true,
        ]);

        // Assign features to plans
        $basicProjects = Feature::where('key', 'basic_projects')->first();
        $teamAssignment = Feature::where('key', 'team_assignment')->first();
        $advancedAnalytics = Feature::where('key', 'advanced_analytics')->first();
        $prioritySupport = Feature::where('key', 'priority_support')->first();

        // Free plan features
        $freePlan->features()->sync([$basicProjects->id]);

        // Basic plan features
        $basicPlan->features()->sync([
            $basicProjects->id,
            $teamAssignment->id,
        ]);

        // Premium plan features
        $premiumPlan->features()->sync([
            $basicProjects->id,
            $teamAssignment->id,
            $advancedAnalytics->id,
            $prioritySupport->id,
        ]);
    }
}