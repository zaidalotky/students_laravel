<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class ApiController extends Controller
{
    public function  createUser(Request $request)
    {
        //Validation
        $request->validate([
            "username" => "required",
            "password" => "required",
            "phone_num" => "required",
            "gender" => "required",
            "age" => "required",
        ]);

        //create api
        $user = new Users();

        $user->username = $request->username;
        $user->password = $request->password;
        $user->phone_num = $request->phone_num;
        $user->gender = $request->gender;
        $user->age = $request->age;

        $user->save();

        return response()->json([
            "status" => 1,
            "message" => "create new user successfully"
        ]);
    }
    public function getUsers()
    {
        $user = Users::get();
        return response()->json([
            "status" => 1,
            "message" => "You can see the users",
            "data" => $user
        ], 200);
    }
    public function deleteUser($id)
    {
        if (Users::where("id", $id)->exists()) {
            $user = Users::find($id);
            $user->delete();

            response()->json([
                "status" => 1,
                "message" => "The Employee Deleted Successfully"
            ]);
        }
    }

    public function search($key)
    {
        return Users::where('username', 'like', "%$key%")->get();
    }
}
