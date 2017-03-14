@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-9 col-md-offset-1">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('delete_edit_event_list') }}">
            {{ csrf_field() }}
            
            <div class="row">
                <div class="panel panel-success">
                    <div class="panel-heading">Event types</div>

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
                            <td> {{ $eventType->description }}</td>
                            <td> {{ $eventType->defaultPlace }}</td>
                            <td> {{ $eventType->defaultFee }}</td>
                            <td> {{ $eventType->note }}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endif                
                </div>                       
            </div>
            <div class="row">
                <a href="{{ route('create_event_types') }}">
                    <button type="button" id="myButton" class="btn btn-primary" autocomplete="off">
                        Add new
                    </button>
                </a>

                <button type="submit" id="myButton" class="btn btn-primary" autocomplete="off">
                    Delete
                </button>
            </div>  
        </form>
    </div>
</div>
@endsection
