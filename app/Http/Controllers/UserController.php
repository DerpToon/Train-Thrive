<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('name', 'LIKE', "%{$query}%")
                     ->orWhere('email', 'LIKE', "%{$query}%")
                     ->get();

        return response()->json($users);
    }

  
    public function index()
    {
        $users = User::all();
        return view('admin.user.userindex', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
    public function create()
    {
      
        return view('admin.user.usercreate');
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:15',
            'privilege' => 'required|string|in:admin,user',
            'password' => 'required|string|min:8|confirmed',
        ]);

       
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'privilege' => $request->privilege,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }
}