<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 4/24/15
 * Time: 6:27 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Modules\Infrastructure;

use Modules\Infrastructure\RepositoryInterface;

use Modules\Exception\RepositoryException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;


abstract class EloquentRepository implements RepositoryInterface
{

    /**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }


    public function getAll($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function  paginate($columns = array('*'), $perPage = 20)
    {
        return $this->model->select($columns)->paginate($perPage);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function  update(array $data, $id, $field = 'id', $orderBy = 'created_at', $oderType = 'desc')
    {
        return $this->model->where($field, '=', $id)->update($data);
    }

    public function  delete($id)
    {
        return $this->model->destroy($id);
    }

    public function  softDelete($id)
    {

    }

    public function  find($columns = array('*'), $id)
    {
        return $this->model->find($id, $columns);
    }

    public function  findBy($columns = array('*'), $field, $value)
    {
        return $this->model->where($field, '=', $value)->first($columns);
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @return Model
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }


}