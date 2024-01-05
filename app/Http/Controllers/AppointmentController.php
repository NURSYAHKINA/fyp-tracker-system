<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRecord;
use App\Models\AvailabilityRecord;
use App\Models\NotificationRecord;
use App\Models\Role;
use App\Models\UserRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAppointment()
    {
        $user = UserRecord::with('userType')->get();
        $role = Role::all();
        $lists = [
            'user' => $user,
            'role' => $role,
        ];

        dd($lists);
        return view('ManageAppointment.ListAppointmentPage', ["listData" => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAppointment()
    {
        return view('ManageAppointment.AddAppointmentPage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAppointment(Request $request)
    {
        // Determine the user ID based on role_id
        $userId = auth()->user()->role_id == 3 ? $request->user_id : auth()->user()->id;

        // Store a new claim record
        $newAppointment = AppointmentRecord::create([
            'userId' => $userId,
            'date' => $request->date,
            'time' => $request->end_time,
            'purpose' => $request->purpose,
            'status' => 0,

        ]);

        NotificationRecord::create([
            'user_id' => $userId,
            'noti_type' => 1,
            'noti_text' => "has book an appointment",
        ]);

        return redirect()->route('indexAppointment');
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
            return response()->json(['message' => 'Appoointment not found'], 404);
        }

        // Update the status
        $AppointmentRecord->status = 2; // 
        $AppointmentRecord->save();

        // Return a response indicating the successful update
        return response()->json(['message' => 'Status updated successfully']);
    }


}
