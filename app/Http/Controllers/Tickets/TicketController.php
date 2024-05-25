<?php

namespace App\Http\Controllers\Tickets;

use App\Dtos\Tickets\MessageDto;
use App\Dtos\Tickets\TicketDto;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tickets\AssgineTicketRequest;
use App\Http\Requests\Tickets\CreateTicketRequest;
use App\Http\Requests\Tickets\SendMessageRequest;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\User;
use App\Services\Auth\UserService;
use App\Services\Tickets\MessageService;
use App\Services\Tickets\TicketService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TicketController extends Controller
{
    public function __construct(
        private readonly TicketService $ticketService,
        private readonly UserService $userService,
        private readonly MessageService $messageService
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

    public function show(Ticket $ticket): View
    {
        $messages = $this->messageService->fetchAll($ticket);
        return view('pages.tickets.chat', compact('ticket', 'messages'));
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


    public function sendMessage(SendMessageRequest $request, Ticket $ticket): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('file')) {
            $data['file'] = FileHelper::saveFile($request->file('file'), 'messages');
        }
        $data = $data + [
            'user_id' => $request->user()->id,
            'ticket_id' => $ticket->id,
        ];

        $this->messageService->create(MessageDto::create($data));

        return redirect()->route('ticket.show', ['ticket' => $ticket->id]);
    }
}
