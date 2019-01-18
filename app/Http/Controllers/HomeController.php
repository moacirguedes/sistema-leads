<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use App\Services\HomeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(AdminService $adminService, HomeService $homeService)
    {
        $query = (Auth::guard('admin')->check()) ?  $adminService->dashboardData() : $homeService->dashboardData();

        $date = $query[0];
        $leads = $query[1];
        $clients = $query[2];

        return view('dashboards/home', compact('date', 'leads', 'clients'));
    }
}
