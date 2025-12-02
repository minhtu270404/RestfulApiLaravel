<?php

namespace App\Repositories\v1;

use App\Models\User;


class UserRepository
{
    //TODO: Khai bao cac phuong thuc CRUD va ....
    public function __construct(private User $user)
    {

    }
    public function paginate($limit)
    {
        return $this->user->paginate($limit);
    }
    public function create($data)
    {
        return $this->user->create($data);
    }
    public function findOrFail($userId)
    {
        return $this->user->findOrFail($userId);
    }
    public function update($userId, $data)
    {
        $user = $this->findOrFail($userId);
        $user->update($data);
        return $user;
    }
    public function softDelete($userId)
    {
        $user = $this->findOrFail($userId);
        return $user->delete();

    }
    public function query()
    {
        return $this->user->newQuery();
    }
}
