<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users/index', [
            'users' => User::paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/form', [
            'title' => 'Додати користувача',
            'route' => 'users.store',
            'method' => 'POST',
            'user' => new User(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UsersRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users/form', [
            'title' => 'Редагувати користувача',
            'route' => ['users.update', $user],
            'method' => 'PUT',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UsersRequest|Request $request
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, User $user)
    {
        $data = $request->all();
        if (array_get($data, 'password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->fill($data)->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
