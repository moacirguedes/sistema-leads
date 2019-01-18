<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AdminService;

class AdminController extends Controller
{
    public function index(AdminService $AdminService)
    {
        $query = $AdminService->dashboardData();

        $date = $query[0];
        $leads = $query[1];
        $clients = $query[2];

        return view('dashboards/home', compact('date', 'leads', 'clients'));
    }
}
