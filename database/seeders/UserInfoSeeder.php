<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserInfo;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 50 hồ sơ nhân viên giả
        UserInfo::factory()->count(50)->create();
    }
}
