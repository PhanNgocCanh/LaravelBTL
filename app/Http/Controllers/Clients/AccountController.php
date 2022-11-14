<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\UserAccount;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $UserAccount;
    public function __construct()
    {
        $this->UserAccount = new UserAccount();
    }
    public function Login(){
        return view('clients.pages.login.login');
    }
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|regex:/^([a-z0-9\+_\-])+(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/',
            'password' => 'required'
        ],
        [
            'email.required' => 'Phải nhập email',
            'email.regex' => 'Email phải có định dạng abc@gmail.com',
            'password.required' => 'Phải nhập password'
        ]);
        $email = $request->email;
        $password = md5($request->password);
        $account = $this->UserAccount->getUser($email,$password);
        if($account && $email == $account->Email && $password == $account->MatKhau){
            $data = [
                'email' => $email,
                'password' => $password,
                'tentk' => $account->TenTK
            ];
            $request->session()->put('account',$data);
            return redirect()->route('home');

        }else{
            return redirect()->route('clients.login')->withInput()->with('error','Sai tên đăng nhập hoặc mật khẩu');
        }
    }
    public function Register(){
        return view('clients.pages.login.register');
    }
    public function postRegister(Request $request){
        $request->validate([
            'username' => 'required|min:6',
            'email' => 'required|regex:/^([a-z0-9\+_\-])+(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/|unique:TaiKhoan',
            'password' => 'required',
            'password_re'=> 'required'
        ],
        [
            'username.required' => 'Phải nhập user name',
            'username.min' => 'Phải nhập ít nhất 6 kí tự',
            'email.required' => 'Phải nhập email',
            'email.regex' => 'Email phải có định dạng abc@gmail.com',
            'email.unique' => 'Email đã tồn tại trên hệ thống',
            'password.required' => 'Phải nhập password',
            'password_re.required' => 'Xác nhận lại mật khẩu'
        ]);
        if($request->password != $request->password_re) return redirect()->route('clients.register')->withInput()->with('msg','Mật khẩu không khớp');
        $dataUser = [
            'Email' => $request->email,
            'TenTK' => $request->username,
            'MatKhau' => md5($request->password),
            'Quyen' => 'UserAccount'
        ];
        $this->UserAccount->addUserAccount($dataUser);
        return redirect()->route('clients.login');
    }
    public function MyAccount(){
        return view('clients.pages.my-account.index');
    }
    public function LogOut(){
        if(session()->get('account')) session()->pull('account');
        return redirect()->route('home');
    }
}
