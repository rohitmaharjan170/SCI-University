<?php

namespace App\Http\Controllers\backend\Admin;

use App\Mail\AdminPasswordUpdateMail;
use App\Mail\AdminRegisteredMail;
use App\models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class AdminManagementController extends Controller
{
    public function index()
    {
        $authorize = auth('admin')->user()->is_super;
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $data['title'] = 'Admin Management';
        $data['admins'] = Admin::latest()->paginate(25);

        return view('backend.admin.admin-management.index', $data);
    }

    public function create()
    {
        $authorize = auth('admin')->user()->is_super;
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Create Admin';
        $data['permissions'] = Permission::all();

        return view('backend.admin.admin-management.create', $data);
    }

    public function edit($id)
    {
        $authorize = auth('admin')->user()->is_super;
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['admin'] = Admin::findOrFail($id);
        $data['permissions'] = Permission::all();

        return view('backend.admin.admin-management.edit', $data);
    }

    public function store(Request $request)
    {
        $authorize = auth('admin')->user()->is_super;
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins|max:255',
            'password' => 'required|confirmed|max:255'
        ]);

        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate)->withInput($request->only('name', 'email'));
        }

        try {
            //register new admin
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => $request->status,
                'verify_token' => Str::random(40)
            ]);

            //assign permission to the admin
            $admin->syncPermissions($request->permission);

            if ($admin) {
                Mail::to($admin->email)->send(new AdminRegisteredMail($admin));
                customSuccessMessage('Admin registered and Verification email sent successfully!', 'Success');
                return redirect('/admin/manage');
            }
            customErrorMessage('Failed to register admin!', 'Failed');
            return redirect('/admin/manage');

        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(), 'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }

    public function update(Request $request, $id)
    {
        $authorize = auth('admin')->user()->is_super;
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|max:255',
        ]);

        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate)->withInput($request->only('name', 'email'));
        }

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->status = $request->status;
        if ($request->password) {
            if ($request->password === $request->password_confirmation)
                $admin->password = bcrypt($request->password);
            else {
                customErrorMessage('Password confirmation did not match!', 'Error');
                return back()->withInput($request->all());
            }
        }
        $adm = $admin->update();
        //assign permission to the admin
        $admin->syncPermissions($request->permission);

        if ($adm) {
            Mail::to($admin->email)->send(new AdminPasswordUpdateMail($admin, $request->password));
        }

        UpdateMessage('Admin');
        return back();
    }

    public function destroy($id)
    {
        $authorize = auth('admin')->user()->is_super;
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        if ($authorize && auth('admin')->user()->id == $id) {
            customErrorMessage('Super Admin is unauthorized to delete Super Admin!', 'Error');
            return back();
        }

        $admin = Admin::findOrFail($id);
        $admin->syncPermissions([]);
        $admin->delete();

        DeleteMessage('Admin');
        return back();
    }

    public function verifyEmailForm(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'verify_token' => 'required'
        ]);

        $data['email'] = $request->email;
        $data['verify_token'] = $request->verify_token;
        return view('backend.admin.admin.verify-email', $data);
    }

    public function verifyEmailConfirm(Request $request)
    {
        $request->validate([
            'verify_token' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'confirmed|max:255'
        ]);

        $email = $request->email;
        $verifytoken = $request->verify_token;
        $password = $request->password;

        $admin = Admin::where('email', $email)->where('verify_token', $verifytoken)->first();
        if ($admin) {
            $adm = $admin->update([
                'password' => bcrypt($password),
                'verify_token' => null,
                'email_verified' => true,
                'verified' => true
            ]);
            if ($adm) {
                Mail::to($admin->email)->send(new AdminPasswordUpdateMail($admin, $request->password));
            }
            customSuccessMessage('Your Account has been activated!', 'Success');
            return redirect('/admin/login');
        }
        customErrorMessage('Failed to activate your account!', 'Failed');
        return redirect('/admin/login');
    }
}
