<?php

namespace App\Http\Controllers;

use App\Models\VendorApplication;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $has_applications = $user->application()->exists();

        $applications = VendorApplication::select('business_name', 'created_at', 'status', 'products')
            ->where('user_id', $user->id)
            ->get();

        return view('applications.index', compact('has_applications', 'applications'));
    }

    public function show(int $id)
    {
        $application = VendorApplication::findOrFail($id);
        return view('application', compact('application'));
    }
}
