@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit event types: {{ $characters->name }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('post_edit_event_types') }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="id" value="{{ $characters->id}}" type="hidden" class="form-control" name="id" required autofocus>
                                <input id="name" type="text" class="form-control" 
                                       value="{{ $characters->name}}"
                                       name="name" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" 
                                       value="{{ $characters->description}}"
                                       class="form-control" name="description">
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="place" class="col-md-4 control-label">Place</label>

                            <div class="col-md-6">
                                <input id="place" type="text" 
                                       value="{{ $characters->defaultPlace}}"
                                       class="form-control" name="place">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fee" class="col-md-4 control-label">Fee</label>

                            <div class="col-md-6">
                                <input id="fee" type="number" 
                                       value="{{ $characters->defaultFee}}"
                                       pattern="^[0-9]" class="form-control"
                                       name="fee"
                                       title='Only Number' min="1" step="1">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="note" class="col-md-4 control-label">Note</label>

                            <div class="col-md-6">
                                <textarea  id="note" type="text"
                                           value="{{ $characters->note}}"
                                           name="note" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-1 col-md-offset-4">
                                <a href="{{ route('event_types_list') }}">
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
    </div>
</div>
@endsection
