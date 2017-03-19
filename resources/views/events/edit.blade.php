@extends('layouts.app')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Create new event</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('post_edit_event') }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="id" value="{{ $characters->id}}" type="hidden" class="form-control" name="id" required autofocus>
                        <input id="name" type="text" value="{{ $characters->name}}" class="form-control" name="name" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="typeId" class="col-md-4 control-label">Type</label>                                       
                    <div class="col-md-6">
                        <select id="typeId" type="number"                                 
                                class="form-control" name="typeId">
                            @foreach($event_types as $event_type)
                            <option <?php
                            if ($characters->typeId == $event_type->id) {
                                echo("selected");
                            }
                            ?> 
                                value="{{ $event_type->id }}">
                                {{ $event_type->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>                

                <div class="form-group" class="col-md-6">
                    <label for="description" class="col-md-4 control-label">Date</label>

                    <div class="col-md-6">
                        <div class='input-group date' id='eventDate'>
                            <input type='text' class="form-control" name="date" 
                                   value="{{ date("d/ m/ Y", strtotime($characters->date)) }}" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>                               

                <div class="form-group" class="col-md-6">
                    <label for="description" class="col-md-4 control-label">Time</label>

                    <div class="col-md-6">
                        <div class='input-group date' id='eventTime'>
                            <input type='text' class="form-control" 
                                   value="{{ date("h:i A", strtotime($characters->time)) }}"
                                   name="time" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>                               

                <div class="form-group">
                    <label for="place" class="col-md-4 control-label">Place</label>

                    <div class="col-md-6">
                        <input id="place" type="text" 
                               value="{{ $characters->place}}"
                               class="form-control" name="place">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fee" class="col-md-4 control-label">Fee</label>

                    <div class="col-md-6">
                        <input id="fee" type="number" 
                               value="{{ $characters->fee}}"
                               pattern="^[0-9]" class="form-control"
                               name="fee"
                               title='Only Number' min="1" step="1">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="note" class="col-md-4 control-label">Note</label>

                    <div class="col-md-6">
                        <textarea  id="note" 
                                   value="{{ $characters->note}}"
                                   type="text" name="note" 
                                   class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-1 col-md-offset-4">
                        <a href="{{ route('members_list') }}">
                            <button type="button" class="btn btn-primary">
                                Back
                            </button>
                        </a>
                    </div>

                    <div class="col-md-1">
                        <button name="submit" type="submit" class="btn btn-primary" value="create">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var dateTimeElement = $('#eventDate');
        dateTimeElement.datetimepicker({
            format: 'DD/MM/YYYY'
        });

        var dateTimeElement = $('#eventTime');
        dateTimeElement.datetimepicker({
            format: 'LT'
        });
        console.log("ready!");
    });
</script>

@endsection
