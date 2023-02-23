<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(50);
        return new UserResource(true, 'List Data Users', $users);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required',
            'content'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $image->storeAs('public/users', $image->hashName());

        $user = User::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
        ]);

        return new UserResource(true, 'Data User Berhasil Ditambahkan!', $user);
    }

    public function show(User $user)
    {
        $user->name = $user->id;
        return new UserResource(true, 'Data User Ditemukan!', $user->name, $user->id);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'content'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/users', $image->hashName());

            Storage::delete('public/users/' . $user->image);

            $user->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        } else {

            $user->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        }

        return new UserResource(true, 'Data User Berhasil Diubah!', $user);
    }

    public function destroy(User $user)
    {
        Storage::delete('public/users/' . $user->image);
        $user->delete();
        return new UserResource(true, 'Data User Berhasil Dihapus!', null);
    }
}
