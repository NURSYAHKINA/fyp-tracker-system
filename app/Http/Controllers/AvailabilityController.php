<?php

namespace App\Http\Controllers;

use App\Models\AvailabilityRecord;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAvailability()
    {
       
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
        // Create a new AvailabilityModel instance
        $availabilityData = new AvailabilityRecord();

        //$availabilityData->user_id;
        $availabilityData->availability_id;
        $availabilityData->time = $request->input('date');

          // Save the new availabilityData instance
          $availabilityData->save();

          return redirect()->route('ListAvailability');

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
}
