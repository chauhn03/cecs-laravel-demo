@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ route('delete_guest', ['eventId' => $selectEvent->id]) }}">
    {{ csrf_field() }}   
    <div class="row">
        <div class="form-group">
            <label for="typeId" class="col-md-1 control-label">Event:</label>                                       
            <div class="col-md-6">
                <select id="eventId" type="number"                                 
                        class="form-control" name="typeId">
                    @foreach($events as $event)
                    <option <?php
                    if ($selectEvent->id == $event->id) {
                        echo("selected");
                    }
                    ?> 
                        value="{{ $event->id }}">
                        {{ $event->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>            
    </div>

    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">
                Events name: {{ $selectEvent->name . " [Date: " . date("d/ m", strtotime($selectEvent->date)). "]"  }} 
            </div> 

            @if(Auth::check())                                                    
            <!-- Table -->
            <table class="table">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <!--<th>Type</th>-->
                    <th>Attended</th>
                    <th>Paid</th>
                    <th>Note</th>
                    <!--<th>Note</th>-->
                </tr>
                @foreach($guests as $guest)
                <tr>             
                    <td><input type="checkbox" name="checkboxDelete[]" value="{{ $guest->id }}"/></td>
                    <td> <a href="{{ route('member_edit', ['id' => $guest->memberId]) }}"> {{ $guest->nickname }}</a></td>
                    <td><input type="checkbox" 
                        <?php
                        if ($guest->attended) {
                            echo("checked");
                        }
                        ?> 
                               name="checkboxAttended[]" 
                               value="{{ $guest->id }}"/></td>
                    <td><input type="checkbox" 
                        <?php
                        if ($guest->paid) {
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

<script type="text/javascript">
    $(document).ready(function () {
        registerEventSelectElementChangedEvent();
    });

    function registerEventSelectElementChangedEvent() {
        var txtSearchMember = document.getElementById("eventId");
        $(txtSearchMember).on('change keydown paste input', function () {
//            onAutoCompleteBoxchange();
            var value = document.getElementById("eventId").value;
//            var href = decodeURIComponent'{{route("guests_list", ["eventId" => ' + 40 + '])}}';
            window.location.href = '/blog/public/index.php/home/guests/' + value;
        });
    }
</script>
@endsection
