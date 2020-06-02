<?php

namespace App\Http\Controllers\Users;

use App\Exceptions\AppError;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Modules\Users\Services\ListUsersService;
use App\Modules\Users\Services\CreateUserService;
use App\Modules\Users\Services\ShowUserService;
use App\Modules\Users\Services\UpdateUserService;
use App\Modules\Users\Services\DeleteUserService;

class UsersController extends Controller
{
    private $listUsersService;
    private $createUserService;
    private $showUserService;
    private $updateUserService;
    private $deleteUserService;

    public function __construct()
    {
        $this->listUsersService = new ListUsersService();
        $this->createUserService = new CreateUserService();
        $this->showUserService = new ShowUserService();
        $this->updateUserService = new UpdateUserService();
        $this->deleteUserService = new DeleteUserService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $users = $this->listUsersService->execute();

        return \response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $user = $this->createUserService->execute($data);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return JsonResponse
     * @throws AppError
     */
    public function show(string $id)
    {
        $user = $this->showUserService->execute($id);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     * @throws AppError
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $user = $this->updateUserService->execute($data, $id);

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return JsonResponse
     * @throws AppError
     */
    public function destroy(string $id)
    {
        $this->deleteUserService->execute($id);

        return response()->json("", 204);
    }
}
