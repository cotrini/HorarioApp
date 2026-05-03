<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return Schedule::all();
    }

    public function show($id)
    {
        return Schedule::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'entry_time' => 'required|date_format:H:i',
            'lunch_time' => 'nullable|date_format:H:i',
            'lunch_end' => 'nullable|date_format:H:i',
            'exit_time' => 'required|date_format:H:i',
        ]);

        $schedule = Schedule::create($request->all());

        return response()->json($schedule, 201);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'entry_time' => 'sometimes|date_format:H:i',
            'lunch_time' => 'sometimes|nullable|date_format:H:i',
            'lunch_end' => 'sometimes|nullable|date_format:H:i',
            'exit_time' => 'sometimes|date_format:H:i',
        ]);

        $schedule->update($request->all());

        return response()->json($schedule);
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return response()->json(['message' => 'Schedule deleted']);
    }
}
