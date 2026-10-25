<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeeTier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeeTierController extends Controller
{
    /**
     * Display a listing of the fee tiers.
     */
    public function index(): View
    {
        $feeTiers = FeeTier::orderBy('age_group_name')->get();

        return view('admin.fees.index', compact('feeTiers'));
    }

    /**
     * Store a newly created fee tier.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'age_group_name' => ['required', 'string', 'max:60'],
            'session_type' => ['required', 'string', 'max:60'],
            'rate_per_day' => ['required', 'numeric', 'min:0', 'max:999.99'],
        ]);

        FeeTier::create($validated);

        return back()->with('success', 'New fee tier rate added successfully.');
    }

    /**
     * Update the specified fee tier.
     */
    public function update(Request $request, FeeTier $feeTier): RedirectResponse
    {
        $validated = $request->validate([
            'rate_per_day' => ['required', 'numeric', 'min:0', 'max:999.99'],
        ]);

        $feeTier->update($validated);

        return back()->with('success', 'Fee rate for '.$feeTier->age_group_name.' ('.$feeTier->session_type.') updated to £'.number_format($feeTier->rate_per_day, 2).'.');
    }

    /**
     * Remove the specified fee tier.
     */
    public function destroy(FeeTier $feeTier): RedirectResponse
    {
        $feeTier->delete();

        return back()->with('success', 'Fee tier deleted successfully.');
    }
}
