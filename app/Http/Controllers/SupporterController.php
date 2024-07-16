<?php

namespace App\Http\Controllers;

use App\Models\Supporter;
use Illuminate\Http\Request;

class SupporterController extends Controller
{
    /**
     * Store supporter from frontend form
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => '',
            'zip' => '',
            'optin' => 'boolean',
            'public' => 'boolean',
            'configuration_id' => 'required',
            'locale' => 'required|in:de,fr,it'
        ]);

        $supporter = Supporter::updateOrCreate(
            ['email' => $validated['email']],
            $validated
        );

        return redirect()->route('supporter.thanks', ["name" => $supporter->firstname]);
    }
}
