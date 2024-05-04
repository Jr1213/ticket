<?php

namespace App\Http\Controllers\Tickets;

use App\Dtos\Tickets\TicketTypeDto;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tickets\CreateTicketTypeRequest;
use App\Http\Requests\Tickets\UpdateTicketTypeRequest;
use App\Models\TicketType;
use App\Services\Tickets\TicketTypeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    public function __construct(private readonly TicketTypeService $ticketTypeService)
    {
    }
    public function index(): View
    {
        $types = $this->ticketTypeService->fetchAll();
        return view('pages.tickets.type.index', compact('types'));
    }

    public function create(): View
    {
        return view('pages.tickets.type.create');
    }

    public function store(CreateTicketTypeRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = FileHelper::saveFile($request->file('image'), 'type');
        } else {
            unset($data['image']);
        }

        $type = $this->ticketTypeService->create(TicketTypeDto::create($data));

        return redirect()->route('ticketTpye.index')->with('success', 'new type has been added');
    }

    public function edit(TicketType $ticketType): View
    {
        $type = $ticketType;
        return view('pages.tickets.type.edit', compact('type'));
    }

    public function update(UpdateTicketTypeRequest $request, TicketType $ticketType): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = FileHelper::saveFile($request->file('image'), 'type');
        } else {
            unset($data['image']);
        }

        $updatedType = $this->ticketTypeService->update(TicketTypeDto::create($data), $ticketType);

        return redirect()->route('ticketTpye.index')->with('success', $ticketType->name . ' has been updated');
    }

    public function destroy(TicketType $ticketType): RedirectResponse
    {
        $this->ticketTypeService->delete($ticketType);

        return redirect()->route('ticketTpye.index')->with('success', 'Type has been deleted.');
    }
}
