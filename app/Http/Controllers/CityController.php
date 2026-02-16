<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $query = Cities::query();
        $cities =  $query->latest()->get();

        return view('admin.cities.index', compact('cities'));
    }

    public function updateStatus(Request $request, $id)
    {
        $city = Cities::findOrFail($id);
        if ($request->has('is_active')) {
            $city->is_active = (bool) $request->is_active;
            $city->save();
            return response()->json(['success' => true, 'message' => 'City status updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Invalid request'], 400);
    }
}
