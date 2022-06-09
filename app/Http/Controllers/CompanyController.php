<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    /**
     * index.
     */
    public function index(): JsonResponse
    {
        $companies = Company::all();

        return response()->json($companies);
    }

    /**
     * show.
     */
    public function show(int $id): JsonResponse
    {
        $company = Company::findOrFail($id);

        return response()->json($company);
    }
}
