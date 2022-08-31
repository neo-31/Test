<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Leadnotes;
use Illuminate\Support\Facades\Auth;


class LeadController extends Controller
{
    public function index()
    {
        $alllead = Lead::where('is_deleted','1')->orderBy('id')->get();
        return view('admin.pages.lead_applications',compact('alllead'));
    }

    public function GetLeadAppInfo($id)
    {
        $lead=Lead::findOrFail($id);
        $lead_notes = Leadnotes::where('lead_id',$id)->where('is_deleted','1')->orderBy('id', 'DESC')->get()->toJson();
        $lead_notes_created_by = Leadnotes::where('lead_id',$id)->where('is_deleted','1')->orderBy('id', 'desc')->get();
        $created_by_info=[];
            foreach($lead_notes_created_by as $created_by)
            {
                $created_by_info[]=[
                            'id' => $created_by->id,
                            'created_by' => getUserInfo($created_by->created_by)->name]; 
            }
         return compact('lead','lead_notes','created_by_info');
    }

    public function create()
    {
        return view('admin.pages.add_lead_applications');
    }

    public function addlead(Request $request)
    {
        $data =  \Request::except(array('_token'));

        $rule=array(
                'firstname' => 'required',
                'lastname' =>'required',
                'email'=>'required',
                'telephone' => 'required',
                'business_name' => 'required',
                'website' => 'required',
                'employee_size' => 'required',
                'linkedIn_company' => 'required',
                'source' => 'required',
                'lead_status' => 'required'
           		 );

           $validator = \Validator::make($data,$rule);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }

        $lead=new Lead();
        $lead->firstname=$request->firstname;
        $lead->lastname=$request->lastname;
        $lead->contact_name = $request->firstname ." ". $request->lastname;
        $lead->email=$request->email;
        $lead->telephone=$request->telephone;
        $lead->business_name=$request->business_name;
        $lead->website=$request->website;
        $lead->employee_size=$request->employee_size;
        $lead->linkedIn_company=$request->linkedIn_company;
        $lead->source=$request->source;
        $lead->comments=$request->comments;
        $lead->interest=$request->interest;
        $lead->lead_status=$request->lead_status;

        $lead->save();
        UserActivitiesLog('Created', $lead->id, 'Lead');
        \Session::flash('flash_message', 'Added');
        return redirect('admin/lead-applications');
    }

    public function edit($id)
    {
        $lead=Lead::find($id);
        $lead_notes = Leadnotes::where('lead_id',$id)->where('is_deleted','1')->orderBy('id')->get();
        return view('admin.pages.edit_lead_applications',compact('lead','lead_notes'));
    }

    public function updatelead($id,Request $request)
    {
        $data =  \Request::except(array('_token'));

        $rule=array(
                'firstname' => 'required',
                'lastname' =>'required',
                'email'=>'required',
                'telephone' => 'required',
                'business_name' => 'required',
                'website' => 'required',
                'employee_size' => 'required',
                'linkedIn_company' => 'required',
                'source' => 'required',
                'lead_status' => 'required'
           		 );

           $validator = \Validator::make($data,$rule);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }

        $lead=Lead::find($id);
        $lead->firstname=$request->firstname;
        $lead->lastname=$request->lastname;
        $lead->contact_name = $request->firstname ." ". $request->lastname;
        $lead->email=$request->email;
        $lead->telephone=$request->telephone;
        $lead->business_name=$request->business_name;
        $lead->website=$request->website;
        $lead->employee_size=$request->employee_size;
        $lead->linkedIn_company=$request->linkedIn_company;
        $lead->source=$request->source;
        $lead->comments=$request->comments;
        $lead->interest=$request->interest;
        $lead->lead_status=$request->lead_status;

        $lead->save();
        UserActivitiesLog('Updated', $lead->id, 'Lead');
        \Session::flash('flash_message', 'Update successfully');
        return redirect('admin/lead-applications');
    }


    public function delete($id)
    {
        $lead=Lead::find($id);
        $lead->is_deleted='0';
        $lead->save();
        UserActivitiesLog('Soft Delete', $lead->id, 'lead');
        \Session::flash('flash_message', 'Deleted successfully');
        return redirect('admin/lead-applications');
    }

    public function update_response(Request $request)
    {
        $lead=Lead::find($request->id);
        $lead->interest=$request->interest;
        $lead->subscribe=$request->subscribe;
        $lead->save();
        UserActivitiesLog('Updated', $lead->id, 'lead');
        \Session::flash('flash_message', 'Update successfully');
        return redirect('admin/lead-applications');
    }
    
     public function recycle_bin_lead()
    {
        $Lead=Lead::where('is_deleted','0')->get();
        return view('admin.pages.leadtrash',compact('Lead'));
    }

    public function restore_lead($id)
    {
        $Lead=Lead::find($id);
        $Lead->is_deleted='1';
        $Lead->save();
        UserActivitiesLog('Restore', $Lead->id, 'Lead');
        \Session::flash('flash_message', 'Restore');
        return redirect('admin/lead-applications/trash');
    }

    public function hard_delete_lead($id)
    {
        $Lead=Lead::find($id);
        $Lead->is_deleted='2';
        $Lead->save();
        UserActivitiesLog('Permanent Delete', $Lead->id, 'Lead');
        \Session::flash('flash_message', 'Deleted successfully');
        return redirect('admin/lead-applications/trash');
    }
    
     public function lead_notes(Request $request)
    {
      
      
        $data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
	    // $rule=array(' lead_notes' => 'required');
	   	// $validator = \Validator::make($data,$rule);

        // if ($validator->fails()){
        //     return redirect()->back()->withErrors($validator->messages());
        // }

        $lead_notes = new Leadnotes;
		$lead_notes->lead_id = $inputs['lead_id'];
		$lead_notes->lead_note = $inputs['lead_note'];
		$lead_notes->created_by = Auth::user()->id;
        $lead_notes->save();

        UserActivitiesLog('Permanent Delete', $lead_notes->id, 'Leadnotes');
        \Session::flash('flash_message', 'Add successfully');
         return redirect('admin/lead-applications');
    }
}
