<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(400, 'O ID deve ser um número válido.');
        }

        $user = $this->userService->getUserProfile($id);
        $friends = $user->friends;
        $posts = $user->posts;

        return view('profile.index', compact('user', 'friends', 'posts'));
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'profile_picture' => 'nullable|image',
            'bio' => 'nullable|string',
        ]);

        $user = $this->userService->createUser($data);
        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'profile_picture' => 'nullable|image',
            'bio' => 'nullable|string',
        ]);

        $user = $this->userService->updateUser($id, $data);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return response()->json(['message' => 'User deleted successfully']);
    }
}
