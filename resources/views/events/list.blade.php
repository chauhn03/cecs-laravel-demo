@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ route('delete_edit_event_list') }}">
    {{ csrf_field() }}

    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">Events</div>

            @if(Auth::check())                                                    
            <!-- Table -->
            <table class="table">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Place</th>
                    <th>Fee</th>
                    <th>Note</th>
                </tr>
                @foreach($characters as $eventType)
                <tr>
                    <td><input type="checkbox" name="checkboxDelete[]" value="{{ $eventType->id }}"/></td>
                    <td> <a href="{{ route('edit_event_types', ['id' => $eventType->id]) }}"> {{ $eventType->name }}</a></td>
                    <td> {{ $eventType->place }}</td>
                    <td> {{ $eventType->date ." ". $eventType->time }}</td>
                    <td> {{ $eventType->fee }}</td>
                    <td> {{ $eventType->note }}</td>
                </tr>
                @endforeach
            </table>
            @endif                
        </div>                       
    </div>
    <div class="row">
        <a href="{{ route('create_event') }}">
            <button type="button" id="myButton" class="btn btn-primary" autocomplete="off">
                Add new
            </button>
        </a>

        <button type="submit" id="myButton" class="btn btn-primary" autocomplete="off">
            Delete
        </button>
    </div>  
</form>
@endsection
