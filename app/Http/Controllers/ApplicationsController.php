<?php

namespace App\Http\Controllers;

use App\Models\VendorApplication;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $has_applications = $user->application();

        $applications = VendorApplication::select('business_name', 'created_at', 'status', 'products')
            ->where('user_id', $user->id)
            ->get();

        return view('apply', compact('has_applications', 'applications'));
    }
}
