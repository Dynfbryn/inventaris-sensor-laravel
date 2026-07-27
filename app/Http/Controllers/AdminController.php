<?php

namespace App\Http\Controllers;

use App\Models\PerangkatSensor;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalSensors = PerangkatSensor::count();
        $totalInventaris = DB::table('inventaris')->count();

        $sensorRusak = PerangkatSensor::where('status', 'rusak')->count();
        $sensorMaintenance = PerangkatSensor::where('status', 'maintenance')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalSensors',
            'totalInventaris',
            'sensorRusak',
            'sensorMaintenance'
        ));
    }
}
