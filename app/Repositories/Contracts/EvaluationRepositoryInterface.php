<?php

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
    public function newEvaluationOrder(int $idOrder, int $idClient);
    public function getEvaluationsByOrder(int $idOrder);
    public function getEvaluationsByClient(int $idClient);

}
