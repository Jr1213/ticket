<?php

namespace App\Http\Controllers\Tickets;

use App\Dtos\Tickets\TicketDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tickets\AssgineTicketRequest;
use App\Http\Requests\Tickets\CreateTicketRequest;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\User;
use App\Services\Auth\UserService;
use App\Services\Tickets\TicketService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TicketController extends Controller
{
    public function __construct(
        private readonly TicketService $ticketService,
        private readonly UserService $userService
    ) {
    }

    public function index(): View
    {
        $tikets = $this->ticketService->fetchAll()->paginate(10);

        return view('pages.tickets.index', compact('tikets'));
    }


    public function create(): View
    {
        $types = TicketType::all();
        return view('pages.tickets.create', compact('types'));
    }

    public function wizzerd(TicketType $type): View
    {
        return view('pages.tickets.wizzerd', compact('type'));
    }

    public function store(CreateTicketRequest $request)
    {
        $ticket = $this->ticketService->create(TicketDto::create($request->validated() + ['user_id' => $request->user()->id]));
        return redirect()->route('ticket.index')->with(['success' => $ticket->title . " has been created."]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Ticket $ticket): View
    {
        $users = $this->userService->fetchAll(['role' => User::EMPLOYEE]);
        return view('pages.tickets.assgined', compact('ticket', 'users'));
    }

    public function update(AssgineTicketRequest $request, Ticket $ticket): RedirectResponse
    {
        $this->ticketService->update(TicketDto::create($request->validated()), $ticket);
        return redirect()->route('ticket.index')->with(['success' => 'ticket assgined success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
