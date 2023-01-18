<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = false;
    protected $table = 'tasks';

    const STATUS_PROCESS = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_ERROR = 3;

    public static function getStatus()
    {
        return [
            self::STATUS_PROCESS => 'В процессе',
            self::STATUS_SUCCESS => 'Завершено успешно',
            self::STATUS_ERROR => 'Ошибка импорта',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }

    public function failedRows()
    {
        return $this->hasMany(FailedRow::class, 'task_id', 'id');
    }
}
