<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Member;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GeneralController extends Controller
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
            if ($role === Member::ROLE_ADMIN) {
                return redirect('admin');
            } elseif ($role === Member::ROLE_MEMBER) {
                if ($status === Member::STATUS_ACTIVE) {
                    return redirect('members');
                } else {
                    return redirect()->back()->with('warning', trans('message.activeWarning'));
                }
            } else {
                return redirect('login')->with('warning', trans('message.loginReport'));
            }
        } else {
            return redirect('login')->with('warning', trans('message.loginWarning'));
        }
    }

    /**
     * Handle registration information.
     * @param RegisterRequest $request
     * @return RedirectResponse|Redirector
     */
    public function registration(RegisterRequest $request)
    {
        Member::create([
            'full_name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        return redirect('register')->with('success', trans('message.registerSuccess'));
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
        $data = $request->all();
        $data = request()->except(['_token']);
        $data['password'] = bcrypt($request->password);
        $oldImage = Member::find($request->id)->image;
        unset($data['repassword']);
        if (array_key_exists('image', $data)) {
            $storageFile = Storage::put('public/images/', $data['image']);
            $data['image'] = basename($storageFile);
            Storage::delete('public/images/'.$oldImage);
            while ($data['password'] == null) {
                unset($data['password']);
            }
        } else {
            while ($data['password'] == null) {
                unset($data['password']);
            }
        }

        Member::findOrFail($request->id)->update($data);
        return redirect()->back()->with('success', trans('message.profileSuccess'));
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
