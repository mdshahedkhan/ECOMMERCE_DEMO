<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Models\Customer;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer')->except([
            'Render',
            'login',
            'register',
            'logout',
            'Subscriber'
        ]);
    }

    public function Render()
    {
        return view('Site.Customer.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|min:6|max:100',
            'password' => 'required|min:6|max:100'
        ]);
        if ($validator->fails()) {
            session()->flash('loginError');
            return redirect()->back()->withErrors($validator, 'login');
        } else {
            $messages = "These credentials do not match our records.";
            try {
                $customer = Customer::where('email', $request->email)->first();
                if ($customer) {
                    if (password_verify($request->password, $customer->password)) {
                        Session::put('customer', $customer->id);
                        Session::put('c_name', $customer->first_name . ' ' . $customer->last_name);
                        Session::put('c_email', $customer->email);
                        return redirect()->route('customer.dashboard');
                    } else {
                        session()->flash('messages', $messages);
                        return redirect()->back();
                    }
                } else {
                    session()->flash('messages', $messages);
                    return redirect()->back();
                }
            } catch (Exception $exception) {

            }
        }
    }


    public function register(Request $request)
    {
        $validator = $this->validate($request, [
            'first_name'       => 'required|string|min:4|max:30',
            'last_name'        => 'required|string|min:4|max:30',
            'r_email'          => 'required|email|min:6',
            'phone'            => 'required|unique:customers',
            'r_password'       => 'required|same:confirm_password|min:6|max:50',
            'confirm_password' => 'required'
        ]);
        /*if ($validator->failed()) {
            session()->flash('registerError');
            return redirect()->back()->with('errors', $validator->errors());
        } else {*/
        $exception = DB::transaction(function () use ($request) {
            try {
                $customer = Customer::create([
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'email'      => $request->r_email,
                    'phone'      => $request->phone,
                    'password'   => bcrypt($request->r_password)
                ]);
                if (isset($request->newsletter_signup) || $request->newsletter_signup == 'on') {
                    $subscriber        = new Subscribers();
                    $subscriber->email = $request->r_email;
                    $subscriber->save();
                }
                notify()->success('Yah! you are successfully logged in.');
                session()->flash('success', 'you are successfully logged in.');
                Session::put('customer', $customer->id);
                Session::put('c_email', $customer->email);
                Session::put('c_name', $customer->first_name . ' ' . $customer->last_name);
            } catch (Exception $ex) {
                SetMessage('danger', $ex->getMessage());
                return redirect()->back();
            }
        });
        return redirect()->route('customer.dashboard');
    }


    public function dashboard()
    {
        if (Session::get('customer')) {
            return view('Site.Customer.dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Session::forget('customer');
        Session::forget('c_name');
        Session::forget('c_email');
        return redirect()->route('auth.login');

    }

    public function Subscriber(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers',
        ]);
        $Subscriber        = new Subscribers();
        $Subscriber->email = $request->email;
        $Subscriber->save();
        return redirect()->back();
    }


}
