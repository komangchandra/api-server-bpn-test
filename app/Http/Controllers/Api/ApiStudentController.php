<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class ApiStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('major')->get();
        $studentsData = StudentResource::collection($students);
        return response()->json([
            'success' => true,
            'message' => 'All data students',
            'studentsData' => $studentsData
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_number' => 'required',
            'student_name' => 'required',
            'major_id' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
        ]);

        $studentCreate = Student::create([
            'student_number' => $request->student_number,
            'student_name' => $request->student_name,
            'major_id' => $request->major_id,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data created',
            'studentData' => $studentCreate
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('major')->find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Data not finded',
            ], 404);
        }

        $studentData = new StudentResource($student);

        return response()->json([
            'success' => true,
            'message' => 'Data finded',
            'studentData' => $studentData
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_number' => 'required',
            'student_name' => 'required',
            'major_id' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
        ]);
        
        $student = Student::findOrFail($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $student->update([
            'student_number' => $request->student_number,
            'student_name' => $request->student_name,
            'major_id' => $request->major_id,
            'address' => $request->address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'studentData' => $student
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $student->delete();

        return response()->json(['message' => 'data deleted'], 200);
    }
}
