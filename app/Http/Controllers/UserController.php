<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;
use App\Models\Listener;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'lname' => 'required|alpha',
            'img_path' => 'required|mimes:jpg,png'
        ];
        $messages = [
            'required' => 'The :attribute ay may content',
            'email' => 'ang :attribute format ay mali ka',
            'password' => 'dapat anim o mahigit na characters',
            'email.required' => 'ilagay mo email mo'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'email' => trim($request->email),
            'password' => bcrypt($request->password),
            'name' => $request->fname . " " . $request->lname
        ]);


        $path = $request->file('img_path')->storeAs(
            'public/images',
            $request->file('img_path')->hashName()
        );
        // dd($path);
        $listener = Listener::create([
            'fname' => trim($request->fname),
            'lname' => trim($request->lname),
            'address' => $request->address,
            'img_path' => $path,
            'user_id' => $user->id

        ]);

        // dd($listener);
        Auth::login($user);
        return redirect()->route('user.profile');
    }

    public function profile()
    {
        $user = Auth::user();
        // dd($user);
        $listener = Listener::where('user_id', Auth::id())->first(['fname', 'lname', 'address', 'img_path']);
        // dd($listener);
        return view('user.profile', compact('user', 'listener'));
    }
}
