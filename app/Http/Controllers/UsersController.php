<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\User;
use App\Roles;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Show the application users list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::with('roles')->get();//echo '<pre>';print_r($users);
        return view('Users/index', compact('users'));
    }

    /**
     * Show the application role creation form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $roles = Roles::all();
        return view('Users/create', compact('roles'));
    }

    /**
     * Store the user detail.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|string|email|unique:users,email',
            'mobilenumber' => 'required|min:10|unique:users,mobilenumber',
            'password' => 'required|min:6',
            'role' => 'required'
        ],[
            'name.required' => 'Enter the Name'
        ]);

        $user = User::create(array('name' => $request->name, 'email' => $request->email, 'mobilenumber' => $request->mobilenumber, 'password' => Hash::make($request->password), 'role_id' => $request->role));

        if($user->id){
            $user_role = DB::table('roles_users')->insertGetId([
                'user_id' => $user->id,
                'role_id' => $request->role,
            ]);
            if($user_role){
                return redirect('users')->with('message' , $request->name.'\'s user has been added Successfully');
            }else{
                return redirect('users')->with('message' , $request->name.'\'s user has been added Successfully but role is not assigned!');
            }
            
        } 
        return Redirect::to("users")->withInput()->withErrors(array('message' => 'Currently not able to create a user. Please try again'));
    }

    /**
     * Show the application role edit form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $user = User::with('roles')->findOrFail($id);
        $roles = Roles::all();
        return view('Users/edit', compact('user', 'roles'));
    }

    /**
     * Update the user detail.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|string|email|unique:users,email,'.$id.',id',
            'mobilenumber' => 'required|min:10|unique:users,mobilenumber,'.$id.',id',
            'role' => 'required'
        ],[
            'name.required' => 'Enter the Name'
        ]);

        $user = User::findOrFail($id);

        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobilenumber = $request->mobilenumber;
            $user->role_id = $request->role;
    
            DB::update('update roles_users set role_id = ? where user_id = ?',[$request->role,$id]);
            $user->save();
            return redirect('users')->with('message' , $request->name.'\'s User has been updated Successfully');
        } 
        return Redirect::to("users")->withInput()->withErrors(array('message' => 'No user found to update!'));
    }

    /**
     * Delete the user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id)
    {   
        $user = User::findOrFail($id);

        if($user){
			User::where(['id' => $id])->delete();

			return json_encode(['message' => $user->name.'\'s User has been deleted Successfully']);
		}else{
            return json_encode(['error' => $user->name.'\'s User has been deleted Successfully']);
        }
    
        
    }
}
