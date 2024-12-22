<?php 
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Report;
use App\Models\Student;

class ReportControllerTest extends TestCase
{
    use RefreshDatabase;
    protected $teacher;
    protected $student;
    protected $report;

    protected function setUp(): void
    {
        parent::setUp();

        // Créer un utilisateur enseignant
        $this->teacher = User::factory()->create(['role' => 'teacher']);
        $this->actingAs($this->teacher);

        // Créer un étudiant
        $this->student = Student::factory()->create();

        // Créer des rapports
        $this->report = Report::factory()->create([
            'teacher_id' => $this->teacher->id,
            'student_id' => $this->student->id,
        ]);
    }

    /** @test */
    public function test_index()
    {
        $response = $this->get('/rapports');
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Tous les rapports',
                 ]);
    }

    /** @test */
    public function test_show()
    {
        $response = $this->get('/rapports/' . $this->report->id);
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Rapport spécifique',
                     'id' => $this->report->id,
                 ]);
    }

    /** @test */
    public function test_corriger()
    {
        $response = $this->post('/rapports/' . $this->report->id . '/corriger', [
            'comments' => 'Bien fait.',
        ]);
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Rapport corrigé',
                     'id' => $this->report->id,
                     'correction' => 'Bien fait.',
                 ]);

        $this->assertDatabaseHas('reports', [
            'id' => $this->report->id,
            'comments' => 'Bien fait.',
            'status' => 'Corrigé',
        ]);
    }

    /** @test */
    public function test_marquer_vu()
    {
        $response = $this->post('/rapports/' . $this->report->id . '/marquer-vu');
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Rapport marqué comme vu',
                     'id' => $this->report->id,
                 ]);

        $this->assertDatabaseHas('reports', [
            'id' => $this->report->id,
            'status' => 'Vu par encadrant',
        ]);
    }
}
