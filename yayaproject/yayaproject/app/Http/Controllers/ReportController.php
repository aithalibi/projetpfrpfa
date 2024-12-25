<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Routing\Controller;
use App\Models\Teacher;

class ReportController extends Controller
{
    // Récupérer tous les rapports pour un enseignant
    public function index(Request $request)
    {
        $teacherId = $request->user()->id; 
        $rapports = Report::where('teacher_id', $teacherId)->with('student')->get();
        return response()->json(['message' => 'Tous les rapports', 'data' => $rapports]);
    }

    // Voir en detail un rapport spécifique
    public function show($id)
    {
        $rapport = Report::with('student')->findOrFail($id);
        return response()->json([
            'message' => 'Rapport spécifique',
            'data' => [
                'id' => $rapport->id,
                'title' => $rapport->title,
                'status' => $rapport->status,
                'correction_date' => $rapport->correction_date,
                'comments' => $rapport->comments, 
                'student' => $rapport->student
            ]
        ]);
    }

    // Corriger un rapport
    public function corriger(Request $request, $id)
    {
        $rapport = Report::findOrFail($id);
        $rapport->comments = $request->input('comments'); 
        $rapport->status = 'Corrigé'; 
        $rapport->correction_date = now(); 
        $rapport->save();
        return response()->json(['message' => 'Rapport est corrigé', 'id' => $id]);
    }

    public function marquerVu(Request $request, $id)
{
    $rapport = Report::findOrFail($id);
    $rapport->status = 'Vu par encadrant';
    $rapport->comments = $request->input('comments');
    $rapport->save();

    // Récupérer les détails de l'enseignant
    $teacher = Teacher::find($rapport->teacher_id);

    $data = [
        'id' => $rapport->id,
        'teacher_id' => $rapport->teacher_id,
        'teacher_name' => $teacher ? $teacher->first_name . ' ' . $teacher->last_name : null,
        'status' => $rapport->status,
        'comments' => $rapport->comments
    ];

    return response()->json([
        'message' => 'VU',
        'data' => $data
    ]);
}

    

}
