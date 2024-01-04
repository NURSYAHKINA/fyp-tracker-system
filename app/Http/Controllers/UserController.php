<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRecord;
use App\Models\FeedbackRecord;
use App\Models\ReportRecord;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListUser()
    {
        if (auth()->user()->role_id == 1) {
            $lists = UserRecord::with('userType')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->select('users.*', 'roles.name')
                ->get();
        } else {
            $lists = UserRecord::with('userType')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->select('users.*', 'roles.name')
                ->where('users.id', auth()->user()->id)
                ->get();
        }

        return view('ManageUser.UserList', ["listUser" => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function viewUser(string $id)
    {
        $userInfo = UserRecord::find($id);
        $roles = Role::all(); // Fetch positions from the database

        return view('ManageUser.ViewUser', compact('userInfo', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editUser(string $id)
    {
        $userInfo = UserRecord::find($id);
        $roles = Role::all(); // Fetch positions from the database

        return view('ManageUser.EditUser', compact('userInfo', 'roles')); //returns the edit view with the employee information
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id)
    {
        $updateInfo = UserRecord::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        $validatedData['password'] = Hash::make($request->password);
        $updateInfo->update($validatedData);

        return redirect()->route('ListUser')->with('success', 'Employee Info updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser($id)
    {
        $userRecord = UserRecord::find($id);

        if (!$userRecord) {
            return redirect()->back()->with('error', 'Employee record not found.');
        }

        // delete record
        $userRecord->delete();

        // redirect to previous page
        return redirect()->back();    }

    public function count()
    {
        // Check if the user is an coordinator (role_id == 1) 
        if (auth()->user()->role_id == 1) {
            // Retrieve the total number of employees from the database
            $totalUsers = UserRecord::count();

            // Retrieve the total number of feedback with status 0
            $totalFeedback = FeedbackRecord::where('status', 0)->count();

            // Retrieve the total number of appointment with status 1
            $totalAppointment = AppointmentRecord::where('status', 1)->count();

            // Retrieve the total number of appointment with status 1
            $totalReport = ReportRecord::where('status', 1)->count();
        } else {

            $totalUser = UserRecord::count();

            // Retrieve the total number of feedback with status 0 for the current user
            $totalFeedback = FeedbackRecord::where('status', 0)
                ->where('user_id', auth()->user()->id)
                ->count();

            // Retrieve the total number of appointment with status 1 for the current user
            $totalAppointment = AppointmentRecord::where('status', 1)
                ->where('user_id', auth()->user()->id)
                ->count();

            // Retrieve the total number of report with status 1 for the current user
            $totalReport = ReportRecord::where('status', 1)
                ->where('user_id', auth()->user()->id)
                ->count();
        }

        // Return the counts as JSON response
        return response()->json([
            'totalUsers' => $totalUsers ?? null,
            'totalFeedback' => $totalFeedback,
            'totalAppointment' => $totalAppointment,
            'totalReport' => $totalReport
        ]);
    }
}
