<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class UserInfo extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;

    // Tên bảng nếu không theo chuẩn số nhiều mặc định
    protected $table = 'user_infos';

    // Các cột có thể gán hàng loạt
    protected $fillable = [
        'user_id',
        'code',
        'gender',
        'birthdate',
        'birth_place',
        'national',
        'religion',
        'hometown',
        'identily',
        'identily_date',
        'identily_place',
        'tax_code',
        'phone',
        'address',
        'household',
        'bank_account',
        'bank',
        'start_working_date',
        'working_place',
        'note',
        'company_name',
        'department',
        'unit_name',
        'headquater_name',
        'position_name',
        'concurent_position_name',
    ];

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
