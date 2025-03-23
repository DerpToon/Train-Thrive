<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function filterWorkouts(Request $request)
{
    $query = Workout::query();

    if ($request->has('level') && !empty($request->level)) {
        $query->where('level', $request->level);
    }

    if ($request->has('muscle') && !empty($request->muscle)) {
        $query->where('muscle_group', $request->muscle);
    }

    $workouts = $query->get();

    // Check if the request expects a JSON response
    if ($request->wantsJson()) {
        return response()->json(['workouts' => $workouts]);
    }

    // If not, return the view
    return view('workout', compact('workouts'));
}


    public function index()
    {
        return view('workout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
