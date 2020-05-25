<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClient;
use App\Http\Resources\ClientResource;
use App\Services\ClientService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }


    public function store(StoreClient $request)
    {
        $client = $this->clientService->createNewClient($request->all());

        //desta forma qdo retorna collection
            //return ClientResource::collection($client);

        //assim qdo retorna um único registro
        return new ClientResource($request->all());

    }
}
