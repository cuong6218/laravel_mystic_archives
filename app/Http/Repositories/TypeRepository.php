<?php


namespace App\Http\Repositories;


use App\Type;

class TypeRepository
{
    protected $type;
    public function __construct(Type $type)
    {
        $this->type = $type;
    }
    public function getAll()
    {
        return $this->type->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function all()
    {
        return $this->type->all();
    }
    public function save($grade)
    {
        $grade->save();
    }
    public function getType($id)
    {
        return $this->type->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->type->destroy($id);
    }
}
