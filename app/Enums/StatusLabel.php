<?php

namespace App\Enums;

use App\Traits\EnumFromName;

enum StatusLabel: string
{
    use EnumFromName;

    case created = 'Creado';
    case paid = 'Pagado';
    case rejected = 'Rechazado';
}
