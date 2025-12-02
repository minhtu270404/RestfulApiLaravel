<?php

namespace App\Repositories\v2;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UsersRepository.
 *
 * @package namespace App\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
    /**
     * Get user with all relations
     * @param int $userId
     * @return User
     */
    public function getUserWithAllRelations($userId);

    /**
     * Update or create user information
     * @param array $input
     * @param int $userId
     * @return void
     */
    public function updateOrCreateUserInformation($input, $userId);

    /**
     * Find user by code
     * @param string $code
     * @return User
     */
    public function findByCode($code);

    /**
     * get birthday in current month
     * @param bool $isFull
     * @return Collection
     */
    public function getBirthdayInCurrentMonth($isFull = false);

    /**
     * get all users
     * @return Collection
     */
    public function list($filter = []);
}
