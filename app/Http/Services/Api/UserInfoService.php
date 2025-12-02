<?php
namespace App\Http\Services\Api;

use App\Repositories\v1\UserInfoRepository;

class UserInfoService
{
    public function __construct(
        private UserInfoRepository $userInfoRepository
    ) {
    }

   public function findByUserId($userId)
{
    return $this->userInfoRepository->findOrCreate($userId);
}


    public function updateByUser($userId, $data)
    {
        // Sử dụng findOrCreate để đảm bảo luôn có bản ghi
        $userInfo = $this->userInfoRepository->findOrCreate($userId);
        $userInfo->update($data);
        return $userInfo;
    }

    public function createUserInfo($userId)
    {
        return $this->userInfoRepository->create([
            'user_id' => $userId,
        ]);
    }
}
