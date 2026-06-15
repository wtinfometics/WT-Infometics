<?php

namespace App\Services;

use App\Models\Contact;

class ContactServices {

    // Create New Contact
    public function createContact($data){
        $saveContact=Contact::create($data);
        if (!$saveContact) {
            # If Contact Not Created
            return [
                'success'=>false,
                'message'=>' Unable To Create The Contact',
                'status'=>400
            ]; 
        } else {
            # If New Contact Created
            return [
                'success'=>true,
                'message'=>'New Contact Created Successfully',
                'status'=>200
            ]; 
        }
    }

    // Get All Contacts
    public function getAllContacts($data){
        $contacts=Contact::latest()->get();
        if (!$contacts->count()>0) {
            # If Contacts Empty
            return [
                'success'=>false,
                'message'=>'Contacts Empty',
                'status'=>400
            ]; 
        } else {
            # If New Contacts Exists
            return [
                'success'=>true,
                'data'=>$contacts,
                'status'=>200
            ]; 
        }
    }

    // Get Contact
    public function getContact($id){
        return $this->checkContact($id);
    }

    // Delete Contact
    public function deleteContact($id){
        $Contact=$this->checkContact($id);
        if (!$Contact['success']) {
            # if Contact Exists
            return $Contact;
        } else {
            # if Contact Exists
            $ContactData=$Contact['data'];
            $deleteContact=$ContactData->delete();
            if (!$deleteContact) {
                # If Contact Not Deleted
                return [
                    'success'=>false,
                    'message'=>'Contact Not Deleted',
                    'status'=>400
                ];
            } else {
                # If Contact Is Deleted
                return [
                    'success'=>true,
                    'message'=>'Contact Deleted Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Check Contacts
    public function checkContact($id){
        $Contact=Contact::find($id);
        if (!$Contact) {
            # if Contact Exists
            return [
                'success'=>false,
                'message'=>'This Contact Not Exists',
                'status'=>404
            ];
        } else {
            # if Contact Exists
            return [
                'success'=>true,
                'data'=>$Contact,
                'status'=>200
            ];
        }
    }

}
