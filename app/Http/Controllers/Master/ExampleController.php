<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Contracts\ExampleServiceContract;

class ExampleController extends Controller
{
    protected $example;

    public function __construct(ExampleServiceContract $example)
    {
        $this->example = $example;
    }
    
    public function index()
    {
        return $this->example->getAll();
    }
}
