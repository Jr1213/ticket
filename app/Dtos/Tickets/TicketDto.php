<?php

namespace App\Dtos\Tickets;

use App\Traits\StaticCreateSelf;
use App\Traits\ToArray;

class TicketDto
{
    use ToArray, StaticCreateSelf;

    public readonly ?int $user_id;
    
    public readonly ?int $ticket_type_id;
    
    public readonly ?string $title;
    
    public readonly ?string $description;
    
    public readonly ?string $status;
    
    public readonly ?int $assgined_id;
}
