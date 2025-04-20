<?php

namespace App\Http\Controllers;
use App\Models\Calculator;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getFoodItems(Request $request)
    {
        $query = $request->input('query');
        $foodItems = Calculator::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json($foodItems);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $calculators = Calculator::where('name', 'LIKE', "%{$search}%")->get();

        return response()->json($calculators);
    }

    public function index(Request $request)
    {
        // Get the number of items per page from the request or default to 10
        $itemsPerPage = $request->get('itemsPerPage', 10);

        // Fetch paginated calculators
        $calculators = Calculator::paginate($itemsPerPage);

        // Pass the paginated calculators and itemsPerPage to the view
        return view('admin.calculator.calculatorindex', compact('calculators', 'itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adminCalculator()
    {
        $calculators = Calculator::all();
        return view('admin.calculator.calculatorindex', compact('calculators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'protein' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fats' => 'required|numeric',
            'calories' => 'required|numeric',
        ]);
    
        Calculator::create($request->all());
    
        return redirect()->route('admin')->with('success', 'Calculator added successfully!');
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
        $calculator = Calculator::findOrFail($id);
        return view('admin.calculator.calculatorUpdate', compact('calculator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'protein' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fats' => 'required|numeric',
            'calories' => 'required|numeric',
        ]);

        $calculator = Calculator::findOrFail($id);
        $calculator->update($request->all());

        return redirect()->route('calculator.index')->with('success', 'Calculator updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $calculator = Calculator::findOrFail($id);
        $calculator->delete();

        return redirect()->route('admin')->with('success', 'Calculator deleted successfully!');
    }
    public function create()
    {
    return view('admin.calculator.calculatorInsert');
    }
}
