<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\Api\UserResources;
use App\Http\Services\Api\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {

    }
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Danh sách người dùng',
            'data' => UserResources::collection($this->userService->paginateUser())
        ]);
    }
    public function store(UserRequest $userRequest)
    {
        $user = $this->userService->createUser($userRequest->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Tạo người dùng thành công',
            'data' => new UserResources($user)
        ]);
    }
    public function update(UserRequest $request, $userId)
    {
        $data = $request->validated();
        $user = $this->userService->updateUser($userId, $data);
        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật người dùng thành công',
            'data' => new UserResources($user)
        ]);
    }
    public function show($userId)
    {
        $showUserId = $this->userService->findUser($userId);
        return new UserResources($showUserId);
    }
    public function destroy($userId)
    {
        $this->userService->deleteUser($userId);
        return response()->json([
            'status' => 'success',
            'message' => 'User Delete Successfully'
        ]);
    }


}
