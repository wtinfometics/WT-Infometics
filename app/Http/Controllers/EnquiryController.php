<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EnquiryValidator;

use App\Services\EnquiryServices;
use App\Helpers\PaginationHelper;

class EnquiryController extends Controller
{
    protected $enquiryService;

    // Inject Enquiry Service using constructor
    public function __construct(EnquiryServices $enquiryService){
        $this->enquiryService = $enquiryService;
    }

    // store New  Enquiry
    public function store(Request $request){
        try {
            // dd($request->all());
            $validate=EnquiryValidator::validate($request,$request->route()->getName());
            
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation Pass
                $data= $validate->validated();
                $saveEnquiry=$this->enquiryService->createEnquiry($data);
                if ($saveEnquiry['success']) {
                return redirect('/')->with('success', $saveEnquiry['message']);
            }
            return redirect()->back()->with('error', $saveEnquiry['message'])->withInput();
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Index Enquiries
    public function index(){
        try {
            //code...
            $contacts=$this->enquiryService->getAllEnquiries();
            $success = $contacts['success'] ?? false;
            $message = $contacts['message'] ?? '';
            $data    = $contacts['data'] ?? [];
            $paginatedData = PaginationHelper::paginate($data, 2);
            return view('Admin.Pages.enquires', compact('success', 'message', 'paginatedData'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // View Enquiry
    public function view($enquiry_id){
        try {
            //code...
            $contacts=$this->enquiryService->getEnquiry($enquiry_id);
            $success = $contacts['success'] ?? false;
            $message = $contacts['message'] ?? '';
            $data    = $contacts['data'] ?? [];
            return view('Admin.Pages.enquiry-view', compact('success', 'message', 'data'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Delete Enquiry
    public function delete($enquiry_id){
        try {
            //code...
            $deleteContact = $this->enquiryService->deleteEnquiry($enquiry_id);
            $success = $deleteContact['success'] ?? false;
            $message = $deleteContact['message'] ?? '';
            if ($success) {
                return redirect('/admin/enquiries/')->with('success',$message);
            } else {
                return redirect()->back()->with('error',$message)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }
}
