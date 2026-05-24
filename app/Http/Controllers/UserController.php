<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserController extends Controller
{
    public function dashboard()
    {
        $favorites = Favorite::where('user_id', auth()->id())->with('book')->get();
        return view('user.dashboard', compact('favorites'));
    }

    public function sendPasswordCode(Request $request)
    {
        $user = auth()->user();
        $code = rand(100000, 999999);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => $code, // Using token column to store the 6-digit code
                'created_at' => Carbon::now()
            ]
        );

        // Mail logic would go here. For now it's logged.
        
        return response()->json(['status' => 'success']);
    }

    public function addFavorite(Request $request)
    {
        $request->validate(['book_id' => 'required|exists:books,id']);
        
        Favorite::firstOrCreate([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id
        ]);
        
        return back();
    }

    public function removeFavorite(Request $request)
    {
        $request->validate(['favorite_id' => 'required|exists:favorites,id']);
        
        Favorite::where('id', $request->favorite_id)->where('user_id', auth()->id())->delete();
        
        return back();
    }

    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'verification_code' => $request->filled('password') ? 'required|string' : 'nullable',
        ]);

        if ($request->filled('password')) {
            $resetData = DB::table('password_reset_tokens')
                ->where([
                    'email' => $user->email,
                    'token' => $request->verification_code
                ])
                ->first();

            if (!$resetData || Carbon::parse($resetData->created_at)->addMinutes(10)->isPast()) {
                return back()->withErrors(['verification_code' => 'Invalid or expired verification code!']);
            }

            $user->password = Hash::make($request->password);
            
            // Delete code after use
            DB::table('password_reset_tokens')->where('email', $user->email)->delete();
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $avatarName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $user->avatar = '/avatars/'.$avatarName;
        }

        $user->save();

        return back()->with('status', 'Profile updated successfully!');
    }
}
