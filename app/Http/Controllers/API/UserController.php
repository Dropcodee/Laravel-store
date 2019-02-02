<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
        /**
     * Consructor to secure apis using passport.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('isAdmin');
        if(Gate::allows('isAdmin') || Gate::allows('isBranchManager')) {
            return User::latest()->paginate(10);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate fields before submitting user data
        $this->validate($request, [
            'name'  => 'required|string|max: 181',
            'email'  => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'photo' => $request['photo'],
            'password' => Hash::make($request['password']),

        ]);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return auth('api')->user();
    }

    /**
     * Update user profile.
     *
     * @param  request
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {
        $user = auth('api')->user();
        $currentPhoto = $user->photo;

        $this->validate($request, [
            'name'  => 'required|string|max: 181',
            'email'  => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'required|string|min:6'
        ]);


       if($request->photo != $currentPhoto){
            $name = time(). '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(\public_path('svg/profile/').$name);

            // changing the phpto value to the unique value $name
            $request->merge(['photo' => $name]);

            //deleting old user image
            $userImage = public_path('svg/profile/').$currentPhoto;
            if(file_exists($userImage)) {
                @unlink($userImage);
            }
        };

        if(!empty($request->password)) {
            $request->merge(['password' => Hash::make($request['password'])]);
        }
        $user->update($request->all());
        return ['message' => 'Success'];
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

        $user = User::findOrFail($id);
        // validate fields before submitting user data
        $this->validate($request, [
            'name'  => 'required|string|max: 181',
            'email'  => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6'
        ]);
          //update user data
        $user->update($request->all());
        return ['message' => 'user updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('isAdmin');
        //delete user
        $user->delete();
        return ['message' => 'Staff Successfully Deleted.'];
    }
}
