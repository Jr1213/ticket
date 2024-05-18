<?php

namespace App\Services\Tickets;

use App\Dtos\Tickets\TicketDto;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TicketService
{
    public function create(TicketDto $dto): Ticket
    {
        return Ticket::create($dto->toArray());
    }

    public function fetchAll(): Builder
    {
        $query = Ticket::query();
        $user = request()->user();
        if ($user->role == User::USER) {
            $query->where('user_id', $user->id);
        }

        if ($user->role == User::EMPLOYEE) {
            $query->where('assgined_id', $user->id);
        }

        return $query->orderByDesc('created_at');
    }

    public function update(TicketDto $dto, Ticket $ticket): Ticket
    {
        $ticket->update($dto->toArray());
        return $ticket;
    }
}
