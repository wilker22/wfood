<?php

namespace App\Services;

use App\Repositories\Contracts\EvaluationRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use GuzzleHttp\Psr7\Request;

class EvaluationService
{

    protected $evaluationRepository, $orderRepository;

    public function __construct(
        EvaluationRepositoryInterface $evaluation,
        OrderRepositoryInterface $order
    )
    {
        $this->evaluationRepository = $evaluation;
        $this->orderRepository = $order;
    }

    public function createNewEvaluation(string $identifyOrder)
    {
        $clientId = $this->getIdClient();
        $order = $this->orderRepository->getOrderByIdentify($identifyOrder);

        return $this->evaluationRepository->newEvaluationOrder($order->id, $clientId);
    }

    public function getIdClient()
    {
        return auth()->user()->id;
    }




}
