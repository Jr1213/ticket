<?php

namespace App\Services\Tickets;

use App\Dtos\Tickets\MessageDto;
use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;

class MessageService
{
    public function create(MessageDto $dto): Message
    {
        return Message::create($dto->toArray());
    }

    public function fetchAll(Ticket $ticket): Collection
    {
        return $ticket->tikcets()->orderByDesc('created_at')->get();
    }
}
