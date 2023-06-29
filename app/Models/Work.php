<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'work_name',
        'status',
        'request_id',
        'cancel_id',
    ];


    public function isDone(): bool
    {
        return $this->status;
    }

}
