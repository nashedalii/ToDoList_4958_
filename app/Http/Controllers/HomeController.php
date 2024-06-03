<?php
  

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    } 
  
    /**
     * Show the application dashboard for admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('adminHome');
    }
  
    /**
     * Show the application dashboard for manager.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }

    /**
     * Display the user management page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function manageAccounts(): View
    {
        $users = User::all();
        return view('manage-accounts', compact('users'));
    }

    /**
     * Display the edit user form.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editUser($id): View
    {
        $user = User::findOrFail($id);
        return view('edit-user', compact('user'));
    }

    /**
     * Update the user details.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('manage-accounts')->with('success', 'User updated successfully.');
    }

    /**
     * Delete the specified user.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('manage-accounts')->with('success', 'User deleted successfully.');
    }
}

