<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Services\AdminService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $userService, $adminService;

    public function __construct(UserService $userService, AdminService $adminService)
    {
        $this->userService = $userService;
        $this->adminService = $adminService;
    }

    public function index(Request $request){
        try {
            
            $admins = Admin::whereHas('user')->with('user')->paginate(10);
            return view('admin.permissions.index');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function create(){
        return view('admin.permissions.create');
    }

    public function store(AdminRequest $request){
        $validated = $request->validated();
        
    }


}



