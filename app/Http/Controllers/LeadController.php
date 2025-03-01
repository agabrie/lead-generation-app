<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    //
    public function createLead(Request $request){
        $lead = new Lead();
        $lead->first_name = $request->first_name;
        $lead->last_name = $request->last_name;
        $lead->email = $request->email;
        $lead->phone_number = $request->phone_number;
        $lead->address_line_1 = $request->address_line_1;
        $lead->address_line_2 = $request->address_line_2;
        $lead->city = $request->city;
        $lead->province = $request->province;
        $lead->country = $request->country;
        $lead->postal_code = $request->postal_code;
        $lead->consent_email_marketing = $request->consent_email_marketing;
        $lead->consent_ts_and_cs = $request->consent_ts_and_cs;
        $lead->lead_id = uniqid();
        $lead->save();
        dispatch(new SendEmailJob($lead));
        return response()->json(["lead"=>$lead, "message"=>"Lead Generated"]);
    }
}
