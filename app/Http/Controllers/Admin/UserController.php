<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users', [
            'do' => 'view',
            'users' => $users
        ]);
    }

    public function add(){
        return view('admin.users', [
            'do' => 'add'
        ]);
    }
    
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);
        $data['user_id'] = auth()->id();
        $data['is_published'] = true;
        if ($request->file('image') != null) {
            $data['image'] = $request->file('image')->store('images/users');
        }else{
            $data['image'] = 'images/users/default.png';
        }
        User::create($data);
        return redirect()->route('users')->with('success', 'User created successfully');
    }

    public function edit(string $id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found');
        }
        return view('admin.users', [
            'do' => 'edit',
            'user' => $user
        ]);
    }

    public function update(Request $request, string $id){
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('users')->with('error', 'User not found');
        }
        $data = $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);
        if ($request->file('image') != null) {
            if ($user->image != 'images/users/default.png') {
                unlink(public_path('storage/'.$user->image));
            }
            $data['image'] = $request->file('image')->store('images/users');
        }else{
            unset($data['image']);
        }
        $user->update($data);
        return redirect()->route('users')->with('success', 'User updated successfully');
    }

    
    public function delete($id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found');
        }

        if ($user->image != 'images/users/default.png') {
            unlink(public_path('storage/'.$user->image));
        }
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully');
    }

}
