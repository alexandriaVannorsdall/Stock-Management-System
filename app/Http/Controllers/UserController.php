<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::all();
        return view('pages.users',[
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.users.create');
    }

    /**
     * Stores a newly created a user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|string|email:filter',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()],
            'password_confirmation' => 'required',
        ]);
        $user = new User();
        $validated['password'] = bcrypt($validated['password']);
        $user->fill($validated)->save();

        return redirect('/users')->with(
            'status',
            'Successfully created a user ' . $user->name
        );
    }

    /**
     * Show the form for editing a specific user.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('pages.users.edit', [
            "user" => $user
        ]);
    }

    /**
     * Updates a specific user in the list of users.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $this->validate($request, [
            'name'=> 'required|string',
            'email'=> 'required|string|email:filter',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()],
            'password_confirmation' => 'required',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $user->fill($validated)->save();
        return redirect()->route('users.index')->with(
            'status',
            'Successfully updated a user ' . $user->name
        );
    }

    /**
     * Present the view delete page.
     *
     * @param User $user
     * @return View
     */
    public function delete(User $user): View
    {
        return view('pages.users.delete', ["user" => $user]);

    }

    /**
     * Remove
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')->with(
            'status',
            'Deleted user ' . $user->name
        );
    }
}
