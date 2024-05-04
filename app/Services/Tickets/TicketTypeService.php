<?php

namespace App\Services\Tickets;

use App\Dtos\Tickets\TicketTypeDto;
use App\Helpers\FileHelper;
use App\Models\TicketType;

class TicketTypeService
{
    public function create(TicketTypeDto $ticketTypeDto): TicketType
    {
        return TicketType::create($ticketTypeDto->toArray());
    }

    public function fetchAll()
    {
        return TicketType::orderByDesc('created_at')->get();
    }

    public function fetch(TicketType $ticketType): TicketType
    {
        return $ticketType;
    }

    public function delete(TicketType $ticketType): void
    {
        $ticketType->delete();

        if ($ticketType->image) {
            FileHelper::deleteFile($ticketType->image);
        }
    }

    public function update(TicketTypeDto $ticketTypeDto, TicketType $ticketType): TicketType
    {
        $oldFile = $ticketType->image;
        $ticketType->update($ticketTypeDto->toArray());
        if ($oldFile && isset($ticketTypeDto->toArray()['image'])) {
            FileHelper::deleteFile($oldFile);
        }
        return $ticketType;
    }
}
