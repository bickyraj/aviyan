<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
	public function setting()
	{
		$user = auth()->user()->toArray();
		return view('admin.users.setting', compact('user'));
	}

	public function updateSetting(Request $request)
	{
		$request->validate([
			'username' => 'required',
			'password' => 'nullable|min:6',
			'confirm_password' => 'required_with:password|same:password'
		]);

		$user = auth()->user();

		$user->username = $request->username;

		$password_changed = false;
		if (isset($request->password) && !empty($request->password)) {
		    $user->password = Hash::make($request->password);
			$password_changed = true;
		}

		if ($user->save()) {
			if ($password_changed) {
				auth()->logout();
		        return redirect()->route('admin.login')->with('success_message', 'Updated successfully. Please login with new password.');
			}

            session()->flash('success_message', 'Updated successfully.');

		} else {
			session()->flash('error_message', __('alerts.save_error'));
		}

        return redirect()->back();
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get()->toArray();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'citizenship_no' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_of_shares' => 'required|numeric',
            'invested_amount' => 'required|numeric',
            'dob' => 'date'
        ]);

        $status = 0;
        $msg = "";
        $user = new User;
        $user->name = $request->name;
        $user->role_id = User::USER_ROLE;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->citizenship_no = $request->citizenship_no;
        $user->occupation = $request->occupation;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->no_of_shares = $request->no_of_shares;
        $user->invested_amount = $request->invested_amount;
        $user->password = bcrypt($this->randomPassword());
        // $user->slug = $this->create_slug_title($user->name);

        if ($user->save()) {
            $status = 1;
            $msg = "User created successfully.";
            session()->flash('message', $msg);
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'citizenship_no' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_of_shares' => 'required|numeric',
            'invested_amount' => 'required|numeric',
            'dob' => 'date'
        ]);

        $status = 0;
        $msg = "";
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->citizenship_no = $request->citizenship_no;
        $user->occupation = $request->occupation;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->no_of_shares = $request->no_of_shares;
        $user->invested_amount = $request->invested_amount;

        if ($user->save()) {
            $status = 1;
            $msg = "User updated successfully.";
            session()->flash('message', $msg);
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = 0;
        $http_status_code = 400;
        $msg = "";
        $path = 'public/users/';

        if (User::find($id)->delete()) {
            // Storage::deleteDirectory($path . $id);
            $status = 1;
            $http_status_code = 200;
            $msg = "User has been deleted";
        }

        return response()->json([
            'status' => $status,
            'message' => $msg
        ], $http_status_code);
    }

    public function userList()
    {
        $users = User::where('role_id', '!=', 1)->get();
        return response()->json([
            'data' => $users
        ]);
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
