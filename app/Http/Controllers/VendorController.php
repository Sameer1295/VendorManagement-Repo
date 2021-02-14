<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Mail;
use App\Mail\EmailVerficationMail;
use Illuminate\Support\Str;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendor.index',[
            'vendors' => $vendors
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = $request->all();
        $request->validate([
            'name' => 'required',
            'address'=> 'required',
            'phone_number'=> 'required',
            'mobile_number'=> 'required',
            'fax'=> 'required',
            'gst_certificate'=> 'required',
            'company_certificate'=> 'required',
            'pan'=> 'required',
            'adhaar'=> 'required',
            'email'=> 'required',
            'contact_person'=> 'required',
            'contact_person_mobile'=> 'required',
            'contact_person_email'=> 'required'
            
        ]);
        
        

        $file = $request->file('gst_certificate');
        $filename = $file->getClientOriginalName();
        $filename = time().'.'.$filename;

        $path = $file->storeAs('public',$filename);

        $file2 = $request->file('company_certificate');
        $filename2 = $file2->getClientOriginalName();
        $filename2 = time().'.'.$filename2;

        $path = $file2->storeAs('public',$filename2);

        $file3 = $request->file('pan');
        $filename3 = $file3->getClientOriginalName();
        $filename3 = time().'.'.$filename3;

        $path = $file3->storeAs('public',$filename3);

        $file4 = $request->file('pan');
        $filename4 = $file4->getClientOriginalName();
        $filename4 = time().'.'.$filename4;

        $path = $file4->storeAs('public',$filename4);
        //changing request input values of documents fields with generated file names
        $request->merge([
            'gst_certificate'=>$filename,
            'company_certificate'=>$filename2,
            'pan'=>$filename3,
            'adhaar'=>$filename4,
            'email_verification_code'=>Str::random(40)
            ]);
        //dd($request->all());
        
        $vendor = Vendor::create($request->all());
        
        Mail::to($request->email)->send(new EmailVerficationMail($vendor));
        return redirect()->route('vendor.index')->with('success','Your application has been submitted successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Vendor::find($id)
        //         ->where('status',0|2)
        //         ->update(['status' =>'1']);
        // return redirect()->route('vendor.index')->with('success','Request is accepted for vendor');
        $vendor = Vendor::find($id);
        return view('vendor.show',[
            'vendor' => $vendor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Vendor::find($id)
        ->where('status',0|1)
        ->update(['status' =>'2']);
        return redirect()->route('vendor.index')->with('success','Request is rejected for vendor');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        switch ($request->input('action')) {
            case 'accept':
                    $vendor->status = 1;
                    $vendor->save();
                    return redirect()->route('vendor.index')->with('success','Request is accepted for vendor');
                break;
            
            case 'reject':
                    $vendor->status = 2;
                    $vendor->save();
                    return redirect()->route('vendor.index')->with('success','Request is rejected for vendor');
                break;
            
            default:
                return view('vendor.index');
                break;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vendor::find($id)->delete();
        return redirect()->route('vendor.index')->with('success','Vendor deleted successfully');
    }
    
    public function accepted()
    {
        $vendors = Vendor::where('status',1)->get();
        return view('vendor.accepted',[
            'vendors' => $vendors
        ]);
    }

    public function rejected()
    {
        $vendors = Vendor::where('status',2)->get();
        return view('vendor.rejected',[
            'vendors' => $vendors
        ]);
    }

    public function verify_email($verification_code){
        
        $vendor=Vendor::where('email_verification_code',$verification_code)->first();
        if($vendor){
            return redirect()->route('vendor.create')->with('error','Invalid url');
        }else{
            if($vendor->email_verified_at){
            return redirect()->route('vendor.create')->with('error','Email already verified');
            }else{
                $vendor->update([
                    'email_verified_at'=>Carbon::now()
                ]);
                return redirect()->route('vendor.create')->with('success','Email successfully verified');
            }
        }
    }
}
