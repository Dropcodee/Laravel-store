<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
class CompanyController extends Controller
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
        //
        return Company::all();
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
            'location'  => 'required|string|max: 181',
            'country'  => 'required|string|max: 181',
            'about'  => 'required|string|max: 181',
            'email'  => 'required|string|email|max:255|unique:companies',
            'emailTwo'  => 'required|string|email|max:255|unique:companies',
            'phone'  => 'required|string|max: 181',
            'phoneTwo'  => 'required|string|max: 181'

        ]);
        return Company::create([
            'name' => $request['name'],
            'location' => $request['location'],
            'country' => $request['country'],
            'about' => $request['about'],
            'email' => $request['email'],
            'emailTwo' => $request['emailTwo'],
            'phone' => $request['phone'],
            'phoneTwo' => $request['phoneTwo'],
            'photo' => $request['photo']

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $currentPhoto = $company->photo;
         // validate fields before submitting user data
         $this->validate($request, [
            'name'  => 'required|string|max: 181',
            'location'  => 'required|string|max: 181',
            'country'  => 'required|string|max: 181',
            'about'  => 'required|string|max: 181',
            'email'  => 'required|string|email|max:191|unique:companies,email,'.$company->id,
            'emailTwo'  => 'required|string|email|max:191|unique:companies,email,'.$company->id,
            'phone'  => 'required|string|max: 181',
            'phoneTwo'  => 'sometimes|string|max: 181'
        ]);

        if($request->photo != $currentPhoto){
            $name = time(). '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(\public_path('svg/profile/').$name);

            // changing the phpto value to the unique value $name
            $request->merge(['photo' => $name]);

            //deleting old user image
            $companyImage = public_path('svg/profile/').$currentPhoto;
            if(file_exists($companyImage)) {
                @unlink($companyImage);
            }
        };

        $company->update($request->all());
        return ['message' => 'Success'];
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
