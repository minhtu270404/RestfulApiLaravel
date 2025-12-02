<?php

namespace App\Repositories\v1;

use App\Models\UserInfo;

class UserInfoRepository
{
    public function __construct(private UserInfo $userInfo)
    {
    }

    public function find($userId)
    {
        return $this->userInfo->where('user_id', $userId)->first();
    }

    public function findOrCreate($userId)
    {
        return $this->userInfo->firstOrCreate(
            ['user_id' => $userId],
            []
        );
    }

    public function update($userId, $data)
    {
        $userInfo = $this->find($userId);
        $userInfo->update($data);
        return $userInfo;
    }

    public function create($data)
    {
        return $this->userInfo->create($data);
    }
}
