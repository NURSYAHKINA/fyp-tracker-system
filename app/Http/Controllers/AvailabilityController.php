<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\AvailabilityRecord;
use App\Models\TimeRecord;
use Illuminate\Http\Request;


class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAvailability()
    {
        return view('ManageAvailability.IndexAvailabilityPage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAvailability()
    {
        return view('ManageAvailability.AddAvailabilityPage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAvailability(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|unique:availabilities,date,NULL,id,user_id,' . Auth::id(),
            'time' => 'required'
        ]);
        

        $availabilitiesData = AvailabilityRecord::create([
            'user_id' => auth()->user()->id,
            'date' => $request->date
        ]);

        foreach($request->time as $times ){
            TimeRecord::create([
                'availabilities_id'=> $availabilitiesData->id,
                'time' => $times,
                'status' => 1
            ]);

        }
        return redirect()->back()->with('message', 'Availabilities Created for ' . $request->date);

    }

    /**
     * Display the specified resource.
     */
    public function viewAvailability($id)
    {
        $availabilityData = AvailabilityRecord::find($id);
    }


    public function ListAvailability($id)
    {
        $availabilityInfo = AvailabilityRecord::with('role')->where('user_id', $id)->get();

        return view('ManageAvailability.AvailabilityListPage', [
            'availabilityInfo' => $availabilityInfo,
            'id' => $id,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkAvailability(Request $request)
    {
        $date = $request->date;
        $availability = AvailabilityRecord::where('date',$date)->where('user_id', auth()->user()->id)->first();

        if(!$availability){
            return redirect()->to('/availability')->with('errmessage','Appointment time is not available for this date.' );
        }

        $availabilityId = $availability->id;
        $times = TimeRecord::where('availabilities_id',$availabilityId)->get();

        return $times;
        return view ('ManageAvailability.IndexAvailabilityPage',compact('times','availabilityId','date'));
    }
}
