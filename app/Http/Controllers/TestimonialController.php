<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestimonialValidator;

use App\Services\TestimonialServices;
use App\Helpers\PaginationHelper;

class TestimonialController extends Controller
{

    protected $testimonialService;

    // Inject Project Service using constructor
    public function __construct(TestimonialServices $testimonialService){
        $this->testimonialService = $testimonialService;
    }
    // Index Add Testimonial
    public function indexAddTestimonial(){
        return view('Admin.Pages.add-testimonial');
    }

    // Store Testimonial
    public function Store(Request $request){
        try {
            //code...
             $validate=TestimonialValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Input Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Input Validation Pass
                $data=$validate->validated();
                $image=$data['profile_img'];
                $saveTestimonial = $this->testimonialService->createTestimonial($data,$image,);
                if ($saveTestimonial['success']) {
                    return redirect('/admin/testimonials')->with('success', $saveTestimonial['message']);
                }
                return redirect()->back()->with('error', $saveTestimonial['message'])->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Index Testimonial
    public function index(){
        try {
            //code...
            $testimonials=$this->testimonialService->getAllTestimonials();
            $success = $testimonials['success'] ?? false;
            $message = $testimonials['message'] ?? '';
            $data    = $testimonials['data'] ?? [];
            $paginatedData = PaginationHelper::paginate($data, 2);
            return view('Admin.Pages.testimonials',compact('success', 'message', 'paginatedData'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Edit Testimonial
    public function edit($testimonial_id){
        try {
            //code...
            $testimonial=$this->testimonialService->getTestimonial($testimonial_id);
            $success = $testimonial['success'] ?? false;
            $message = $testimonial['message'] ?? '';
            $data    = $testimonial['data'] ?? [];
            return view('Admin.Pages.add-testimonial',compact('success', 'message', 'data'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Update Testimonial
    public function update(Request $request,$testimonial_id){
        try {
            //code... 
            $validate=TestimonialValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Input Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Input Validation Pass
                $data=$validate->validated();
                $image=$postData['profile_img'] ?? null;
                $updateTestimonial = $this->testimonialService->updateTestimonial($testimonial_id,$data,$image);
                if ($updateTestimonial['success']) {
                    return redirect('/admin/testimonials')->with('success', $updateTestimonial['message']);
                }
                return redirect()->back()->with('error', $updateTestimonial['message'])->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Delete Testimonial
    public function delete($testimonial_id){
        try {
            //code...
            $deleteTestimonial = $this->testimonialService->deleteTestimonial($testimonial_id);
            $success = $deleteTestimonial['success'] ?? false;
            $message = $deleteTestimonial['message'] ?? '';
            if ($success) {
                return redirect('/admin/testimonials/')->with('success',$message);
            } else {
                return redirect()->back()->with('error',$message)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }
}
