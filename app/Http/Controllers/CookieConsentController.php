<?php

namespace App\Http\Controllers;

use App\Models\CookiesConsent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CookieConsentController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $accepted = (bool) $request->boolean('accepted', true);

        if (Auth::check()) {
            CookiesConsent::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'accepted' => $accepted,
                    'accepted_at' => now(),
                ],
            );
        }

        return response()->json([
            'status' => 'ok',
        ]);
    }
}

