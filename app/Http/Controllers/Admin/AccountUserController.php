<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountUserController extends Controller
{
    private $Account;
    public function __construct()
    {
        $this->Account = new Account();
    }
    public function index(){
        $dataAccount = $this->Account->getAllAccount();
        return view('admin.pages.account.index',compact('dataAccount'));
    }
}
