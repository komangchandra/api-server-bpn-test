<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class ApiMajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::all();
        return response()->json(compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'major_name' => 'required'
        ]);

        $majorCreate = Major::create([
            'major_name' => $request->major_name
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data created',
            'major_data' => $majorCreate
        ], 201);
    }
}
