<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserInfoRequest;
use App\Http\Resources\Api\UserInfoResources;
use App\Http\Services\Api\UserInfoService;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function __construct(
        private UserInfoService $userInfoService
    ) {

    }
    public function show($userId)
    {
        $data = $this->userInfoService->findByUserId($userId);
        return response()->json([
            'status' => 'success',
            'message' => 'Chi tiết thông tin người dùng',
            'data' => new UserInfoResources($data)
        ]);
    }
    public function update(UserInfoRequest $userInfoRequest, $userId)
    {
        $data = $this->userInfoService->updateByUser($userId, $userInfoRequest->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật thông tin người dùng thành công',
            'data' => new UserInfoResources($data)
        ]);
    }

}
