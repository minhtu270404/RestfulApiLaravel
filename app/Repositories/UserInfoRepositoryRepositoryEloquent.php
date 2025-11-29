<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserInfoRepositoryRepository;
use App\Entities\UserInfoRepository;
use App\Validators\UserInfoRepositoryValidator;

/**
 * Class UserInfoRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserInfoRepositoryRepositoryEloquent extends BaseRepository implements UserInfoRepositoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserInfoRepository::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
