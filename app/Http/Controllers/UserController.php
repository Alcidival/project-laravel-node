<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    
    /**
     * Display a listing of the users.
     * 
     * * @return \Illuminate\Http\Response
     */
    public function index() {
        return User::all();
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request) {
        $validated = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|string|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        return User::create($validated);
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id) {
        return User::findOrFail($id);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:users,email' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return $user;
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        return User::delete($id);
    }

} 
