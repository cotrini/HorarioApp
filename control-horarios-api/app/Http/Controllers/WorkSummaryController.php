<?php

namespace App\Http\Controllers;

use App\Models\WorkSummary;
use Illuminate\Http\Request;

class WorkSummaryController extends Controller
{
    public function index()
    {
        return WorkSummary::with('user')->get();
    }

    public function show($id)
    {
        return WorkSummary::with('user')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'work_date' => 'required|date',
            'total_minutes_worked' => 'required|integer|min:0',
            'total_minutes_extra' => 'required|integer|min:0',
            'status' => 'required|string',
        ]);

        $workSummary = WorkSummary::create($request->all());

        return response()->json($workSummary->load('user'), 201);
    }

    public function update(Request $request, $id)
    {
        $workSummary = WorkSummary::findOrFail($id);

        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'work_date' => 'sometimes|date',
            'total_minutes_worked' => 'sometimes|integer|min:0',
            'total_minutes_extra' => 'sometimes|integer|min:0',
            'status' => 'sometimes|string',
        ]);

        $workSummary->update($request->all());

        return response()->json($workSummary->load('user'));
    }

    public function destroy($id)
    {
        $workSummary = WorkSummary::findOrFail($id);
        $workSummary->delete();

        return response()->json(['message' => 'WorkSummary deleted']);
    }
}
