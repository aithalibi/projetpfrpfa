<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Routing\Controller;

class ReportController extends Controller
{
    // Récupérer tous les rapports pour un enseignant
    public function index(Request $request)
    {
        $teacherId = $request->user()->id; 
        $rapports = Report::where('teacher_id', $teacherId)->with('student')->get();
        return response()->json(['message' => 'Tous les rapports']);
    }

    // Voir un rapport spécifique
    public function show($id)
    {
        $rapport = Report::with('student')->findOrFail($id);
        return response()->json(['message' => 'Rapport spécifique', 'id' => $id]);
    }

    // Corriger un rapport
    public function corriger(Request $request, $id)
    {
        $rapport = Report::findOrFail($id);
        $rapport->comments = $request->input('comments'); // Ajout des commentaires
        $rapport->status = 'Corrigé'; // Modifier le statut
        $rapport->correction_date = now(); // Date de correction
        $rapport->save();
        return response()->json(['message' => 'Rapport corrigé', 'id' => $id, 'correction' => $request->input('correction')]);
    }

    // Marquer un rapport comme vu 
    public function marquerVu($id)
    {
        $rapport = Report::findOrFail($id);
        $rapport->status = 'Vu par encadrant';
        $rapport->save();
        return response()->json(['message' => 'Rapport marqué comme vu', 'id' => $id]);
    }
}
