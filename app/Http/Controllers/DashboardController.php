<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\PostServices;
use App\Services\ProjectServices;
use App\Services\EnquiryServices;
use App\Services\TestimonialServices;

class DashboardController extends Controller
{
    protected $projectServices;
    protected $postServices;
    protected $enquiryServices;
    protected $testimonialService;

       public function __construct(
        PostServices $postServices,
        ProjectServices $projectServices,
        EnquiryServices $enquiryServices,
        TestimonialServices $testimonialService,
        ){
        $this->postServices =$postServices;
        $this->projectServices = $projectServices;
        $this->enquiryServices = $enquiryServices;
        $this->testimonialService =$testimonialService;
    }

    // Index Dashboard
    public function index(){
        try {
            //code...
            $posts = $this->postServices->getAllPosts();
            $projects = $this->projectServices->getAllProjects();
            $enquires = $this->enquiryServices->getAllEnquiries();
            $testimonials = $this->testimonialService->getAllTestimonials();

            $postsData = $posts['data'] ?? [];
            $projectsData = $projects['data'] ?? [];
            $enquiresData = $enquires['data'] ?? [];
            $testimonialsData = $testimonials['data'] ?? [];

            $totalPosts =count($postsData);
            $totalProjects =count($projectsData);
            $totalEnquiry =count($enquiresData);
            $totalTestimonials =count($testimonialsData);

            $data=[
                'posts'=>$totalPosts,
                'projects'=>$totalProjects,
                'enquiries'=>$totalEnquiry,
                'testimonials'=>$totalTestimonials
            ];
            return view('Admin.Pages.dashboard',compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }
}
