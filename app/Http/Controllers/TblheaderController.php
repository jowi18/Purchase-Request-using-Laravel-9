<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Tbldetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tblheader;
use App\Models\Tbllog;
use App\Models\Tblstatus;
use App\Models\Tbluom;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Agent\Facades\Agent;
class TblheaderController extends Controller
{

    public function requestform(){
        $secondsAgo = 10;
        $data = Tbluom::all();
      
    
        $title = '/ Request Form';
        return view('request.create', ['data' => $data, 'title' => $title]);
    }

    public function submit(Request $request)
    {
        $rules = [
            'req_particulars' => 'required',
            'req_description' => 'required',
            'qty' => 'required|numeric|min:1',
            'uom' => 'required',
            'date_needed' => 'required|date|after_or_equal:today',
            'req_remarks' => 'nullable',
            'req_image' => 'nullable|mimes:pdf,png,jpg,jpeg|max:2048',
        ];

        // Validate the input against the rules
       
        $validatedData = $request->validate($rules);
        if($request->hasfile('req_image')){
            $imagePath = $request->file('req_image')->store('particular_image','public');
            $validatedData['req_image'] = $imagePath; // add the image path to the validated data
        }
        $rows = session('rows', []);
        $rows[] = $validatedData;

        session(['rows' => $rows]);
            return back();
    }

