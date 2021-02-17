<?php

namespace App\Services;

use App\Repositories\BaseCrudRepository;
use App\Services\Contracts\ExampleServiceContract;
use App\Entities\Example;

class ExampleService extends BaseCrudRepository implements ExampleServiceContract
{
    protected $repository;

    protected $model_name;

    public function __construct(BaseCrudRepository $repository) 
    {
        $this->repository = $repository;
        $this->model_name = Example::class;
    }

    public function testCustom()
    {
        return "Welcome Dev";
    }
}