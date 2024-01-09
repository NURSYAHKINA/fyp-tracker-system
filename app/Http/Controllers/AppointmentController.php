<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRecord;
use App\Models\AvailabilityRecord;
use App\Models\NotificationRecord;
use App\Models\Role;
use App\Models\TimeRecord;
use App\Models\UserRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAppointment()
    {
        $currID = Auth::user()->id;

        $studentID = DB::table('users')
        ->where('users.sv_id', '=', $currID)
        ->first();

        $AppointmentRecord = DB::table('appointments')
            ->where('appointments.user_id', '=', $studentID->id)
            ->select(
                'id',
                'date',
                'time',
                'venue',
                'purpose',
                'user_id',
            )
            ->get();


        return view('ManageAppointment.ListAppointmentPage', compact('AppointmentRecord'));
    }

    public function AddAppointment(Request $request)
    {
        $availabilities = AvailabilityRecord::select('availabilities.date')
            ->groupBy('availabilities.date')
            ->pluck('availabilities.date')
            ->all();

        $time = TimeRecord::select('times.time')    
            ->groupBy('times.time')
            ->pluck('times.time')
            ->all();

        return view('ManageAppointment.AddAppointmentPage', compact('availabilities', 'time'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function storeAppointment(Request $request)
    {
        $currUser = Auth::user()->id;
        $date = $request->input('date');
        $time = $request->input('time');
        $venue = $request->input('venue');
        $purpose = $request->input('purpose');
        $user_id = $currUser;

        $data = array(

            'date' => $date,
            'time' => $time,
            'venue' => $venue,
            'purpose' => $purpose,
            'user_id' => $user_id,

        );

        DB::table('appointments')->insert($data);
        return back()->with('success', 'Job successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function viewAppointment(string $id)
    {
        $appointmentInfo = AppointmentRecord::find($id);
        $userInfo = UserRecord::all(); // Fetch user from the database

        return view('ManageAppointment.ViewAppointmentPage', compact('appointmentInfo', 'userInfo'));
    }

    //go to edit appointment page
    public function editAppointment(string $id)
    {
        $userInfo = UserRecord::all(); // Fetch user from the database

        return view('ManageAppointment.EditAppointmentPage', compact('userInfo'));
    }

    //update function
    public function updateAppointment(Request $request, string $id)
    {
        // Update appointment info from the database
        $updateInfo = AppointmentRecord::findOrFail($id);

        $validatedData = $request->validate([
            'roleID' => 'roleID',
            'date' => 'date',
            'time' => 'time',
            'purpose' => 'purpose',
        ]);

        $updateInfo->update($validatedData);
        return redirect()->route('ListAppointment')->with('success', 'Appointment details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteAppointment(string $id)
    {
        $AppointmentRecord = AppointmentRecord::find($id);

        if (!$AppointmentRecord) {
            return redirect()->back()->with('error', 'Appointment record not found.');
        }

        // delete record
        $AppointmentRecord->delete();
        session()->flash('success', 'Appointment record deleted successfully.');

        // redirect to previous page
        return redirect()->back();
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the Appointment by ID
        $AppointmentRecord = AppointmentRecord::find($id);

        if (!$AppointmentRecord) {
            // AppointmentRecord not found
            return response()->json(['message' => 'Claim not found'], 404);
        }

        // Update the status
        $AppointmentRecord->status = 1; // 
        $AppointmentRecord->save();

        // Return a response indicating the successful update
        return response()->json(['message' => 'Status updated successfully']);
    }

    // Update status to reject
    public function updateStatusReject(Request $request, $id)
    {
        // Find the AppointmentRecord by ID
        $AppointmentRecord = AppointmentRecord::find($id);

        if (!$AppointmentRecord) {
            // AppointmentRecord not found
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        // Update the status
        $AppointmentRecord->status = 2; // 
        $AppointmentRecord->save();

        // Return a response indicating the successful update
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function ListAppointment()
    {
        $currID = Auth::user()->id;

        $AppointmentRecord = DB::table('appointments')
            ->where('appointments.user_id', '=', $currID)
            ->select(
                'id',
                'date',
                'time',
                'venue',
                'purpose',
                'user_id',
            )
            //->orderBy('asc')
            ->get();

        return view('ManageAppointment.ListAppointmentPage', compact('AppointmentRecord'));
    }
}
