<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\File;
use App\Models\FileType;
use App\Models\Project;
use App\Services\Files\FileService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    use ApiResponser;

    public function index(){
        return $this->successResponse(Project::all()->toArray());
    }

    public function get(Project $project){
        return $this->successResponse($project->toArray());
    }

    public function create(CreateProjectRequest $request, FileService $fileService){
        $project = Project::create($request->validated());
        $ts = $fileService->save($request['ts'], 'ts');

        return $this->successResponse(['id'=>$project->id, $ts], null, Response::HTTP_CREATED);
    }

    public function update(Project $project, UpdateProjectRequest $request){
        $project->update($request->validated());

        return $this->successResponse([], null, Response::HTTP_NO_CONTENT);
    }

    public function delete(Project $project){
        //todo: cascade update ???
        $project->delete();

        return $this->successResponse([], null, Response::HTTP_NO_CONTENT);
    }
}
