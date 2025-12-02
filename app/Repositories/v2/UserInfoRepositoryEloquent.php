<?php

namespace App\Repositories\v2;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\v2\UserInfoRepository;
use App\Entities\v2\UserInfo;
use App\Validators\v2\UserInfoValidator;

/**
 * Class UserInfoRepositoryEloquent.
 *
 * @package namespace App\Repositories\V2;
 */
class UserInfoRepositoryEloquent extends BaseRepository implements UserInfoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserInfo::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
