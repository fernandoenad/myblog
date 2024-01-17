<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'status',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getLevel()
    {
        $levelName = "";

        switch($this->level){
            case 0: $levelName = "Staff"; break;
            case 1: $levelName = "Administrator"; break;
        }

        return $levelName;
    }

    public function getStatus()
    {
        $statusName = "";

        switch($this->status){
            case 0: $statusName = "Inactive"; break;
            case 1: $statusName = "Active"; break;
        }

        return $statusName;
    }
}
