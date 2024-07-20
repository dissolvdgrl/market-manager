<?php

namespace App\Http\Controllers;

use App\Models\VendorApplication;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ( $user->is_admin() )
        {
            $applications = VendorApplication::select('id', 'business_name', 'created_at', 'status')->get();

            return view('applications.index', compact('applications'));
        }

        $has_applications = $user->application()->exists();

        $applications = VendorApplication::select('id', 'business_name', 'created_at', 'status')
            ->where('user_id', $user->id)
            ->get();

        return view('applications.index-user', compact('has_applications', 'applications'));
    }

    public function show(int $id)
    {
        $application = VendorApplication::findOrFail($id);
        $electricity_details = null;

        if ($application->electricity_details)
        {
            $electricity_details = json_decode($application->electricity_details, true);
        }

        return view('applications.show', compact('application', 'electricity_details'));
    }
}
