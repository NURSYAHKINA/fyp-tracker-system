<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAppointment()
    {
        //$appointment = AppointmentRecord::all();
        return view('ManageAppointment.HomeAppointmentPage'//, ["appointment" => $appointment]
    );
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function viewAppointment(string $id)
    {
        $post = AppointmentRecord::all();

        return view(

            'ManageAppointment.ListAppointmentPage',
            compact('post')


        );
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
        DB::delete('delete from appointments where id = ?', [$id]);

        return redirect()->back();
    }
}
