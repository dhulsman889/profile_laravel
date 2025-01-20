<?php

namespace App\Http\Controllers;

use App\Models\ttg;
use Illuminate\Http\Request;

class TtgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return the view of the index page

        return view('ttg.index', [
            'ttgs' => ttg::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // show the form to create a new ttg

        return view('ttg.form', ['type' => 'add', 'ttg' => new ttg]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Save the new ttg to the database
        $validate = $request->validate([
            'name' => 'required|min:3|max:200',
            'description' => 'required',
            'numberofplayers' => 'required',
        ]);

        if (!$validate) {
            return redirect()->back()->with('error', 'Please fill in all the fields');
        }
        
        ttg::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'numberofplayers' => $request['numberofplayers'],
        ]);
        
        return redirect()->route('ttg.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ttg $ttg)
    {
        // Show the ttg
        return view('ttg.detail', ['ttg' => $ttg]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ttg $ttg)
    {
        //

        return view('ttg.form', ['type' => 'edit', 'ttg' => $ttg]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ttg $ttg)
    {
        // Update the ttg in the database

        $validate = $request->validate([
            'name' => 'required | min:3 | max:200',
            'description' => 'required',
            'numberofplayers' => 'required | integer',
        ]);

        if (!$validate) {
            return redirect()->back()->with('error', 'Please fill in all the fields');
        }

        $ttg->update([
            'name' => $validate['name'],
            'description' => $validate['description'],
            'numberofplayers' => $validate['numberofplayers'],
        ]);

        return redirect()->route('ttg.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ttg $ttg)
    {
        // Delete the ttg from the database
        $ttg->delete();
        return redirect()->route('ttg.index');
    }
}
