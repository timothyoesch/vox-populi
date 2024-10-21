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
        try {
            $validated = $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'phone' => '',
                'zip' => '',
                'optin' => 'boolean',
                'public' => 'boolean',
                'configuration_id' => 'required|exists:configurations,id',
                'locale' => 'required',
                'customFields' => 'array',
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return $th->validator->errors();
        }
        $customFields = $validated['customFields'] ?? [];
        unset($validated['customFields']);

        if (!isset($validated['optin'])) {
            $validated['optin'] = false;
        }
        if (!isset($validated['public'])) {
            $validated['public'] = false;
        }
        $configuration_id = $validated['configuration_id'];
        unset($validated['configuration_id']);
        $supporter = Supporter::withTrashed()->updateOrCreate(
            [
                'email' => $validated['email'],
                'configuration_id' => $configuration_id
            ],
            $validated
        );
        if ($supporter->trashed()) {
            $supporter->restore();
        }
        $supporter->setCustomFields($customFields, true);
        if ($supporter->public && env("APP_MUST_VERIFY_EMAIL", true)) {
            $supporter->email_verification_token = \Illuminate\Support\Str::random(32);
            $supporter->save();
            $notification = new \App\Notifications\Supporter\ConfirmEmail($supporter);
            $supporter->notify($notification);
            $message = __("controllers.supporter.store.success.with-verification", ["name" => $supporter->firstname]);
        } else {
            $supporter->markEmailAsVerified();
        }
        if ($supporter) {
            if ($request->ajax()) {
                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "message" => $message ?? __("controllers.supporter.store.success", ["name" => $supporter->firstname]),
                    "supporter" => $supporter
                ]);
            } else {
                return redirect()->route($supporter->configuration->successroute, ["name" => $supporter->firstname, "source" => $supporter->configuration->key]);
            }
        } else {
            return response()->json(['message' => 'Supporter creation failed'], 500);
        }
    }

    /**
     * Verify supporter email
     */
    public function verify($id, $hash)
    {
        $supporter = Supporter::findOrFail($id);
        if ($supporter->email_verification_token === $hash) {
            $supporter->markEmailAsVerified();
            return redirect()->route('supporter.verify.success');
        } else {
            abort(404);
        }
    }
}
