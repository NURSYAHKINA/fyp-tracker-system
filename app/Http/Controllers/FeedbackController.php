<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRecord;
use App\Models\FeedbackRecord;
use App\Models\UserRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexFeedback()
    {
        $currID = Auth::user()->id;
        $FeedbackRecord = FeedbackRecord::all()
        ->where('feedbacks.user_id', '=', $currID);

        return view('ManageFeedback.ListFeedbackPage', compact('FeedbackRecord'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddFeedback()
    {
        $curreID = Auth::user()->id;

        $appointments = AppointmentRecord::select('appointments.date', 'users.name')
        ->join('users', 'users.id', '=', 'appointments.user_id')
        ->where('users.sv_id', '=', $curreID )
        ->groupBy('appointments.date', 'users.name', 'appointments.user_id')
        ->pluck('appointments.date', 'users.name')
        ->all();    

        $users = UserRecord::select('users.name')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.id', 3) // Filter by role_id equal to 3
            ->groupBy('users.name')
            ->pluck('users.name')
            ->all();

        $userFeedback = FeedbackRecord::where('user_id', Auth::user()->id)->get();


        return view('ManageFeedback.AddFeedbackPage', compact('appointments', 'users', 'userFeedback'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeFeedback(Request $request)
    {
     
        $currUser = Auth::user()->id;
        //$id_matric = $request->input('id_matric');
        $names = $request->input('names');
        $rating = $request->input('rating');
        $comment = $request->input('comment');
        $date = $request->input('date');
        $user_id = $currUser;

        $Feedbackdata = array(

            //'id_matric' => $id_matric,
            'names' => $names,
            'rating' => $rating,
            'comment' => $comment,
            'user_id' => $user_id,
            'date' => $date,

        );

        DB::table('feedbacks')->insert($Feedbackdata);
        return back()->with('success', 'Feedback successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function viewFeedback(Request $request, string $id)
    {
       
        $FeedbackRecord = FeedbackRecord::find($id);
        $userInfo = UserRecord::all(); // Fetch user from the database
        
        return view('ManageFeedback.ViewFeedbackPage', compact('FeedbackRecord', 'userInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editFeedback(string $id)
    {
        $userInfo = UserRecord::all(); // Fetch user from the database

        return view('ManageFeedback.EditFeedbackPage', compact('userInfo'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateFeedback(Request $request, string $id)
    {
        // Update appointment info from the database
        $updateFeedbackInfo = FeedbackRecord::findOrFail($id);

        $validatedData = $request->validate([
            'names' => 'names',
            'rating' => 'rating',
            'comment' => 'comment',
        ]);

        $updateFeedbackInfo->update($validatedData);
        return redirect()->route('ListFeedback')->with('success', 'Appointment details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteFeedback(string $id)
    {
        $FeedbackRecord = FeedbackRecord::find($id);

        if (!$FeedbackRecord) {
            return redirect()->back()->with('error', 'Feedback record not found.');
        }

        // delete record
        $FeedbackRecord->delete();
        session()->flash('success', 'Feeback record deleted successfully.');

        // redirect to previous page
        return redirect()->back();
    }

    public function ListFeedback()
    {
        $currID = Auth::user()->id;
        $FeedbackRecord = FeedbackRecord::all();
      

        return view('ManageFeedback.ListFeedbackPage', compact('FeedbackRecord'));
    }
}
