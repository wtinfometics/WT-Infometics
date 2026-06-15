<?php

namespace App\Services;

use App\Models\Testimonial;

class TestimonialServices {

 // Create New Testimonial
    public function createTestimonial($data){
        $saveTestimonial=Testimonial::create($data);
        if (!$saveTestimonial) {
            # If Testimonial Not Created
            return [
                'success'=>false,
                'message'=>' Unable To Create The Testimonial',
                'status'=>400
            ]; 
        } else {
            # If New Testimonial Created
            return [
                'success'=>true,
                'message'=>'New Testimonial Created Successfully',
                'status'=>200
            ]; 
        }
    }

    // Get All Testimonials
    public function getAllTestimonials($data){
        $testimonials=Testimonial::latest()->get();
        if (!$testimonials->count()>0) {
            # If Testimonials Empty
            return [
                'success'=>false,
                'message'=>'Testimonials Empty',
                'status'=>400
            ]; 
        } else {
            # If New Testimonials Exists
            return [
                'success'=>true,
                'data'=>$testimonials,
                'status'=>200
            ]; 
        }
    }

    // Get Testimonial
    public function getTestimonial($id){
        return $this->checkTestimonial($id);
    }

    // Update Testimonial
    public function updateTestimonial($id){
        $testimonial=$this->checkTestimonial($id);
        if (!$testimonial['success']) {
            # if Testimonial Exists
            return $testimonial;
        } else {
            # if Testimonial Exists
            $testimonialData=$testimonial['data'];
            $updateTestimonial=$testimonialData->update($data);
            if (!$updateTestimonial) {
                # If Testimonial Not Updated
                return [
                    'success'=>false,
                    'message'=>'Testimonial Not Updated',
                    'status'=>400
                ];
            } else {
                # If Testimonial Is Updated
                return [
                    'success'=>true,
                    'message'=>'Testimonial Updated Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Delete  Testimonial
    public function deleteTestimonial($data){
        $testimonial=$this->checkTestimonial($id);
        if (!$testimonial['success']) {
            # if Testimonial Exists
            return $testimonial;
        } else {
            # if Testimonial Exists
            $testimonialData=$testimonial['data'];
            $deleteTestimonial=$testimonialData->delete();
            if (!$deleteTestimonial) {
                # If Testimonial Not Deleted
                return [
                    'success'=>false,
                    'message'=>'Testimonial Not Deleted',
                    'status'=>400
                ];
            } else {
                # If Testimonial Is Deleted
                return [
                    'success'=>true,
                    'message'=>'Testimonial Deleted Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Check Testimonial
    public function checkTestimonial($id){
        $testimonial=Testimonial::find($id);
        if (!$testimonial) {
            # if Testimonial Exists
            return [
                'success'=>false,
                'message'=>'This Testimonial Not Exists',
                'status'=>404
            ];
        } else {
            # if Testimonial Exists
            return [
                'success'=>true,
                'data'=>$testimonial,
                'status'=>200
            ];
        }
    }
    
}
