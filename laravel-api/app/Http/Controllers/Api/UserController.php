<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(50);
        return new UserResource(true, 'Users List', $users);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'image' => 'user.jpg',
            'fandom' => 'No Fandom',
        ]);

        return new UserResource(true, 'User Created!', [
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->username,
            'created_at' => $user->created_at,
        ]);
    }

    public function show(User $user)
    {
        return new UserResource(true, 'User Found!', [
            'uuid' => $user->uuid,
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->username,
            'image' => $user->image,
            'fandom' => $user->fandom,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'     => 'required|unique:users',
            'username'     => 'required|unique:users',
            'password'     => 'required',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/users', $image->hashName());

            Storage::delete('public/users/' . $user->image);

            $user->update([
                'name'     => $request->name,
                'email'   => $request->email,
                'username'   => $request->username,
                'password'   => Hash::make($request->password),
                'image'     => $image->hashName(),
                'fandom'   => $request->fandom,
            ]);
        } else {
            $user->update([
                'name'     => $request->name,
                'email'   => $request->email,
                'username'   => $request->username,
                'password'   => Hash::make($request->password),
                'fandom'   => $request->fandom,
            ]);
        }

        return new UserResource(true, 'User Updated!', [
            'uuid' => $user->uuid,
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->username,
            'image' => $user->image,
            'fandom' => $user->fandom,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);
    }

    public function destroy(User $user)
    {
        Storage::delete('public/users/' . $user->image);
        $user->delete();
        return new UserResource(true, 'User deleted!', null);
    }
}
