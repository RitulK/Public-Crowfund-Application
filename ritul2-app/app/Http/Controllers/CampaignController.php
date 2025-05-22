<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        $campaignData = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('campaign_images', 'public');
            $campaignData['image'] = $imagePath;
        }

        $campaign = new Campaign($campaignData);

        // Associate with authenticated user if logged in
        if (auth()->check()) {
            $campaign->user_id = auth()->id();
        }

        $campaign->save();

        return redirect()->route('campaigns.index')->with('success', 'Campaign created successfully!');
    }

    public function show(Campaign $campaign)
    {
        return view('campaigns.show', compact('campaign'));
    }

    public function contribute(Request $request, Campaign $campaign)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $campaign->amount_raised += $request->amount;
        $campaign->save();

        return redirect()->route('campaigns.show', $campaign->id)->with('success', 'Thank you for your contribution!');
    }

    public function browse(Request $request)
    {
        $query = $request->input('search');
        $campaigns = Campaign::when($query, function ($q) use ($query) {
            return $q->where('title', 'like', '%' . $query . '%')
                     ->orWhere('description', 'like', '%' . $query . '%');
        })->get();

        return view('campaigns.browse', compact('campaigns', 'query'));
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect()->route('campaigns.index')->with('success', 'Campaign deleted successfully!');
    }

    public function edit(Campaign $campaign)
    {
        return view('campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $campaignData = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('campaign_images', 'public');
            $campaignData['image'] = $imagePath;
        }

        $campaign->update($campaignData);

        return redirect()->route('campaigns.show', $campaign->id)->with('success', 'Campaign updated successfully!');
    }
}
