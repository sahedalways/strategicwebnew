<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
  public function index()
  {
    if (auth()->user()->user_type == 'user') {
      return view('auth.passwords.user.edit');
    } else {
      return view('auth.passwords.admin.edit');
    }
  }

  public function create()
  {
    // Show the form for creating a new user account
  }

  public function store(Request $request)
  {
    // Store a new user account
  }

  public function show($profile)
  {
  }

  public function edit()
  {
  }

  public function update(Request $request, $id)
  {

    $request->validate([
      'current_password' => [
        'required',
        function ($attribute, $value, $fail) {
          if (!Hash::check($value, auth()->user()->password)) {
            $fail(__('The current password is incorrect.'));
          }
        },
      ],
      'new_password' => 'required|min:8|max:20',
      'password_confirmation' => 'required_with:new_password|same:new_password',
    ]);


    $user = User::findOrFail($id);

    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('change-password.index')->with('sms', 'Password updated successfully');
  }


  public function TransactionPasswordUpdate(Request $request, $id)
  {

    $request->validate([
      'current_transaction_password' => ['required', function ($attribute, $value, $fail) {
        if (!Hash::check($value, auth()->user()->transaction_password)) {
          $fail(__('The current transaction password is incorrect.'));
        }
      }],
      'new_transaction_password' => [
        'required',
        'min:8',
        'max:20',
        'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        function ($attribute, $value, $fail) {
          if (Hash::check($value, auth()->user()->password)) {
            $fail(__('You can not use your current password for transaction password.'));
          }
        },
      ],

      'confirm_transaction_password' => [
        'required',
        function ($attribute, $value, $fail) {
          $newTransactionPassword = request('new_transaction_password');

          if ($value !== $newTransactionPassword) {
            $fail(__('Your confirm transaction password does not match with your new transaction password.'));
          }
        },
      ],


    ]);

    $user = User::findOrFail($id);

    $user->transaction_password = Hash::make($request->new_transaction_password);
    $user->save();

    return redirect()->route('change-transaction-password.index')->with('success', 'Transaction Password updated successfully.');
  }

  public function destroy($id)
  {
    // Delete a user account
  }
}
