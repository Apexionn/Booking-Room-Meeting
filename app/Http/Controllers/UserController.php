<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $userID = Auth::id();
        $user = Auth::user();
        return view('employee.account', compact('userID', 'user'));
    }

    public function updateProfileImage(Request $request)
    {
        $userId = Auth::id();
        $user = User::find($userId);

        if (!$user) {
            // Jika tidak ada user
            return redirect()->back()->with('error', 'User not found.');
        }

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            // Hapus foto yang lama
            if ($user->image) {
                $oldImagePath = public_path('IMG/' . $user->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload Foto Baru
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $newFileName = uniqid();
            $newUserImage = $newFileName . '.' . $fileExtension;
            $request->file('image')->move(public_path('images/'), $newUserImage);

            // Update Foto di database
            $user->image = $newUserImage;

            // Menyimpan Data
            try {
                $user->save();
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error saving user profile image.');
            }
            return redirect()->back()->with('success', 'Profile picture updated successfully.');
        }
        return redirect()->back()->with('error', 'Image not provided.');
    }

    public function manage(){
        return view('admin.employees.dashboard',[
            'users' => User::latest()->filters(request(['search']))->get()
        ]);
    }

    // Create
    public function create(){
        return view('admin.employees.createEmployees');
    }
    public function insert(Request $request){
        $data = User::create($request->all());
        $password = Hash::make($request->password);
        $data->password = $password;
        $data->save();
        if($request->hasFile('image')){
            $fileName = $request->file('image')->getClientOriginalName();
            $fileExtension =$request->file('image')->getClientOriginalExtension();
            $fileName .=$fileExtension;
            $newFileName= uniqid();
            $img = $newFileName.'.'.$fileExtension;
            $request->file('image')->move('images/', $img);
            $data -> image = $img;
            $data->save();
        }
        return redirect('/manage-employees');

    }
    // Update
    public function select($id){
        $userData = User::find($id);
        return view('admin.employees.updateEmployees',[
            'employee' => $userData
        ]);
    }

    public function update(Request $request, $id){
    $user = User::find($id);

    if (!$user) {
        return redirect('/manage-employees')->with('error', 'User not found.');
    }

    // Image
    if ($request->hasFile('image')) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Menghapus foto yang lama
        if ($user->image) {
            $oldImagePath = public_path('images/' . $user->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Upload Foto Baru
        $fileExtension = $request->file('image')->getClientOriginalExtension();
        $newFileName = uniqid();
        $newUserImage = $newFileName . '.' . $fileExtension;
        $request->file('image')->move(public_path('images/'), $newUserImage);

        // Update Foto di database
        $user->image = $newUserImage;
    }

    // Password
    if ($request->filled('password')) {
        $password = Hash::make($request->password);
        $user->password = $password;
    }

    // Update data ke database
    $user->name = $request->name;
    $user->role = $request->role;
    $user->email = $request->email;
    $user->division = $request->division;

    // Menyimpan semua perubahan ke database
    $user->save();

    return redirect('/manage-employees')->with('success', 'User updated successfully.');
}

    public function delete($id){
        $data = User::find($id);
        $data ->delete();
        return redirect('/manage-employees');
    }
}
