<?php

namespace App\Services;

use App\Models\Testimonial;

use App\Services\ImageServices;

class TestimonialServices {

    protected $imageService;
    public $folder='Testimonials';

    // Inject Image service using constructor
    public function __construct(ImageServices $imageService){
        $this->imageService = $imageService;
    }

 // Create New Testimonial
    public function createTestimonial($data,$image){
        $fileName=$this->checkImage($data,$image);          #  Save The Featured Image
        $data['profile_img']=$fileName;
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
    public function getAllTestimonials(){
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
    public function updateTestimonial($id,$data,$image){
        $testimonial=$this->checkTestimonial($id);
        if (!$testimonial['success']) {
            # if Testimonial Exists
            return $testimonial;
        } else {
            # if Testimonial Exists
            $testimonialData=$testimonial['data'];
             if (! empty($image)) {
                # If Image Exists
                $profile=$postData->profile_img;
                $this->imageService->deleteFile($profile);        # Delete the Existing Featured Image
                $fileName=$this->checkImage($data,$image);              # Save Featured Image
                $data['profile_img']=$fileName;
            }
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
    public function deleteTestimonial($id){
        $testimonial=$this->checkTestimonial($id);
        if (!$testimonial['success']) {
            # if Testimonial Exists
            return $testimonial;
        } else {
            # if Testimonial Exists
            $testimonialData=$testimonial['data'];
            $profile=$testimonialData->profile_img;
            $this->imageService->deleteFile($profile);  
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
    
       // check Image
    protected function checkImage($data,$image){
        $postName=$data['name'];
        $fileName=$this->imageService->saveFile($image,$this->folder,$postName);
        return $fileName;
    }
}
