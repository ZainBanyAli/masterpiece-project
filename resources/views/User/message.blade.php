{{-- @extends('front.layout.master')

@section('main_content')
<div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Messages</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Messages</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content user-panel pt_70 pb_70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('user.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                @if($message_check > 0)
                    <div class="messages">
                        <h3>All Messages</h3>
                        @forelse($message_comments as $item)
                        @php
                        $sender_data = null;
                        if($item->type == 'User'){
                            $sender_data = App\Models\User::where('id', $item->sender_id)->first();
                        } else {
                            $sender_data = App\Models\Admin::where('id', $item->sender_id)->first();
                        }
                        @endphp
                        <div class="message-item @if($item->type == 'Admin') message-item-admin-border @endif">
                            <div class="message-top">
                                <div class="left">
                                    @if($sender_data && $sender_data->photo != '')
                                        <img src="{{ asset('uploads/'.$sender_data->photo) }}" alt="">


                                    @else
                                        <img src="{{ asset('uploads/default.png') }}" alt="No photo available"> <!-- Handle null sender_data -->
                                    @endif
                                </div>
                                <div class="right">
                                    <h4>{{ $sender_data ? $sender_data->name : 'Unknown' }} @if($item->type == 'Admin') (Admin) @endif</h4>
                                    <div class="date-time">{{ $item->created_at ? $item->created_at->format('Y-m-d H:i A') : 'Unknown time' }}</div>
                                </div>
                            </div>
                            <div class="message-bottom">
                                <p>{!! $item->comment !!}</p>
                            </div>
                        </div>
                        @empty
                            <div class="alert alert-danger">
                                No message found
                            </div>
                        @endforelse
                    </div>
                    <div class="write-message">
                        <h3>Write a message</h3>
                        <form action="{{ route('user_message_submit') }}" method="post">
                            @csrf
                            <div class="mb-2">
                                <textarea name="comment" class="form-control" cols="30" rows="5" placeholder="Write your message here"></textarea>
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            No message found<br>
                            <a href="{{ route('user_message_start') }}" class="text-decoration-underline">Please click here to start messaging</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('front.layout.master')

@section('main_content')
<div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Messages</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Messages</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content user-panel pt_70 pb_70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('user.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                @if($message_check > 0)
                    <div class="messages">
                        <h3>All Messages</h3>
                        <div class="chat-container">
                            @forelse($message_comments->reverse() as $item) <!-- Reversed order -->
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
                            @empty
                                <div class="alert alert-danger">
                                    No message found
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="write-message mt-4">
                        <h3>Write a message</h3>
                        <form action="{{ route('user_message_submit') }}" method="post">
                            @csrf
                            <div class="mb-2">
                                <textarea name="comment" class="form-control" cols="30" rows="5" placeholder="Write your message here"></textarea>
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            No message found<br>
                            <a href="{{ route('user_message_start') }}" class="text-decoration-underline">Please click here to start messaging</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
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
