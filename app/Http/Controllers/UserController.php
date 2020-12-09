<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\{UserResource, CommentResource};

class UserController extends Controller
{
    public function getActiveUsers()
    {
        $users = User::getActiveUsers();

        return UserResource::collection($users);
    }

    public function getUsersComents ($user_id)
    {
        //7.1 Query Builder option, 7.2 Eager Loading, Lazy Loading
        $comments = User::getUsersQueryBuilderComents($user_id);

        return CommentResource::collection($comments);

        //7.1 SQL option
        // $comments = User::getUsersSQLComents($user_id);
        
        // return json_encode($comments);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
