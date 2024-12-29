<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(12);
        return $this->successWithPagination(data: $users, message: 'Users retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try{
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            return $this->success(data: $user, message: 'User created successfully');
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'User not created',
                'data' => $e->getMessage()
            ]);
        }
       

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if($user == null)
        {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
                'data' => null
            ]);
        }
        return $this->success(data: $user, message: 'User retrieved successfully');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request,$id)
    {
        $user = User::find($id);
        if($user == null)
        {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
                'data' => null
            ]);
        }
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->update($data);
        return $this->success(data: $user, message: 'User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user == null)
        {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
                'data' => null
            ]);
        }
        return $this->success(data: $user, message: 'User deleted successfully');

    }
}
