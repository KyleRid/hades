<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return json_encode(DB::table('users')
        //     ->join('role_user', 'users.id', '=', 'role_user.user_id')
        //     ->join('roles', 'roles.id', '=', 'role_user.role_id')
        //     ->select('users.*', 'users.email', 'roles.name')
        //     ->get());
        // return UserResource::collection(DB::table(''));
        return UserResource::collection(DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.*', 'users.email', 'roles.name')
            ->get());

    }
    // SELECT * FROM `users` LEFT JOIN role_user ON `users`.`id` = `role_user`.`user_id` INNER JOIN roles ON `roles`.`id` = `role_user`.`role_id`;

    // SELECT `users`.name, `users`.email, `roles`.name FROM `users` LEFT JOIN role_user ON `users`.`id` = `role_user`.`user_id` INNER JOIN roles ON `roles`.`id` = `role_user`.`role_id`
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
