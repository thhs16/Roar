<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userServices()
    {
        $userAppointment = Appointment::where('user_id', auth()->user()->id)->orderByRaw("FIELD(status, 'pending', 'booked')")->paginate(2);
        // dd($userAppointment->toArray());
        return view('user.userServices', compact('userAppointment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function profile()
    {
        return view('user.userProfile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profileUpdate(Request $request)
    {
        // dd($request->all());

        $validation = $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif'
        ]);

        $user = User::where('users.id', auth()->user()->id)->first();


        // condition
        $imageChange = $request->image != null ? 1 : 0;     // 0
        $nameChange = $request->name != $user->name ? 1 : 0;      // 0
        $nickNameChange = $request->nickname != $user->nickname ? 1 : 0;      // 0
        $phoneChange = $request->phone != $user->phone ? 1 : 0;       //0
        $addressChange = $request->address != $user->address ? 1 : 0;     //0

        $changeCondition = $imageChange | $nameChange | $nickNameChange | $phoneChange | $addressChange;

        $data = [];

        if ($changeCondition) {

            if ($nameChange) {

                $data = array_merge($data, ['name' => $request->name]);

            }
            if ($nickNameChange) {

                $data = array_merge($data, ['nickname' => $request->nickname]);

            }
            if ($phoneChange) {
                $data = array_merge($data, ['phone' => $request->phone]);

            }

            if ($addressChange) {
                $data = array_merge($data, ['address' => $request->address]);
            }


            if ($imageChange) {

                $fileName = 'roar' . uniqid() . $request->file('image')->getClientOriginalName();

                $request->file('image')->move(public_path() . '/user/accImages/', $fileName);


                if ($user->image != null) {
                    unlink(public_path("user/accImages/" . $user->image));
                }

                $data = array_merge($data, ['image' => $fileName]);
            }

            // dd($data);

            if ($data != []) {
                User::where('id', auth()->user()->id)->update($data);
            }

            return back()->with('Success Message', 'The expert info is updated successfully.');

        } else {
            return back()->with('Success Message', 'No Data Changes. You need to edit data to update');
        }
    }

   
    public function updateProfilePassword(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->oldPassword, auth()->user()->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->newPassword),
        ]);

        return redirect()->back()->with('Pw Success', 'Password changed successfully!');
    }
}
