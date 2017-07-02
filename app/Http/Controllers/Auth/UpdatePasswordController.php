<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    /*
     * Ensure the user is signed in to access this page
     */
    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * Location the password for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function location(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            'state' => 'required',
        ]);

        $user = User::find(Auth::id());

        $user->fill([
            'city' => $request->city,
            'state' => $request->state
        ])->save();

        $request->session()->flash('success1', 'Your location has been updated.');

        return back();
    }


}