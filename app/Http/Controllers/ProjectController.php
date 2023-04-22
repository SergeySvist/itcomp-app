<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiNotFoundException;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\File;
use App\Models\FileType;
use App\Models\Project;
use App\Models\ProjectFile;
use App\Services\Files\FileService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    use ApiResponser;

    private function createNewProjectFile(int $projectId, int $fileId, string $fileType){
        $filetypeObj = DB::table('file_types')->where('slug', $fileType)->first();

        if (!isset($filetypeObj))
            throw new ApiNotFoundException('File type is undefined');

        $projectFile = new ProjectFile([
            'project_id' => $projectId,
            'file_id' => $fileId,
            'filetype_id' => $filetypeObj->id,
        ]);

        $projectFile->save();
    }

    private function updateProjectFile(Project $project, string $fileTypeSlug, UpdateProjectRequest $request, FileService $fileService){
        if (isset($request[$fileTypeSlug])){

            $fileService->delete($this->findFileBySlug($project,$fileTypeSlug));

            $file = $fileService->save($request['avatar']);
            $this->createNewProjectFile($project->id, $file->id, $fileTypeSlug);
        }
    }

    private function findFileBySlug(Project $project ,string $slug){
        for ($i=0;$i<count($project->projectFilesData->toArray());$i++){
            if($project->projectFilesData[$i]->fileType->slug == "avatar")
                return $project->projectFilesData[$i]->file;
        }
        throw new ApiNotFoundException("File not found");
    }


    public function index(){
        return $this->successResponse(Project::all()->toArray());
    }

    public function get(Project $project){
        return $this->successResponse($project->toArray());
    }

    public function create(CreateProjectRequest $request, FileService $fileService){
        $project = Project::create($request->validated());
        $ts = $fileService->save($request['ts']);
        $avatar = $fileService->save($request['avatar']);

        $this->createNewProjectFile($project->id, $ts->id, 'ts');
        $this->createNewProjectFile($project->id, $avatar->id, 'avatar');

        return $this->successResponse($project->toArray(), null, Response::HTTP_CREATED);
    }

    public function update(Project $project, UpdateProjectRequest $request, FileService $fileService){
        $project->update($request->validated());
        $this->updateProjectFile($project, 'avatar', $request, $fileService);
        $this->updateProjectFile($project, 'ts', $request, $fileService);

        return $this->successResponse([], null, Response::HTTP_NO_CONTENT);
    }

    public function delete(Project $project, FileService $fileService){
        for ($i=0;$i<count($project->projectFilesData->toArray());$i++)
            $fileService->delete($project->projectFilesData[$i]->file);


        $project->delete();

        return $this->successResponse([], null, Response::HTTP_NO_CONTENT);
    }
}
