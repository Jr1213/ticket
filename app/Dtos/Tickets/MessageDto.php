<?php

namespace App\Dtos\Tickets;

use App\Traits\StaticCreateSelf;
use App\Traits\ToArray;

class MessageDto
{
    use ToArray, StaticCreateSelf;

    public readonly ?int $user_id;

    public readonly ?int $ticket_id;

    public readonly ?string $content;

    public readonly ?string $file;
}
