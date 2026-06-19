<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminValidator;
use Illuminate\Support\Facades\Session;

use App\Services\AdminServices;

class AdminController extends Controller
{
     protected $adminService;

    // Inject Contact Service using constructor
    public function __construct(AdminServices $adminService){
        $this->adminService = $adminService;
    }
    // Register Admin
    public function register(Request $request){
        try {
            //code...
            $validate = AdminValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation Fails
                $data=$validate->validated();
                $registerAdmin = $this->adminService->register($data);
                if ($registerAdmin['success']) {
                    return redirect('/login')->with('success', $registerAdmin['message']);
                }
                return redirect()->back()->with('error', $registerAdmin['message'])->withInput();
            }
         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Login Admin
    public function login(Request $request){
        try {
            //code...
            $validate = AdminValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation Fails
                $data=$validate->validated();
                $loginAdmin = $this->adminService->login($data);
                if ($loginAdmin['success']) {
                    return redirect('/admin/dashboard')->with('success', $loginAdmin['message']);
                }
                return redirect()->back()->with('error', $loginAdmin['message'])->withInput();
            }
         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Logout Admin
    public function logout(){
        try {
            //code...
            $logOutAdmin = $this->adminService->logout();
            $message=$logOutAdmin['message'];
            if ($logOutAdmin['success']) {
                return redirect('/login')->with('success',$message);
            } else {
                return redirect()->back()->with('error',$message)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Forget Password
    public function forget(Request $request){
        try {
            //code...
            $validate = AdminValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation Fails
                $data=$validate->validated();
                $email=$data['email'];
                $forgetPassword = $this->adminService->forgetPassword($email);
                if ($forgetPassword['success']) {
                    return redirect('/verify')->with('success', $forgetPassword['message']);
                }
                return redirect()->back()->with('error', $forgetPassword['message'])->withInput();
            }
         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Verify OTP
    public function verify(Request $request){
        try {
            //code...
            $validate = AdminValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation Fails
                $data=$validate->validated();
                $verifyOTP = $this->adminService->verifyOTP($data);
                if ($verifyOTP['success']) {
                    return redirect('/reset')->with('success', $verifyOTP['message']);
                }
                return redirect()->back()->with('error', $verifyOTP['message'])->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Reset Password
    public function reset(Request $request){
        try {
            //code...
            $validate = AdminValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation Fails
                $data=$validate->validated();
                $resetAdmin = $this->adminService->resetPassword($data);
                if ($resetAdmin['success']) {
                    return redirect('/login')->with('success', $resetAdmin['message']);
                }
                return redirect()->back()->with('error', $resetAdmin['message'])->withInput();
            }
         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // View Profile
    public function profile(Request $request){
        try {
            //code...
            $email=Session::get('admin_auth.email');
            $banner = $this->adminService->checkAdmin(null,$email);
            $success = $banner['success'] ?? false;
            $message = $banner['message'] ?? '';
            $data    = $banner['data'] ?? [];
            return view('Admin.Pages.profile', compact('success', 'message', 'data'));
         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Update Password
    public function updatePassword(Request $request){
        try {
            //code...
            $validate = AdminValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation Fails
                $data=$validate->validated();
                $updatePassword = $this->adminService->updatePassword($data);
                if ($updatePassword['success']) {
                    return redirect('login')->with('success', $updatePassword['message']);
                }
                return redirect()->back()->with('error', $updatePassword['message'])->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Update Admin
    public function updateAdmin(Request $request){
        try {
            //code...
            $validate = AdminValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation Fails
                $data=$validate->validated();
                $admin_id=Session::get('admin_auth.admin_id');
                $updateAdmin = $this->adminService->updateAdmin($admin_id,$data);
                if ($updateAdmin['success']) {
                    return redirect('/admin/profile')->with('success', $updateAdmin['message']);
                }
                return redirect()->back()->with('error', $updateAdmin['message'])->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

}