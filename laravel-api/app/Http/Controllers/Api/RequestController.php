<?php

namespace App\Http\Controllers\Api;

use App\Models\Request;
use Illuminate\Support\Str;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Http\Resources\RequestResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::latest()->paginate(50);
        return new RequestResource(true, 'Requests List', $requests);
    }

    public function store(Req $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'quality_id' => 'required',
            'link' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = Request::create([
            'uuid' => Str::uuid(),
            'category_id' => $request->category_id,
            'quality_id' => $request->quality_id,
            'link' => $request->link,
            'user_id'   => $request->user_id
        ]);

        return new RequestResource(true, 'Request Created!', [
            'category_id' => $user->category_id,
            'quality_id' => $user->quality_id,
            'link' => $user->link,
            'user_id' => $user->user_id,
            'created_at' => $user->created_at,
        ]);
    }

    public function show(Req $user)
    {
        return new RequestResource(true, 'Request Found!', [
            'uuid' => $user->uuid,
            'category_id' => $user->category_id,
            'quality_id' => $user->quality_id,
            'link' => $user->link,
            'user_id' => $user->user_id,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);
    }

    public function destroy(Req $request)
    {
        $request->delete();
        return new RequestResource(true, 'Request deleted!', null);
    }
}
