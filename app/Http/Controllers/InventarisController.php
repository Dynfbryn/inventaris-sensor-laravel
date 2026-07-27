<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    public function index()
    {
        $items = DB::table('inventaris')->paginate(10);
        return view('inventaris.index', compact('items'));
    }

    public function create()
    {
        $users = DB::table('users')->where('role', 'teknisi')->get();
        return view('inventaris.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'quantity' => 'required|integer|min:1',
            'condition' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        DB::table('inventaris')->insert([
            'name' => $request->name,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'condition' => $request->condition,
            'location' => $request->location,
            'assigned_to' => $request->assigned_to,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.inventaris.index')
            ->with('success', 'Inventaris berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = DB::table('inventaris')->where('id', $id)->first();
        $users = DB::table('users')->where('role', 'teknisi')->get();
        return view('inventaris.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'quantity' => 'required|integer|min:1',
            'condition' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        DB::table('inventaris')->where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'condition' => $request->condition,
            'location' => $request->location,
            'assigned_to' => $request->assigned_to,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.inventaris.index')
            ->with('success', 'Inventaris berhasil diupdate!');
    }

    public function destroy($id)
    {
        DB::table('inventaris')->where('id', $id)->delete();
        return redirect()->route('admin.inventaris.index')
            ->with('success', 'Inventaris berhasil dihapus!');
    }
}