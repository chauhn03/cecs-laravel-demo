<ul class="nav nav-sidebar">
    <li class="active"><a href="{{ route('events_list')}}">Events</a></li>
    <li><a href="{{ route('guests_list')}}">Guests</a>
        <ul>
            <li><a href="{{ route('guests_list')}}">Guests</a></li>        
        </ul>

    </li>
    <li><a href="{{ route('event_types_list')}}">Event types</a></li>
    <li><a href="{{ route('members_list')}}">Members</a></li>
</ul>