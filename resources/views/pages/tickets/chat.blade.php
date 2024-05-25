@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row g-0">
                    <div class="col-lg-9  col-xl-12">
                        <div class="chat-box scrollable position-relative" style="height: calc(100vh - 111px);">
                            <!--chat Row -->
                            <ul class="chat-list list-style-none px-3 pt-3">
                                @foreach ($messages as $message)
                                    @if ($message->user_id == auth()->user()->id)
                                        <li class="chat-item odd list-style-none mt-3">
                                            <div class="chat-content text-end d-inline-block ps-3">
                                                <div class="box msg p-2 d-inline-block mb-1 box">
                                                    {{ $message->content }}</div>
                                                <br>
                                            </div>
                                            <div class="chat-time text-end d-block font-10 mt-1 mr-0 mb-3">
                                                {{ ($message->created_at) }}</div>
                                        </li>
                                    @else
                                        <li class="chat-item list-style-none mt-3">
                                            <div class="chat-img d-inline-block"><img src="{{ $message->user->image_url }}"
                                                    alt="user" class="rounded-circle" width="45">
                                            </div>
                                            <div class="chat-content d-inline-block ps-3">
                                                <h6 class="font-weight-medium">{{ $message->user->name }}</h6>
                                                <div class="msg p-2 d-inline-block mb-1">It’s
                                                    {{ $message->content }}</div>
                                            </div>
                                            <div class="chat-time d-block font-10 mt-1 mr-0 mb-3">{{ $message->created_at }}
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body border-top">
                            <form method="POST" action="{{ route('message.store', ['ticket' => $ticket->id]) }}"
                                class="row">
                                @csrf
                                <div class="col-9">
                                    <div class="input-field mt-0 mb-0">
                                        <input id="textarea1" name="content" placeholder="Type and enter"
                                            class="form-control border-0" type="text">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button type="submit"
                                        class="btn-circle btn bg-cyan float-end text-white d-flex align-items-center justify-content-center"><i
                                            class="fas fa-paper-plane"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
