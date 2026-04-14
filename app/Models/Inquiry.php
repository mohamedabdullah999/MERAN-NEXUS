<?php

namespace App\Models;

use App\Enums\InquiryStatus;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'request_type',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => InquiryStatus::class,
        ];
    }
}
