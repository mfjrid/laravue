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
            'status_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $request = Request::create([
            'uuid' => Str::uuid(),
            'category_id' => $request->category_id,
            'quality_id' => $request->quality_id,
            'link' => $request->link,
            'message' => $request->message,
            'user_id'   => $request->user_id,
            'status_id'   => $request->status_id
        ]);

        return new RequestResource(true, 'Request Created!', [
            'category_id' => $request->category_id,
            'quality_id' => $request->quality_id,
            'link' => $request->link,
            'user_id' => $request->user_id,
            'status_id' => $request->status_id,
            'created_at' => $request->created_at,
        ]);
    }

    public function show(Req $request)
    {
        return new RequestResource(true, 'Request Found!', [
            'uuid' => $request->uuid,
            'category_id' => $request->category_id,
            'quality_id' => $request->quality_id,
            'link' => $request->link,
            'user_id' => $request->user_id,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
    }

    public function destroy(Req $request)
    {
        $request->delete();
        return new RequestResource(true, 'Request deleted!', null);
    }
}
