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
    {   if($request->ajax()){
        $query = Workout::query();
        
        if ($request->has('level') && !empty($request->level)) {
            $query->where('level', $request->level);
        }
    
        if ($request->has('muscle') && !empty($request->muscle)) {
            $query->where('muscle_group', $request->muscle);
        }
    
        $workouts = $query->get();

    
        // Force return JSON to prevent returning HTML
        return response()->json(['workouts' => $workouts], 200);
    }
        return view('workout');
    }
    


    public function index()
    {   
        $workouts = Workout::all();
      
        return view('workout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adminWorkout()
    {
        $workouts = Workout::all();
        return view('admin', compact('workouts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'muscle_group' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Workout::create($request->all());

        return redirect()->route('admin')->with('success', 'Workout added successfully!');
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
        $workout = Workout::findOrFail($id);
        $workout->delete();

        return redirect()->route('admin')->with('success', 'Workout deleted successfully!');
    }
}
