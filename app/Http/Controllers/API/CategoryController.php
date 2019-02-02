<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
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
        return Category::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|string|max: 181',
        ]);
        return Category::create([
            'name' => $request['name'],
            'status' => $request['status'],
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
        //update category
        $category = Category::findOrFail($id);
        $this->validate($request, [
            'name'  => 'required|string|max: 181',
        ]);

        $category->update($request->all());
        return ['message' => 'category Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if(Gate::allows('isAdmin') || Gate::allows('isBranchManager')) {
            //delete a paticular category
            $category->delete();
            return ['message' => 'Category Deleted'];
        }
    }
}
