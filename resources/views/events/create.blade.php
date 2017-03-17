@extends('layouts.app')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Create new event type</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('post_create_event_types') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Type</label>

                    <div class="col-md-6">
                        <input id="description" type="text" class="form-control" name="description">
                    </div>
                </div>                

                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Date Time</label>

                    <div class="col-md-6">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>                               

                <div class="form-group">
                    <label for="place" class="col-md-4 control-label">Place</label>

                    <div class="col-md-6">
                        <input id="place" type="text" class="form-control" name="place">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fee" class="col-md-4 control-label">Fee</label>

                    <div class="col-md-6">
                        <input id="fee" type="number" pattern="^[0-9]" class="form-control"
                               name="fee"
                               title='Only Number' min="1" step="1">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="note" class="col-md-4 control-label">Note</label>

                    <div class="col-md-6">
                        <textarea  id="note" type="text" name="note" class="form-control"></textarea>
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
                            Create
                        </button>
                    </div>

                    <div class="col-md-1">
                        <button name="submit" type="submit" class="btn btn-primary" value="createAndNew">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var dateTimeElement = $('#datetimepicker1');
        dateTimeElement.datetimepicker();
        console.log("ready!");
    });
</script>

@endsection
