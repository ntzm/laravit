<?php

namespace App\Repositories;

abstract class EloquentRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $model;

    /**
     * @var string
     */
    protected $field;

    /**
     * Get all records
     *
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function all()
    {
        return $this->model->simplePaginate(10);
    }

    /**
     * Find a specific record
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function find($id)
    {
        return $this->model->where($this->field, $id)->firstOrFail();
    }
}
