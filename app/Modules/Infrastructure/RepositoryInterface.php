<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 4/24/15
 * Time: 11:56 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Modules\Infrastructure;

interface RepositoryInterface
{
    public function getAll($columns = array('*'));

    public function  paginate($columns = array('*'), $perPage = 20);

    public function create(array $data);

    public function  update(array $data, $id, $field = 'id');

    public function  delete($id);

    public function  softDelete($id);

    public function  find($columns = array('*'), $id);

    public function  findBy($columns = array('*'), $field, $value);

}