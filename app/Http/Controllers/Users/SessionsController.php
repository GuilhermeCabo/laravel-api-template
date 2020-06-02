<?php

namespace App\Http\Controllers\Users;

use App\Exceptions\AppError;
use App\Http\Controllers\Controller;
use App\Modules\Users\Services\AuthenticateUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    private $authenticateUserService;

    public function __construct()
    {
        $this->authenticateUserService = new AuthenticateUserService();
    }

    /**
     * Create a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws AppError
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $response = $this->authenticateUserService->execute($data);

        return response()->json($response, 200);
    }
}
