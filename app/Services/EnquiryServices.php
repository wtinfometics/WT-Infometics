<?php

namespace App\Services;

use App\Models\Enquiry;

class EnquiryServices {

    // Create New Enquiry
    public function createEnquiry($data){
        $saveEnquiry=Enquiry::create($data);
        if (!$saveEnquiry) {
            # If Enquiry Not Created
            return [
                'success'=>false,
                'message'=>' Unable To Create The Enquiry',
                'status'=>400
            ]; 
        } else {
            # If New Enquiry Created
            return [
                'success'=>true,
                'message'=>'New Enquiry Created Successfully',
                'status'=>200
            ]; 
        }
    }

    // Get All Enquiries
    public function getAllEnquiries(){
        $enquires=Enquiry::latest()->get();
        if (!$enquires->count()>0) {
            # If Enquires Empty
            return [
                'success'=>false,
                'message'=>'Enquires Empty',
                'status'=>400
            ]; 
        } else {
            # If New Enquires Exists
            return [
                'success'=>true,
                'data'=>$enquires,
                'status'=>200
            ]; 
        }
    }

    // Get Enquiry
    public function getEnquiry($id){
        return $this->checkEnquiry($id);
    }

    // Delete Enquiry
    public function deleteEnquiry($id){
        $Enquiry=$this->checkEnquiry($id);
        if (!$Enquiry['success']) {
            # if Enquiry Exists
            return $Enquiry;
        } else {
            # if Enquiry Exists
            $EnquiryData=$Enquiry['data'];
            $deleteEnquiry=$EnquiryData->delete();
            if (!$deleteEnquiry) {
                # If Enquiry Not Deleted
                return [
                    'success'=>false,
                    'message'=>'Enquiry Not Deleted',
                    'status'=>400
                ];
            } else {
                # If Enquiry Is Deleted
                return [
                    'success'=>true,
                    'message'=>'Enquiry Deleted Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Check Enquiry
    public function checkEnquiry($id){
        $Enquiry=Enquiry::find($id);
        if (!$Enquiry) {
            # if Enquiry Exists
            return [
                'success'=>false,
                'message'=>'This Enquiry Not Exists',
                'status'=>404
            ];
        } else {
            # if Enquiry Exists
            return [
                'success'=>true,
                'data'=>$Enquiry,
                'status'=>200
            ];
        }
    }
}
