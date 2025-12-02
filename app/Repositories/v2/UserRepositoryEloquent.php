<?php

namespace App\Repositories\v2;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\v2\UserRepository;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class UsersRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @inheritdoc
     */
    public function getUserWithAllRelations($userId)
    {
        return $this->query()
            ->with([
                'userInfo'
            ])
            ->findOrFail($userId);
    }

    /**
     * @inheritdoc
     */
    public function updateOrCreateUserInformation($input, $userId)
    {
        DB::beginTransaction();
        try {
            $user = $this->query()->with('userInfo')->findOrFail($userId);
            $user->userInfo()->updateOrCreate(
                ['user_id' => $userId],
                $input
            );
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error updating user userInfo: ' . $e->getMessage());
            throw $e;
        }
    }

    public function findByCode($code)
    {
        return $this->query()->with('userInfo')->whereHas('userInfo', function ($query) use ($code) {
            $query->where('code', $code);
        })->first();
    }

    public function getBirthdayInCurrentMonth($isFull = false)
    {
        $query = $this->query()
            ->join('user_info', 'users.id', '=', 'user_info.user_id')
            ->whereMonth('user_info.birthdate', now()->month)
            ->orderByRaw('DATE_FORMAT(user_info.birthdate, "%d") ASC');

        if (!$isFull) {
            $query->whereRaw('DATE_FORMAT(user_info.birthdate, "%d") >= ?', [now()->day])->limit(3);
        }

        return $query->get();
    }

    public function list($filter = [])
    {
        $query = $this->query()->with('userInfo');
        if (isset($filter['name'])) {
            $query->where('name', 'like', '%' . $filter['name'] . '%');
        }
        if (isset($filter['employee_code'])) {
            $query->whereHas('userInfo', function ($query) use ($filter) {
                $query->where('code', 'like', '%' . $filter['employee_code'] . '%');
            });
        }
        if (isset($filter['gender'])) {
            $query->whereHas('userInfo', function ($query) use ($filter) {
                $query->where('gender', $filter['gender']);
            });
        }
        return $query->paginate(config('constant.admin_per_page'));
    }
}
