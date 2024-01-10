<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    // ...

    public function create()
    {
        // Add logic to display the user addition form
        return view('admin.add');
    }

    public function store(Request $request)
    {
        // Add logic to validate and store the new user
        // You can access form data using $request->input('fieldname')

        // Example validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            // Add more fields as needed
        ]);

        // Example user creation
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            // Add more fields as needed
        ]);

        // Redirect to the admin home page after user creation
        return redirect()->route('home')->with('status', 'User added successfully');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(User $user): View
    {
        // Assuming 'admin.edit' is the correct view for editing users in the admin section
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, User $user)
    {
        // Add validation logic here if needed
        $user->update($request->all());

        // Check if the user is an admin
         if ($request->user()->is_admin) {
            return redirect()->route('home')->with('status', 'User updated successfully');
        }

        return redirect()->route('profile.edit')->with('status', 'User updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(User $user)
{
    // You might want to add additional authorization logic here to ensure
    // that the authenticated user has the right to delete the specified user.

    $user->delete();

    // Optionally, you can add a redirect here after successful deletion.
    return redirect()->route('home')->with('status', 'User deleted successfully');
}

}
