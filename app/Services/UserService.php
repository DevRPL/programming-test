<?php

namespace App\Services;

use App\Repositories\BaseCrudRepository;
use App\Services\Contracts\UserServiceContract;
use App\Entities\User;

class UserService extends BaseCrudRepository implements UserServiceContract
{
    protected $repository;

    protected $model_name;

    public function __construct(BaseCrudRepository $repository) 
    {
        $this->repository = $repository;
        $this->model_name = User::class;
    }
}