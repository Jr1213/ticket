<?php

namespace App\Dtos\Tickets;

use App\Traits\StaticCreateSelf;
use App\Traits\ToArray;

class TicketTypeDto
{
    use ToArray, StaticCreateSelf;

    public readonly ?string $name;
    public readonly ?string $description;
    public readonly ?string $image;
}
