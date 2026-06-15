<?php

namespace App\Services;

use App\Models\Project;

class ProjectServices {

     // Create New Project
    public function createProject($data){
        $saveProject=Project::create($data);
        if (!$saveProject) {
            # If Project Not Created
            return [
                'success'=>false,
                'message'=>' Unable To Create The Project',
                'status'=>400
            ]; 
        } else {
            # If New Project Created
            return [
                'success'=>true,
                'message'=>'New Project Created Successfully',
                'status'=>200
            ]; 
        }
    }

    // Get All Projects
    public function getAllProjects($data){
        $projects=Project::latest()->get();
        if (!$projects->count()>0) {
            # If Projects Empty
            return [
                'success'=>false,
                'message'=>'Projects Empty',
                'status'=>400
            ]; 
        } else {
            # If Projects Exists
            return [
                'success'=>true,
                'data'=>$projects,
                'status'=>200
            ]; 
        }
    }

    // Get Project
    public function getProject($id){
        return $this->checkProject($id);
    }

    // Update Project
    public function updateProject($id){
        $projects=$this->checkProject($id);
        if (!$projects['success']) {
            # if Project Exists
            return $projects;
        } else {
            # if Project Exists
            $projectData=$projects['data'];
            $updateProject=$projectData->update($data);
            if (!$updateProject) {
                # If Project Not Updated
                return [
                    'success'=>false,
                    'message'=>'Project Not Updated',
                    'status'=>400
                ];
            } else {
                # If Project Is Updated
                return [
                    'success'=>true,
                    'message'=>'Project Updated Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Delete  Project
    public function deleteProject($data){
        $projects=$this->checkProject($id);
        if (!$projects['success']) {
            # if Project Exists
            return $projects;
        } else {
            # if Project Exists
            $projectData=$projects['data'];
            $deleteProject=$projectData->delete();
            if (!$deleteProject) {
                # If Project Not Deleted
                return [
                    'success'=>false,
                    'message'=>'Project Not Deleted',
                    'status'=>400
                ];
            } else {
                # If Project Is Deleted
                return [
                    'success'=>true,
                    'message'=>'Project Deleted Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Check Project
    public function checkProject($id){
        $projects=Project::find($id);
        if (!$projects) {
            # if Project Exists
            return [
                'success'=>false,
                'message'=>'This Project Not Exists',
                'status'=>404
            ];
        } else {
            # if Project Exists
            return [
                'success'=>true,
                'data'=>$projects,
                'status'=>200
            ];
        }
    }

}
