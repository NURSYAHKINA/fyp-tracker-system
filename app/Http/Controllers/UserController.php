<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRecord;
use App\Models\FeedbackRecord;
use App\Models\ReportRecord;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\AvailabilityRecord;
use App\Models\TimeRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


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

    public function index()
    {
        // $UserRecord = DB::table('users')
        //     ->select(
        //         'id',
        //         'name',
        //         'id_matric',
        //         'email',
        //         'password',
        //         'user_category',
        //         'user_majoring',
        //         'picture',
        //     )

        //     ->orderBy('name', 'asc')
        //     ->get();

        $UserRecord = UserRecord::all();

        dd($UserRecord);
        return view('ManageUser.UserList', compact('UserRecord'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            'id_matric' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            'user_category' => 'required',
            'user_majoring' => 'required',
            'picture' => 'required',

        ]);

        $validatedData['password'] = Hash::make($request->password);
        $updateInfo->update($validatedData);

        return redirect()->back()->with('success', 'User Info updated successfully!');
    }

    public function updateAvatar(Request $request)
    {

        $user = Auth::user();

        $avatarName = $user->id . '.' . request()->avatar->getClientOriginalExtension();

        $request->avatar->move(public_path('uploads'), $avatarName);
        $user->avatar = $avatarName;
        User::where('id', '=', $user->id)->update(['picture' => $avatarName]);

        return back()
            ->with('success', 'You have successfully upload image.');
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

        // Delete both user records
        $userRecord->delete();

        // Redirect to the previous page
        return redirect()->back()->with('success', 'User records deleted successfully!');
    }


    public function count()

    {
        // Check if the user is an coordinator (role_id == 1) 
        if (auth()->user()->role_id == 1) {
            // Retrieve the total number of users from the database
            $totalUsers = UserRecord::count();

            // Retrieve the total number of feedback with status 0
            $totalFeedback = FeedbackRecord::where('status', 0)->count();

            // Retrieve the total number of appointment with status 1
            $totalAppointment = AppointmentRecord::where('status', 1)->count();

            // Retrieve the total number of report with status 1
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
    }

    public function updatePassword(Request $request)
    {

        $user = Auth::user();


        User::where('id', '=', $user->id)->update([

            'users.password' => Hash::make($request->password),

        ]);
        return back()
            ->with('success', 'You have successfully change password.');
    }

    public function chooseSV(Request $request)
{
    $supervisors = UserRecord::where('role_id', 2)
        ->pluck('name', 'id') // Assuming 'id' is the primary key column of the users table
        ->all();

    return view('ManageUser.EditUser', compact('supervisors'));
}
}
