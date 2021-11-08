<?php   

namespace App\Repository\Impl;   


use App\Repository\IEloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class EloquetRepositoryImpl implements IEloquentRepository
{    
    
    /**      
    * @var Model      
    */     
    protected $model;       

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
 
    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
 
    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
    * @param $id
    * @return Collection
    */
    public function all(): ?Collection
    {
        return $this->model->all();
    }

   /**
    * @param array $attributes
    * @return bool
    */
    public function update($attributes): ?bool
    {
        return $this->model->update($attributes);
    }
}