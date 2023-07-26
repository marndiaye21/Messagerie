<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserPutRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            'statusCode' => Response::HTTP_OK,
            'message' => '' ,
            'data'   => User::all()
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserPostRequest $request)
    {
        $validated = $request->validate($request->rules());

        $user = User::create($validated);

        return [
            'statusCode' => Response::HTTP_CREATED ,
            'message' => 'inscription reussi' ,
            'data'   => $user
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return [
            'statusCode' => Response::HTTP_OK ,
            'message' => '' ,
            'data'   => $user
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserPutRequest $request, User $user)
    {
        $request->validated();

        $user->update(
           $request->only('firstname', 'lastname', 'photo' , 'phone')
        );

        return [
            'statusCode' => Response::HTTP_ACCEPTED ,
            'message' => 'Mise à jour reussi' ,
            'data'   => $user
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
