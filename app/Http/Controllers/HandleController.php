<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Member;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HandleController extends Controller
{

    /**
     * Handle login information.
     * @param LoginRequest $request
     * @return RedirectResponse|Redirector
     */
    public function login(LoginRequest $request)
    {
        if (Auth::guard('member')->attempt(['email' => $request->email,'password' => $request->password])) {
            $role = Auth::guard('member')->user()->role;
            $status = Auth::guard('member')->user()->status;
            if ($role === (new Member())->role_admin) {
                return redirect('admin');
            } elseif ($role === (new Member())->role_member) {
                if ($status === (new Member())->status_active) {
                    return redirect('members');
                } else {
                    echo "Please wait to active account!";
                }
            } else {
                return redirect('login');
            }
        } else {
            return redirect('login')->with('warning', 'Your email or password is not matched with any records!');
        }
    }

    /**
     * Handle registration information.
     * @param RegisterRequest $request
     * @return RedirectResponse|Redirector
     */
    public function registration(RegisterRequest $request)
    {
        $member = new Member();
        $member->full_name = $request->name;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->username = $request->username;
        $member->password = bcrypt($request->password);
        $member->save();

        return redirect('register')->with('success', 'You are registered successfully!');
    }

    /**
     * Profile Managements.
     */
    public function profiles()
    {
        return view('generals.profile');
    }

    /**
     * Change information of profile.
     * @param ProfileRequest $request
     * @return RedirectResponse
     */
    public function changeProfiles(ProfileRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $type_file = $file->getClientOriginalExtension();
            if ($type_file != 'jpg' && $type_file != 'png' && $type_file != 'jpeg') {
                return redirect()->back()->with('errorMsg', 'Type of image must to be include jpg, png, jpeg!');
            } else {
                $storage_file = Storage::put('public/images/', $request->image);
                $image_name = basename($storage_file);
            }
        }

        Member::where('id', '=', $request->id)->update(
            [
                'full_name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $image_name
            ]
        );
        return redirect()->back()->with('success', 'Update information successfully!');
    }

    /**
     * Handle logout to destroy session.
     */
    public function logout()
    {
        Auth::guard('member')->logout();
        Session::flush();
        return redirect('login');
    }
}
