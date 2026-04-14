<?php

namespace App\Enums;

enum InquiryStatus: string
{
    case PENDING = 'pending';
    case CONTACTED = 'contacted';
    case CLOSED = 'closed';
}
