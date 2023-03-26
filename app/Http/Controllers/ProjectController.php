<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use ApiResponser;

    public function index(){
        return $this->successResponse(Project::all()->toArray());
    }

    public function get(Project $project){
        return $this->successResponse($project->toArray());
    }
}
