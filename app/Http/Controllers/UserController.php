<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Toko;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Mews\Purifier\Facades\Purifier;
use function Laravel\Prompts\select;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::query()->get();
        foreach ($users as $user) {
            if ($user->name == "") {
                $user->delete();
            }
            ;
        }

        return view('students.index', [
            'users' => $users
        ]);
        // // return Toko::get();
        // return UserResource::collection(
        //     Auth::user()->tokos()->get()
        // );
        // return  Toko::with('users')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestValidation = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        // $requestValidation['name'] = Purifier::clean($requestValidation['name']);
        // $requestValidation['password'] = Purifier::clean($requestValidation['password']);

        $user = User::create($requestValidation);
        event(new Registered($user));
        Auth::login($user);
        return to_route('user.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view(
            'students.show',
            [
                'user' => $user
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view(
            'students.update',
            [
                'user' => $user
            ]
        );
    }


    public function update(Request $request, User $user)
    {
        $updateValidation = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['required', 'string', 'min:8']
        ]);
        $user->update($updateValidation);
        // return $user;
        return to_route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        $user->delete();
        // return $user;
        return to_route('user.index');
    }

    public function login()
    {
        return view('auth.login');
    }
    public function loginUser(Request $request)
    {
        $requestValidation = $request->validate([
            'email' => ['required', 'string', 'max:100'],
            'password' => ['required'],
        ]);
        // return $requestValidation;

        if (Auth::attempt($requestValidation)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'email tidak valid',
            'password' => 'password tidak valid',
        ])->onlyInput(['email', 'password']);

    }

    public function logout()
    {
        Auth::logout();
        return back();
    }
}
