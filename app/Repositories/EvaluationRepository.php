<?php

namespace App\Repositories;

use App\Models\Evaluation;
use App\Models\Order;
use App\Repositories\Contracts\EvaluationRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EvaluationRepository implements EvaluationRepositoryInterface
{
    protected $entity;

    public function __construct(Evaluation $evaluation)
    {
        $this->entity = $evaluation;
    }

    public function newEvaluationOrder(int $idOrder, int $idClient)
    {

    }

    public function getEvaluationsByOrder(int $idOrder)
    {

    }

    public function


}
