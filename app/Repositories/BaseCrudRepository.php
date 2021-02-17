<?php 

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;

class BaseCrudRepository implements BaseRepositoryInterface
{
	protected $model_name;

	public function getAll($columns = ['*'])
	{
		return call_user_func_array("{$this->model_name}::all", array($columns));
	}

	public function getAllAndPaginate($limit = 10, $params = [])
	{
		$query = call_user_func_array("{$this->model_name}::orderBy", array('id', 'Desc'));
		
		return $query->paginate($limit);
	}

	public function getWhere($colomb, $value)
	{
		$query = call_user_func_array("{$this->model_name}::where", array($colomb, $value));
		
		return $query->get();
	}
	
	public function create(array $attributes)
	{
		return call_user_func_array("{$this->model_name}::create", array($attributes));
	}

	public function update(array $attributes, $id)
	{
		$query = call_user_func_array("{$this->model_name}::find", array($id));
		
		return $query->update($attributes);
	}

	public function find($id, $columns = ['*'])
	{
		return call_user_func_array("{$this->model_name}::find", array($id, $columns));
	}
	
	public function delete($id)
	{
		$query = call_user_func_array("{$this->model_name}::find", array($id));

		return $query->delete($id);
	}
}