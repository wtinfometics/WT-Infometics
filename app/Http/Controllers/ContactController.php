<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactValidator;
use Illuminate\Support\Facades\Log;

use App\Services\ContactServices;
use App\Helpers\PaginationHelper;

class ContactController extends Controller
{
     protected $contactService;

    // Inject Contact Service using constructor
    public function __construct(ContactServices $contactService){
        $this->contactService = $contactService;
    }

    // Store Contact Message
    public function store(Request $request){
        $validate=ContactValidator::validate($request,$request->route()->getName());

        if ($validate->fails()) {
            # If Input validation Fails
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            # If Input validation Fails
            $data=$validate->validated();
            $saveContact = $this->contactService->createContact($data);
            if ($saveContact['success']) {
                return redirect('/contact')->with('success', $saveContact['message']);
            }
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // View All Contacts
    public  function index(){
        try {
            //code...
            $contacts=$this->contactService->getAllContacts();
            $success = $contacts['success'] ?? false;
            $message = $contacts['message'] ?? '';
            $data    = $contacts['data'] ?? [];
            $paginatedData = PaginationHelper::paginate($data, 2);
            return view('Admin.Pages.contacts', compact('success', 'message', 'paginatedData'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // View Contact Message
    public function view($contact_id){
        try {
            //code...
            $contact=$this->contactService->getContact($contact_id);
            $success = $contact['success'] ?? false;
            $message = $contact['message'] ?? '';
            $data    = $contact['data'] ?? [];
            return view('Admin.Pages.contact-view', compact('success', 'message', 'data'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }
    
    // Delete Contacts
    public  function delete($contact_id){
        try {
            //code...
            $deleteContact = $this->contactService->deleteContact($contact_id);
            $success = $deleteContact['success'] ?? false;
            $message = $deleteContact['message'] ?? '';
            if ($success) {
                return redirect('/admin/contacts/')->with('success',$message);
            } else {
                return redirect()->back()->with('error',$message)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

}
