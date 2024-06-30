<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->is_admin()) {
            abort(403, "Sorry, you're not allowed to view this page");
        }
        $users = User::select(['id', 'name', 'email', 'profile_photo_path', 'role_id'])->where('id', '!=', Auth::user()->id)->with('role')->get();
        return view('vendors.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->is_admin()) {
            abort(403, "Sorry, you're not allowed to view this page");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->is_admin()) {
            abort(403, "Sorry, you're not allowed to do this");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Auth::user()->is_admin()) {
            abort(403, "Sorry, you're not allowed to view this page");
        }

        $user = User::find($id);

        return view('vendors.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::user()->is_admin()) {
            abort(403, "Sorry, you're not allowed to view this page");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()->is_admin()) {
            abort(403, "Sorry, you're not allowed to do this");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->is_admin()) {
            abort(403, "Sorry, you're not allowed to vdo this");
        }
    }
}
