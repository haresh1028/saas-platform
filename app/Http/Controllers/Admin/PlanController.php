<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Feature;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::with('features')->get();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        $features = Feature::all();
        return view('admin.plans.create', compact('features'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:plans,name',
            'price' => 'required|numeric|min:0',
            'validity_days' => 'required|integer|min:0',
            'is_free' => 'nullable|boolean',
            'features' => 'array|nullable',
        ]);

        $plan = Plan::create($data);
        $plan->features()->sync($request->features ?? []);

        return redirect()->route('admin.plans.index')->with('success', 'Plan created successfully.');
    }

    public function edit(Plan $plan)
    {
        $features = Feature::all();
        return view('admin.plans.edit', compact('plan', 'features'));
    }

    public function update(Request $request, Plan $plan)
    {
        $data = $request->validate([
            'name' => 'required|unique:plans,name,' . $plan->id,
            'price' => 'required|numeric|min:0',
            'validity_days' => 'required|integer|min:0',
            'is_free' => 'nullable|boolean',
            'features' => 'array|nullable',
        ]);

        $plan->update($data);
        $plan->features()->sync($request->features ?? []);

        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully.');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return back()->with('success', 'Plan deleted.');
    }
}
