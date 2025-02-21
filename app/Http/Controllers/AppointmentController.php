<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tutor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function detail($expertId)
    {
        // Has to use user_id instead of id because it is of the tutors
        $expert = User::select('users.*' , 'tutors.*')
                    ->where('users.id', $expertId )
                    ->leftJoin('tutors', 'tutors.user_id', 'users.id')
                    ->first();

        // for the apt display
        $apt_detail_morning = Appointment::where('expert_id', $expertId )
                            ->where('status', 'available')
                            ->whereTime('aptTime', '<=', '12:00:00')
                            ->orderByRaw('TIME(aptTime) ASC')
                            ->get();

        $apt_detail_noon = Appointment::where('expert_id', $expertId )
                            ->where('status', 'available')
                            ->whereTime('aptTime', '>=', '12:00:00')
                            ->whereTime('aptTime', '<', '18:00:00')
                            ->orderByRaw('TIME(aptTime) ASC')
                            ->get();

        $apt_detail_night = Appointment::where('expert_id', $expertId )
                            ->where('status', 'available')
                            ->whereTime('aptTime', '>=', '18:00:00')
                            ->orderByRaw('TIME(aptTime) ASC')
                            ->get();


        return view('expert.aptDetail', compact('expert', 'apt_detail_morning', 'apt_detail_noon', 'apt_detail_night'));

    }





    public function create(Request $request)
    {
        $request->validate([
            'aptTime' => 'required'
        ]);

        $data = [
            'aptTime' => $request->aptTime,
            'expert_id' => auth()->user()->id,
            'expert_name' => auth()->user()->name,
        ];

        Appointment::create($data);

        return back()->with('Success Message', 'Your appointment is created successfully.');
    }





    public function show()
    {
        $appointment = Appointment::where('expert_id', auth()->user()->id )
                    ->orderByRaw("FIELD(status, 'booked', 'available')")
                    ->paginate(2);

        return view('expert.aptList', compact('appointment'));
    }





    public function takeApt($aptId)
    {

        $appointment = Appointment::where('id', $aptId)->first();

        return view('user.aptPayment', compact('appointment'));
    }





    public function aptPaymentComplete(Request $request){


        $request->validate([
            'studentName' => 'required',
            'studentEmail' => 'required',
            'screenshot' => 'required'
        ]);

        $data = [
            'status' => 'pending',
            'user_id' => auth()->user()->id,
            'student_name' => $request->studentName,
            'student_email' => $request->studentEmail,
            'screenshot' => ''
        ];

        if( $request->studentPhone != null ){
            $data = array_merge($data, ['student_phone' => $request->studentPhone]);
        }

            // file name of roar
            $fileName = 'roar'.uniqid() . $request->file('screenshot')->getClientOriginalName();

            // move the file under the folder
            $request->file('screenshot')->move(public_path().'/user/aptPaymentSS/', $fileName);

            // add the name to the db
            $data = array_merge($data, ['screenshot' => $fileName]);


        Appointment::where('id', $request->aptId)->update($data);

        return to_route('userServices');

    }




    
    public function destroy(Appointment $appointment)
    {
        //
    }
}
