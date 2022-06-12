<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Models\Card;
use App\Models\Client;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    /**
     * index.
     */
    public function index(int $companyId): JsonResponse
    {
        $clients = Company::findOrFail($companyId)->clients()->get();

        return response()->json($clients);
    }

    /**
     * show.
     */
    public function show(int $companyId, int $id): JsonResponse
    {
        $client = Company::findOrFail($companyId)->clients()->findOrFail($id);

        return response()->json($client);
    }

    /**
     * store.
     */
    public function store(int $companyId, ClientStoreRequest $request): JsonResponse
    {
        $company = Company::findOrFail($companyId);
        $client = Client::create($request->validated());
        Card::create(['company_id' => $companyId, 'client_id' => $client->id, 'created_at' => Carbon::now()]);

        return response()->json(['message' => 'Successfully created', 'data' => $client]);
    }
}
