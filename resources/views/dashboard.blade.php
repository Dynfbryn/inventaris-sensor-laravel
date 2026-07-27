@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Users -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500 text-sm">Total Users</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $totalUsers }}</p>
        </div>
        
        <!-- Total Sensors -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500 text-sm">Total Sensors</h3>
            <p class="text-3xl font-bold text-green-600">{{ $totalSensors }}</p>
        </div>
        
        <!-- Total Inventaris -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500 text-sm">Total Inventaris</h3>
            <p class="text-3xl font-bold text-purple-600">{{ $totalInventaris }}</p>
        </div>
    </div>
    
    <div class="mt-8">
        <h2 class="text-xl font-bold mb-4">Menu Admin</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#" class="bg-blue-500 text-white px-4 py-3 rounded-lg hover:bg-blue-600">
                Manage Users
            </a>
            <a href="#" class="bg-green-500 text-white px-4 py-3 rounded-lg hover:bg-green-600">
                Manage Sensors
            </a>
            <a href="#" class="bg-purple-500 text-white px-4 py-3 rounded-lg hover:bg-purple-600">
                Manage Inventaris
            </a>
            <a href="#" class="bg-red-500 text-white px-4 py-3 rounded-lg hover:bg-red-600">
                Reports
            </a>
        </div>
    </div>
</div>
@endsection