    public function store(Request $request){
        $agent= new Agent();
      //  $user_device = $agent->device();
       
        $date = Carbon::now('GMT+8');
        $user_id = Auth::id();
        $user_department = auth()->user()->department;
        $user_ipAddress = request()->ip();
        $findVerifier = User::where('department', $user_department)->where('user_level', 2)->first();
        $nameOfVerifier = $findVerifier->name;
      
        $requestHeader = Tblheader::create([
            'user_id' => $user_id,
            'department' => auth()->user()->department, 
            'status_id' => 1,
            'approver_status' => 'pending',
            'approve_date' => NOW(),
            'date_created' => $date
        ]);

        $status = Tblstatus::create([
            'tblheader_id' => $requestHeader->id,
            'status_code' => 'pending',
            'dateOfAction' => $date,
        ]);

        $logs = Tbllog::create([
            'user_id' => $user_id,
            'department' => $user_department,
            'device_ipAddress' => $user_ipAddress,
            'action' => 'submit request',
            'logs_date' => $date
        ]);
        
    $request->has('send_request');
    $rows = session('rows');

    foreach($rows as $row){
        $reqImage = !empty($row['req_image']) ? $row['req_image'] : 'NA';
        Tbldetail::insert([
            'tblheader_id' => $requestHeader->id,
            'req_particulars' => $row['req_particulars'],
            'req_description' => $row['req_description'],
            'qty' => $row['qty'],
            'uom' => $row['uom'],
            'date_needed' => $row['date_needed'],
            'req_remarks' => $row['req_remarks'],
            'req_image' => $reqImage,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

    }
    $secondsAgo = 10;
    $controlNo = DB::table('tblheaders')
    ->where('created_at', '>=', now()->subSeconds($secondsAgo))
    ->first();
    if ($controlNo) {
        // Records found
        $controlNoId = $controlNo->pr_no;
        $controId = $controlNo->id;
    } else {
        // No records found
        $controlNoId =  $controlNo = '';
    }

     $rows = session('rows');
            foreach($rows as $index=>$row){
            unset($rows[$index]);
    }
            session(['rows' => $rows]);

           $url = '/pdfview'.'/'.$controId;
            //$script = "window.open('{$url}', '_blank');";
            //return redirect()->away($url)->with('_blank');
          //  return response($url);
          return back()->with([
            'messages' => 'Submit Request',
            'controlNo' => $controlNoId,
            'controlId' => $controId,
            'new_window_url' => $url
        ]);
          
    }

    public function removeRow($index)   
    {
            $rows = session('rows', []);
            array_splice($rows, $index, 1);
            session(['rows' => $rows]);
            return back();
    }
//EDIT, UPDATE AND REMOVE 
    public function editRequest($id){
            $title = '/ Edit Request';
            $data = Tbluom::all();
            $requestData = Tbldetail::where('tblheader_id', $id)->get();
            return view('request.edit', ['rows' => $requestData, 'title' => $title, 'data' => $data]);
    }

    public function updateRequest(Request $request, $itemid){
     
        foreach($request->request_id as $key=>$req){
            $requst_id['id'] = $request->request_id[$key];
            $requst_id['req_particulars']  = $request->req_particulars[$key];
            $requst_id['req_description']  = $request->req_description[$key];
            $requst_id['qty'] = $request->qty[$key];
            $requst_id['uom']  = $request->uom[$key];
            $requst_id['date_needed']  =  $request->date_needed[$key];;
            $requst_id['req_remarks']  = $request->req_remarks[$key];
            DB::table('tbldetails')->where('id',$request->request_id[$key])->update($requst_id);
    }       
            $user_id = Auth::id();
            $user_department = auth()->user()->department;
            $date = Carbon::now('GMT+8');
            $user_ipAddress = $request->ip();
            $logs = Tbllog::create([
            'user_id' => $user_id,
            'department' => $user_department,
            'device_ipAddress' => $user_ipAddress,
            'action' => 'update the request',
            'logs_date' => $date
        ]);
            return back()->with('messages', 'Request has been Updated');
    }

    public function destroyRequest($id){
                $record = Tbldetail::findOrFail($id);
                $record->delete();
                return response()->json(['success' => true]);

    }//END OF EDIT AND REMOVE 


//ALL THE DATA IS DISPLAYED FOR EXECUTIVES
    public function getDataTable(Request $request){ 
                $status = $request->query('btnradio');
                
                $title = '/ Manage Request';
                $approvers = User::where('user_level', '>', 3)->get();
                $user_level = auth()->user()->user_level;
                $q = request('q');
                $user_department = auth()->user()->department;
                $items = Tblheader::with('detail', 'user', 'status')
                ->WhereHas('user', function($q){
                    $q->where('user_level', '>=', 1);
                
                })
                ->WhereHas('status', function($q) use ($status){
                    if($status){
                    $q->where('status_code', $status);
                    }
                
                })
                /*->WhereHas('status', function($q){
                $q->where('status_code', '!=', 'pending');
                    
                })*/
               ->orderBy('date_created', 'desc')
                ->get();
              
       return view('request.tableview', compact('items', 'title', 'approvers'));
    }

//ONLY THE DEPARTMENT REQUEST IS DISPLAYED
    public function getDepartmentDataTable(Request $request){
        
                $q = request('q');
                $user_department = auth()->user()->department;
                $title =  '/ ' .$user_department. ' Department Request';
                $approvers = User::where('user_level', '>', 3)->get();
                $items = Tblheader::with('detail', 'user', 'status')->where('department', $user_department)->orderBy('date_created', 'desc')
                ->get();

                return view('request.departmentTable', compact('items', 'title', 'approvers'));
    }


//ONLY THE CREATOR REQUEST IS DISPLAYED
    public function getMyRequestTable(Request $request){
                $title = '/ My Request';
                $user_id = Auth::id();
                $q = request('q');
                $user_department = auth()->user()->department;
                $items = Tblheader::with('detail', 'user', 'status')->where('user_id', $user_id)->orderBy('date_created', 'desc')->get();
                return view('request.myrequest', compact('items', 'title'));
    }

//LOGS TABLE
    public function prlogsTable(Request $request){
                $user_id = Auth::id();
                $title = '/ Logs';
                $user_department = auth()->user()->department;
                $query = Tbllog::with('user');
                $start_date = request()->input('start_date');
                $end_date = request()->input('end_date');

if (!empty($start_date) && !empty($end_date)) {
    $query->whereBetween('logs_date', [$start_date, $end_date]);
}
                $logs = $query->orderBy('logs_date', 'desc')->get();
                return view('request.prlogs', compact('logs', 'title'));
    }

//VERIFY FUNCTION
    public function verifyRequest(Request $request ,$id){   
                $approver = $request->input('approver');
                $headerid = Tblstatus::find($id);
                $date = Carbon::now('GMT+8');
                $user_id = Auth::id();
                $verifierName = auth()->user()->name;
        
        $updateStatus = Tblstatus::where('tblheader_id', $id)->update([
                'user_id' => $user_id,
                'dateOfAction' => $date,
                'approver' => $approver,
                'verifyby' => $verifierName,
                'status_code' => 'verified'    
        ]);
                $user_department = auth()->user()->department;
                $user_ipAddress = $request->ip();
                $logs = Tbllog::create([
                'user_id' => $user_id,
                'department' => $user_department,
                'device_ipAddress' => $user_ipAddress,
                'action' => 'verify the request',
                'logs_date' => $date
        ]);
       
        return back()->with('messages', 'Request has been Verified');
    }

//APPROVE REQUEST FUNCTION
    public function approveRequest(Request $request, $id){
                $date = Carbon::now('GMT+8');
                $user_id = Auth::id();
                $approver_name = auth()->user()->name;
                $status = Tblstatus::where('tblheader_id', $id)->update([
                'user_id' => $user_id,
                'dateOfAction' => $date,
                'status_code' => 'approved',
                'approveby' => $approver_name
        ]);

        return back()->with('messages', 'Request has been Approved');
    }
//PASS TO NEXT APPROVER FUNCTION
    public function nextApprover(Request $request, $id){
                $approver = $request->input('approver');
                $date = Carbon::now('GMT+8');
                $user_id = Auth::id();
                $status = Tblstatus::where('tblheader_id', $id)->update([
                'user_id' => $user_id,
                'dateOfAction' => $date,
                'status_code' => 'under approval',
                'approver' => $approver
        ]);
                return back()->with('messages', 'Request has been Passed');
    }
//REJECT REQUEST FUNCTION
    public function rejectRequest(Request $request,$id){
                $approver_name = auth()->user()->name;
                $date = Carbon::now('GMT+8');
                $user_id = Auth::id();
                $status = Tblstatus::where('tblheader_id', $id)->update([
                'user_id' => $user_id,
                'dateOfAction' => $date,
                'status_code' => 'Rejected',
                'approveby' => $approver_name
        ]);
                $user_department = auth()->user()->department;
                $user_ipAddress = $request->ip();
                $logs = Tbllog::create([
                'user_id' => $user_id,
                'department' => $user_department,
                'device_ipAddress' => $user_ipAddress,
                'action' => 'reject the request',
                'logs_date' => $date
        ]);
                 return back()->with('messages', 'Request has been Rejected');
    }

}
