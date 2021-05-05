<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;

class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application roles list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = Roles::all();
        return view('Roles/index', compact('roles'));
    }

    /**
     * Store the role detail.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'slugname' => 'required|string|unique:roles,slug',
        ],[
            'name.required' => 'Enter the Name',
            'slugname.required' => 'Enter the Slug Name'
        ]);

        if(isset($request->description)){
            $description = $request->description;
        }else{
            $description = null;
        }

        $role = Roles::create(array('name' => $request->name, 'slug' => $request->slugname, 'description' => $description));

        if($role->id){    
            return redirect('roles')->with('message' , $request->name.'\'s role has been added Successfully');
             
        } 
        return Redirect::to("roles")->withInput()->withErrors(array('message' => 'Currently not able to create a role. Please try again'));
    }

    /**
     * Show the application role creation form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('Roles/create');
    }

    /**
     * Show the application role edit form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $role = Roles::find($id);
        return view('Roles/edit', compact('role'));
    }

    /**
     * Update the role detail.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'slugname' => 'required|string|unique:roles,slug,'.$id.',id',
        ],[
            'name.required' => 'Enter the Name',
            'slugname.required' => 'Enter the Slug Name'
        ]);

        $role = Roles::findOrFail($id);

        if($role){
            $role->name = $request->name;
            $role->slug = $request->slugname;
            $role->description = $request->description;
            $role->save();

            return redirect('roles')->with('message' , $request->name.'\'s Role has been updated Successfully');
        } 
        return Redirect::to("roles")->withInput()->withErrors(array('message' => 'No role found to update!'));
    }

    /**
     * Delete the role.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id)
    {   
        $role = Roles::findOrFail($id);

        if($role){
			Roles::where(['id' => $id])->delete();

			return json_encode(['message' => $role->name.'\'s Role has been deleted Successfully']);
		}else{
            return json_encode(['error' => $role->name.'\'s Role has been deleted Successfully']);
        }
    
        
    }
}
