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
        $ReportRecord = ReportRecord::all()
        ->where('reports.user_id', '=', $currID);

        return view('ManageReport.ListReportPage', compact('ReportRecord'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addReport()
    {
        $reports = FeedbackRecord::select('feedbacks.comment', 'feedbacks.names')
            //->join('users', 'users.id', '=', 'feedbacks.user_id')
            ->groupBy('feedbacks.comment', 'feedbacks.names')
            ->pluck('feedbacks.comment', 'feedbacks.names')
            ->all();

        $users = UserRecord::select('users.name')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.id', 3) // Filter by role_id equal to 3
            ->groupBy('users.name')
            ->pluck('users.name')
            ->all();

        return view('ManageReport.AddReportPage', compact('reports', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeReport(Request $request)
    {
        $currUser = Auth::user()->id;
       
        $name = $request->input('names');
        $date = now();
        $feedback = $request->input('feedback');

       
        $user_id = $currUser;

        $Reportdata = array(

            'user_id' => $user_id,
            'name' => $name,
            'date' => $date,
            'feedback' => $feedback,
        );

        DB::table('reports')->insert($Reportdata);
        return back()->with('success', 'Report successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function viewReport(Request $request, string $id)
    {
        $ReportInfo = ReportRecord::where('id', $id)->first();

        // dd($ReportInfo);
        $userInfo = UserRecord::all(); // Fetch user from the database

        return view('ManageReport.ViewReportPage', compact('ReportInfo', 'userInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editReport(string $id)
    {
        //$userInfo = UserRecord::all(); // Fetch user from the database
        $ReportInfo = ReportRecord::where('id', $id)->first();

        return view('ManageReport.EditReportPage', compact('ReportInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateReport(Request $request, string $id)
    {
         // Update report info from the database
         $updateReportInfo = ReportRecord::findOrFail($id);

         $validatedData = $request->validate([
            'name' => 'required|string',
            'feedback' => 'required|string',
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
                'id_matric',
                'name',
                'date',
                'feedback',
            )
            //->orderBy('asc')
            ->get();

        return view('ManageReport.ListReportPage', compact('ReportRecord'));
    }
}
