<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectValidator;

use App\Services\ProjectServices;
use App\Services\CategoryServices;

class ProjectController extends Controller
{
    protected $projectService;
    protected $categoryService;

    // Inject Project Service using constructor
    public function __construct(ProjectServices $projectService,CategoryServices $categoryService){
        $this->projectService = $projectService;
        $this->categoryService = $categoryService;
    }

    // Index Add Project Page
    public function indexAddProjectPage(){
        $categories=$this->categoryService->getAllCategories();
        $categoryData    = $categories['data'] ?? [];
        return view('Admin.Pages.add-project',compact('categoryData'));
    }

    // Store Project
    public function store(Request $request){
        try {
            //code...
            $validate=ProjectValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation pass
                $data=$validate->validated();
                $data['status']=$request->status;
                $saveProject = $this->projectService->createProject($data);
                if ($saveProject['success']) {
                    return redirect('/admin/projects')->with('success', $saveProject['message']);
                }
                return redirect()->back()->with('error', $saveProject['message'])->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Index Project
    public function index(){
        try {
            //code...
            $project=$this->projectService->getAllProjects();
            $success = $project['success'] ?? false;
            $message = $project['message'] ?? '';
            $data    = $project['data'] ?? [];
            return view('Admin.Pages.projects', compact('success', 'message', 'data'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Edit Project
    public function edit($project_id){
        try {
            //code...
            $project=$this->projectService->getProject($project_id);
            $categories=$this->categoryService->getAllCategories();
            $categoryData    = $categories['data'] ?? [];
            $success = $project['success'] ?? false;
            $message = $project['message'] ?? '';
            $data    = $project['data'] ?? [];
            return view('Admin.Pages.add-project', compact('success','categoryData', 'message', 'data'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Update Project
    public function update(Request $request, $project_id){
        try {
            //code...
            $validate=ProjectValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation pass
                $data=$validate->validated();
                $updateProject = $this->projectService->updateProject($project_id,$data);
                if ($updateProject['success']) {
                    return redirect('/admin/projects')->with('success', $updateProject['message']);
                }
                return redirect()->back()->with('error', $updateProject['message'])->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Delete Project
    public function delete($project_id){
        try {
            //code...
            $deleteProject = $this->projectService->deleteProject($project_id);
            $success = $deleteProject['success'] ?? false;
            $message = $deleteProject['message'] ?? '';
            if ($success) {
                return redirect('/admin/projects/')->with('success',$message);
            } else {
                return redirect()->back()->with('error',$message)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

}