<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{

  public function showChangePasswordForm() {
    return view('auth.passwords.change-password');
  }

  public function changePassword(Request $request) {
    \Validator::make($request->all(), [
      'current_password' => 'required',
      'new_password'     => 'required|min:6|same:password_confirmation',
    ])->validate();

    // Check if the current password is correct
    if (!Auth::attempt(['email' => Auth::user()->email, 'password' => $request->input('current_password')])) {
      return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    $user = Auth::user();
    $user->password = bcrypt($request->input('new_password'));
    $user->save();

    return redirect()->route('change-password')->with('success', 'Password changed successfully.');
  }
}
