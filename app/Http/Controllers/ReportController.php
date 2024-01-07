<?php

namespace App\Http\Controllers;

use App\Models\FeedbackRecord;
use App\Models\ReportRecord;
use App\Models\UserRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexReport()
    {
        $currID = Auth::user()->id;

        $ReportRecord = DB::table('reports')
            ->where('reports.user_id', '=', $currID)
            ->select(
                'id',
                'user_id',
                'name',
                'date',
                'feedback',
            )
            ->get();

        return view('ManageReport.AddReportPage', compact('ReportRecord'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addReport()
    {
        $feedbacks = FeedbackRecord::select('feedbacks.date')
            ->groupBy('feedbacks.date')
            ->pluck('feedbacks.date')
            ->all();

        $users = UserRecord::select('users.name')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.id', 3) // Filter by role_id equal to 3
            ->groupBy('users.name')
            ->pluck('users.name')
            ->all();

        return view('ManageReport.AddReportPage', compact('feedbacks', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeReport(Request $request)
    {
        $currUser = Auth::user()->id;
        $user_id = $request->input('user_id');
        $name = $request->input('name');
        $date = $request->input('date');
        $feedback = $request->input('feedback');

        $data = array(

            'user_id' => $user_id,
            'name' => $name,
            'date' => $date,
            'feedback' => $feedback,
        );

        DB::table('reports')->insert($data);
        return back()->with('success', 'Report successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function viewReport(string $id)
    {
        $ReportInfo = ReportRecord::find($id);
        $userInfo = UserRecord::all(); // Fetch user from the database

        return view('ManageReport.ViewReportPage', compact('ReportInfo ', 'userInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editReport(string $id)
    {
        $userInfo = UserRecord::all(); // Fetch user from the database

        return view('ManageReport.EditReportPage', compact('userInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateReport(Request $request, string $id)
    {
         // Update report info from the database
         $updateReportInfo = ReportRecord::findOrFail($id);

         $validatedData = $request->validate([
             'name' => 'name',
             'feedback' => 'feedback',
         ]);
 
         $updateReportInfo->update($validatedData);
         return redirect()->route('ListReport')->with('success', 'Appointment details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteReport(string $id)
    {
        $ReportRecord = ReportRecord::find($id);

        if (!$ReportRecord) {
            return redirect()->back()->with('error', 'Report record not found.');
        }

        // delete record
        $ReportRecord->delete();
        session()->flash('success', 'Report record deleted successfully.');

        // redirect to previous page
        return redirect()->back();
    }

    public function ListReport()
    {
        $currID = Auth::user()->id;

        $ReportRecord = DB::table('reports')
            ->where('reports.id', '=', $currID)
            ->select(
                'id',
                'user_id',
                'name',
                'date',
                'feedback',
            )
            //->orderBy('asc')
            ->get();

        return view('ManageReport.ListReportPage', compact('ReportRecord'));
    }
}
