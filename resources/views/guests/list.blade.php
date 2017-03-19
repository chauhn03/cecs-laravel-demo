@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ route('delete_guest', ['eventId' => $selectEvent->id]) }}">
    {{ csrf_field() }}      
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">
                Events name: {{ $selectEvent->name . " [Date: " . date("d/ m", strtotime($selectEvent->date)). "]"  }} 
            </div> 

            @if(Auth::check())                                                    
            <!-- Table -->
            <table class="table">
                <tr>
                    <th>Name</th>
                    <!--<th>Type</th>-->
                    <th>Paid</th>
                    <th>Note</th>
                    <!--<th>Note</th>-->
                </tr>
                @foreach($guests as $guest)
                <tr>                    
                    <td> <a href="{{ route('member_edit', ['id' => $guest->memberId]) }}"> {{ $guest->nickname }}</a></td>
                    <td><input type="checkbox" 
                        <?php
                        if ($guest->memberId) {
                            echo("checked");
                        }
                        ?> 
                               name="checkboxPaid[]" 
                               value="{{ $guest->id }}"/></td>
                    <td> {{ $guest->note }}</td>
                </tr>
                @endforeach
            </table>
            @endif                
        </div>                       
    </div>
    <div class="row">
        <a href="{{ route('create_guest', ['eventId' => $selectEvent->id]) }}">
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
