<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\StrategicLine;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        $schools = School::query()
            ->where('active', true)
            ->orderByRaw("FIELD(type, 'Urbana', 'Rural')")
            ->orderBy('name')
            ->get();

        return view('colegios.index', compact('schools'));
    }

    public function show(School $school)
    {
        abort_unless($school->active, 404);

        $school->loadMissing(['rector', 'sedes']);

        $projectsByLine = collect();

        if (method_exists($school, 'projects')) {
            try {
                $projectsByLine = $school->projects()
                    ->with('strategicLine')
                    ->wherePivot('active', true)
                    ->get()
                    ->groupBy(fn ($p) => $p->strategicLine->slug);
            } catch (\Exception $e) {
                $projectsByLine = collect();
            }
        }

        $avancePorLinea = collect([
            'equidad-trayectorias',
            'calidad-innovacion',
            'identidad-territorial',
            'gestion-gobernanza',
        ])->mapWithKeys(fn ($slug) => [
            $slug => $projectsByLine->has($slug)
                ? round($projectsByLine[$slug]->avg('progress'), 2)
                : 0,
        ]);

        $lines = StrategicLine::orderBy('id')->get();

        return view('colegios.show', compact(
            'school', 'projectsByLine', 'avancePorLinea', 'lines'
        ));
    }
}