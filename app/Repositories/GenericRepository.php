<?php

namespace App\Repositories;

use App\Repositories\Contracts\IGenericRepository;
use Illuminate\Database\Eloquent\Model;

class GenericRepository implements IGenericRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function paginate($limit=10)
    {
        return $this->model->paginate($limit);
    }

    public function orderBy($column, $direction = 'asc')
    {
        return $this->model->orderBy($column, $direction);
    }
    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->findOrFail($id);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->find($id);
        return $record->delete();
    }

    public function getWithRelations($relations)
    {
        return  $this->model->with($relations)->get();
    }

    public function getWithRelationsPaginate($relations,$limit=10)
    {
        return  $this->model->with($relations)->paginate($limit);
    }

    public function where($column, $value = null)
    {
        $query = $this->model->newQuery();

        if (is_array($column)) {
            foreach ($column as $field => $val) {
                $query->where($field, $val);
            }
        } else {
            $query->where($column, $value);
        }

        return $query;
    }

    public function wherePaginated($column, $value = null, $limit = 10)
    {
        $query = $this->model->newQuery();

        if (is_array($column)) {
            foreach ($column as $field => $val) {
                $query->where($field, $val);
            }
        } else {
            $query->where($column, $value);
        }
        return $query->paginate($limit);
    }
    public function whereOrderBy($condetions , $orderColumn, $direction = 'asc')
    {
        $query = $this->model->newQuery();

        if (is_array($condetions)) {
            foreach ($condetions as $field => $val) {
                $query->where($field, $val);
            }
        }
        return $query->orderBy($orderColumn, $direction);
    }
}
