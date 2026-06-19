<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Admin;
use App\Models\Otp;

use App\Mail\OtpMail;

class AdminServices {

    // Register Admin
    public function register($data){
        $encryptPassword=$this->encryptPassword($data['password']);     # Encrypt Password
        $data['password']=$encryptPassword;                             # Update Password
        $register=Admin::create($data);
        if (!$register) {
            # If Admin Not Registered
            return [
                'success'=>false,
                'message'=>'Admin Not Registered',
                'status'=>400
            ];
        } else {
            # If Admin is Registered
            return [
                'success'=>true,
                'message'=>'Admin Registered Successfully',
                'status'=>200
            ];
        }
    }

    // Get Admin
    public function getAdmin($id){
        return $this->checkAdmin($id,null);
    }

    // Update Admin
    public function updateAdmin($id,$data){
        $admin=$this->checkAdmin($id,null);
        if (!$admin['success']) {
            # If Admin Not Exists
            return  $admin;
        } else {
            # If Admin Exists
            $adminData=$admin['data'];
            $updateAdmin=$adminData->update($data);
            if (!$updateAdmin) {
                # If Admin Not Updated
                return [
                    'success'=>false,
                    'message'=>'Admin Not Updated',
                    'status'=>400
                ];
            } else {
                # If Admin is Updated
                return [
                    'success'=>true,
                    'message'=>'Admin Updated Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Delete Admin
    public function deleteAdmin($id){
        $admin=$this->checkAdmin($id,null);
        if (!$admin['success']) {
            # If Admin Not Exists
            return  $admin;
        } else {
            # If Admin Exists
            $adminData=$admin['data'];
            $updateAdmin=$adminData->delete();
            if (!$register) {
                # If Admin Not Deleted
                return [
                    'success'=>false,
                    'message'=>'Admin Not Deleted',
                    'status'=>400
                ];
            } else {
                # If Admin is Deleted
                return [
                    'success'=>true,
                    'message'=>'Admin Updated Successfully',
                    'status'=>200
                ];
            }
        }
    }

        // Check Admin By Email & id
     public function checkAdmin($id=null,$email=null){
        if ($id) {
            # If Id Exists
            $admin=Admin::find($id);
            if (!$admin) {
                # If Admin Not Exists
                 return [
                    'success'=>false,
                    'message'=>'Admin Not Exists',
                    'status'=>400
                ];
            } else {
                # If Admin Exists
                return [
                    'success'=>true,
                    'data'=>$admin,
                    'status'=>200
                ];
            }
        }
        elseif($email){
            # If E-mail Id Exists
            $admin=Admin::where('email',$email)->first();
            if (!$admin) {
                # If Admin Not Exists
                return [
                    'success'=>false,
                    'message'=>'Admin Not Exists',
                    'status'=>400
                ];
            } else {
                # If Admin Exists
                return [
                    'success'=>true,
                    'data'=>$admin,
                    'status'=>200
                ];
            }
        }
        else {
            # If Both Not Exists
            return[
                'success'=>false,
                'message'=>'Admin Id And Email Is Not Exists',
                'status'=>400
            ];
        }
    }
    
    // Login Admin
    public function login($data){
        if (Auth::guard('admin')->attempt([
            'email'    => $data['email'],
            'password' => $data['password']
        ])) {
            $admin = Auth::guard('admin')->user();
            Session::put('admin_auth', [
                'admin_id'  => $admin->admin_id,
                'first_name'=> $admin->first_name,
                'last_name' => $admin->last_name,
                'email'     => $admin->email,
            ]);
            return [
                'success' => true,
                'message' => 'Login successful',
                'status'  => 200
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Invalid Username And Password',
                'status'  => 400
            ];
        }
    }

    // Logout Admin
    public function logout(){
         Auth::guard('admin')->logout();
        Session::forget('admin_auth');
        $logout=Auth::guard('admin')->check();
        if (!$logout) {
              # If Admin Is Logout Successfully
            return [
                'success'=>true,
                'message'=>'Admin Logout Successfully',
                'status'=>200
            ];
        } else {
            # If Admin Is Logout Failed
            return [
                'success'=>false,
                'message'=>'Admin Logout Failed',
                'status'=>400
            ];
        }
    }

    // Forget Password
    public function forgetPassword($email){
        $admin=$this->checkAdmin(null,$email);
        if (!$admin['success']) {
            # If Admin Not Exists
            return  $admin;
        } else {
             # if Admin Exists
            $this->generateOTP($email);
            $adminData=$admin['data'];
            Session::put('reset',[
                'email'=>$adminData->email,
            ]);
            return [
                'success'=>true,
                'message'=>'OTP Send Please Check Your Name',
                'status'=>200
            ];
        }
    }

    // Verify OTP
    public function verifyOTP($data){
        $email=Session::get('reset.email');
        $otp=$data['otp'];
        $admin=$this->checkAdmin(null,$email);
        if (!$admin['success']) {
            # if Admin Exists
            return [
                'success'=>false,
                'message'=>'Admin Not Found',
                'status'=>404
            ];
        } else {
            # if Admin Exists
            $verify=otp::where('email',$email)->where('otp',$otp)->first();
            if (!$verify) {
                # iIf  OTP Not  Verify
                return [
                    'success'=>false,
                    'message'=>'Invalid OTP',
                    'status'=>400
                ];
            }
            if (!Carbon::now()->lessThan($verify->expires_at)) {
                // If OTP Expired
                return [
                    'success'=>false,
                    'message'=>'OTP is Expired',
                    'status'=>400
                ];
            } 
            return [
                'success'=>true,
                'message'=>'OTP Verified',
                'status'=>200
            ];
        }
    }

    // Reset Password
    public function resetPassword($data){
        $email=Session::get('reset.email');
        $admin=$this->checkAdmin(null,$email);
        if (!$admin['success']) {
            # if Admin Exists
           return $admin;
        } else {
            $password= $this->encryptPassword($data['password']);  # Update Encrypted Password
            $data['password']=$password;
            $adminData=$admin['data'];
            $admin_id=$adminData->admin_id;
            $reset=$this->updateAdmin($admin_id,$data);
            if (!$reset['success']) {
                # if Password Reset is Successfully
                return $reset;
            } else {
                # if Password Reset is Successfully
                Session::flush('reset');
                return $reset;
            }            
        }
    }

    // Update Password
    public function updatePassword($data){
        $admin_id=Session::get('admin_auth.admin_id');
        $admin=$this->checkAdmin($admin_id,null);
        if (!$admin['success']) {
            # if Admin Exists
           return $admin;
        } else {
            $password= $this->encryptPassword($data['password']);  # Update Encrypted Password
            $data['password']=$password;
            $updatePassword=$this->updateAdmin($admin_id,$data);
            if (!$updatePassword['success']) {
                # if Password  Not Updated  
                return $updatePassword;
            } else {
                # if Password Updated Successfully
                Session::flush('admin_auth');
                return $updatePassword;
            }            
        }
    }

    // Generate  OTP
    public function generateOTP($email){
        $otp = rand(100000 , 999999);
        $currentTime = Carbon::now();
        $expTime = $currentTime->copy()->addMinutes(3);

        $saveOTP=Otp::updateOrCreate(
            ['email'=>$email],
            [
                'otp'=>$otp,
                'expires_at'=>$expTime
            ]
            );
  
        if ($saveOTP) {
            # code...
            $this->sendMail($email,$otp);
        }
    }

    // Send Mail
    public function sendMail($email,$otp){
        Mail::to($email)->send(new OtpMail(['otp'=>$otp]));
    }

    // Encrypt Password
    public function encryptPassword($password){
        return Hash::make($password);
    }

}