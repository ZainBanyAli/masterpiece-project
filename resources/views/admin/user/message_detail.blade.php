{{-- @extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Messages from</h1>
            <div class="ml-auto">
                <a href="{{ route('admin_message') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back to Previous</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @foreach($message_comments as $item)
                            @php
                            if($item->type == 'User'){
                                $sender_data = App\Models\User::where('id', $item->sender_id)->first();
                            } else {
                                $sender_data = App\Models\Admin::where('id', $item->sender_id)->first();
                            }
                            @endphp
                            <div class="message-item @if($item->type == 'Admin') message-item-admin-border @endif" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; border-radius: 10px;">
                                <div class="message-top" style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <div class="left" style="flex: 0 0 50px; width: 50px; height: 50px; overflow: hidden; border-radius: 50%;">
                                        @if($sender_data && $sender_data->photo != '')
                                        <img src="{{ asset('uploads/'.$sender_data->photo) }}" alt="" style="width: 100%; height: auto; display: block;">
                                        @else
                                        <img src="{{ asset('uploads/default.png') }}" alt="" style="width: 100%; height: auto; display: block;">
                                        @endif
                                    </div>
                                    <div class="right" style="flex-grow: 1; padding-left: 15px;">
                                        <h4>{{ $sender_data ? $sender_data->name : 'Unknown' }} @if($item->type == 'Admin') (Admin) @endif</h4>
                                        <div class="date-time" style="color: #666;">{{ $item->created_at->format('Y-m-d H:i A') }}</div>
                                    </div>
                                </div>
                                <div class="message-bottom">
                                    <p style="background-color: #f4f4f4; padding: 10px; border-radius: 5px;">
                                        {!! $item->comment !!}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_message_submit', $id) }}" method="post">
                                @csrf
                                <div class="mb-2">
                                    <textarea name="comment" class="form-control" cols="30" rows="10" placeholder="Write your message here"></textarea>
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection --}}
@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Messages from</h1>
            <div class="ml-auto">
                <a href="{{ route('admin_message') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back to Previous</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="chat-container">
                                @foreach($message_comments->reverse() as $item)
                                    @php
                                    $sender_data = $item->type == 'User'
                                        ? App\Models\User::find($item->sender_id)
                                        : App\Models\Admin::find($item->sender_id);
                                    @endphp
                                    <div class="message-bubble {{ $item->type == 'Admin' ? 'admin-bubble' : 'user-bubble' }}">
                                        <div class="message-content">
                                            <div class="message-info">
                                                @if($sender_data && $sender_data->photo != '')
                                                    <img src="{{ asset('uploads/'.$sender_data->photo) }}" alt="User Photo" class="sender-photo">
                                                @else
                                                    <img src="{{ asset('uploads/default.png') }}" alt="Default Photo" class="sender-photo">
                                                @endif
                                                <div>
                                                    <strong>
                                                        {{ $sender_data ? $sender_data->name : 'Unknown' }}
                                                        @if($item->type == 'Admin')
                                                            <span style="font-weight: normal; color: #000;">(Admin)</span>
                                                        @endif
                                                    </strong>
                                                    <span class="message-time">{{ $item->created_at->format('Y-m-d H:i A') }}</span>
                                                </div>
                                            </div>
                                            <p class="message-text">{!! $item->comment !!}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <form action="{{ route('admin_message_submit', $id) }}" method="post">
                                @csrf
                                <div class="mb-2">
                                    <textarea name="comment" class="form-control" cols="30" rows="5" placeholder="Write your message here"></textarea>
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<style>
    .chat-container {
        display: flex;
        flex-direction: column;
        gap: 10px; /* Reduced gap between messages */
    }

    .message-bubble {
        max-width: 70%;
        padding: 15px; /* Slightly reduced padding */
        font-size: 1.1rem;
        border-radius: 20px;
        margin-bottom: 5px; /* Reduced margin-bottom for closer bubbles */
        position: relative;

    }

    .admin-bubble {
        background-color: #f0f0f0;
        align-self: flex-start;
        border-top-left-radius: 0;
    }

    .user-bubble {
        background-color: #007bff;
        color: white;
        align-self: flex-end;
        border-top-right-radius: 0;
    }

    .message-info {
        display: flex;
        align-items: center;
        gap: 8px; /* Slightly reduced gap between photo and text */
        margin-bottom: 4px; /* Reduced margin-bottom */
    }

    .sender-photo {
        width: 45px;
        height: 45px;
        border-radius: 50%;
    }

    .message-time {
        font-size: 0.85rem;
        color: #666;
        background-color: #fff;
    }

    .message-text {
        margin: 0;
        /* white-space: pre-wrap;
        word-wrap: break-word; */
        line-height: 1.4; /* Reduced line height slightly */
    }


    </style>
@endsection
