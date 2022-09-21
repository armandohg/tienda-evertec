<?php

namespace App\Enums;

use App\Traits\EnumFromName;

enum StatusColor: string
{
    use EnumFromName;

    case created = 'indigo';
    case paid = 'green';
    case rejected = 'red';
}
