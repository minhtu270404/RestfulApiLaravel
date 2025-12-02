<?php
namespace App\Http\Services\Api;

use App\Repositories\v1\UserInfoRepository;
use App\Repositories\v1\UserRepository;
use Hash;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private UserInfoService $userInfoService
    ) {

    }

    public function paginateUser()
    {
        return $this->userRepository->paginate(20);
    }
    public function createUser($data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user = $this->userRepository->create($data);

        $this->userInfoService->createUserInfo($user->id);

        return $user;
    }
    public function findUser($data)
    {
        return $this->userRepository->findOrFail($data);

    }
    public function updateUser($userId, $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return $this->userRepository->update($userId, $data);

    }
    public function deleteUser($userId)
    {
        return $this->userRepository->softDelete($userId);

    }
}
