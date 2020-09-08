<?php


namespace App\Http\Repositories;


use App\Kid;

class KidRepository
{
    protected $kid;
    public function __construct(Kid $kid)
    {
        $this->kid = $kid;
    }
    public function getAll()
    {
        return $this->kid->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function all()
    {
        return $this->kid->all();
    }
    public function save($kid)
    {
        $kid->save();
    }
    public function getKid($id)
    {
        return $this->kid->findOrFail($id);
    }
    public function count($id)
    {
        $grade = $this->kid->findOrFail($id);
        return $grade->count();
    }
    public function destroy($id)
    {
        $this->kid->destroy($id);
    }
}
