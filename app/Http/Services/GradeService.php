<?php


namespace App\Http\Services;


use App\Grade;
use App\Http\Repositories\GradeRepository;
use Illuminate\Http\Request;

class GradeService
{
    protected $gradeRepo;
    public function __construct(GradeRepository $gradeRepo)
    {
        $this->gradeRepo = $gradeRepo;
    }
    public function getAll()
    {
        return $this->gradeRepo->getAll();
    }
    public function all()
    {
        return $this->gradeRepo->all();
    }
    public function store(Request $request)
    {
        $grade = new Grade();
        $grade->name = $request->name;
        $grade->teacher = $request->teacher;
        $this->gradeRepo->save($grade);
    }
    public function getGrade($id)
    {
        return $this->gradeRepo->getGrade($id);
    }
    public function update(Request $request, $id)
    {
        $grade = $this->gradeRepo->getGrade($id);
        $grade->name = $request->name;
        $grade->teacher = $request->teacher;
        $this->gradeRepo->save($grade);
    }
    public function destroy($id)
    {
        $this->gradeRepo->destroy($id);
    }
}
