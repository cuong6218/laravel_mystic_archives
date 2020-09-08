<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGradeRequest;
use App\Http\Services\GradeService;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    protected $gradeService;
    public function __construct(GradeService $gradeService)
    {
        $this->gradeService = $gradeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = $this->gradeService->getAll();
        return view('tables.grades.list', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.grades.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGradeRequest $request)
    {
        $this->gradeService->store($request);
        return redirect()->route('grades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = $this->gradeService->getGrade($id);
        return view('tables.grades.update', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateGradeRequest $request, $id)
    {
        $this->gradeService->update($request, $id);
        return redirect()->route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->gradeService->destroy($id);
        return redirect()->route('grades.index');
    }
}
