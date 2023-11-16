<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use HttpResponses;


    //  1|py0TNfl5joDrLir23vk6UY7e4u9uC9TcfjUozVsi7edfbff7-> invoice
    // 2|FDnu8W2F4EnTr5JbDGaPwEHYPHPYAGVv4flOgI0Da997e944 -> user
    public function login(Request $request)
    {

        if (Auth::attempt($request->only("email", "password"))) {




            return $this->response(
                'authorized',
                200,
                [
                    'token' => $request->user()->createToken('invoice')->plainTextToken,

                ]
            );
        }
        return $this->response('Not Authorized', 403);
    }





    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->response('Token Revoked', 200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
