<?php

namespace App\Http\Controllers;

use App\Models\PerangkatSensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PimpinanController extends Controller
{
    public function index()
    {
        // Dashboard untuk pimpinan - overview
        $totalInventaris = DB::table('inventaris')->count();
        $totalTeknisi = DB::table('users')->where('role', 'teknisi')->count();
        $activeSensors = PerangkatSensor::where('status', 'aktif')->count();

        return view('pimpinan.dashboard', compact('totalInventaris', 'totalTeknisi', 'activeSensors'));
    }
}