@extends('layouts.app')

@section('content')
<div class="col-md-11">
    <div class="panel panel-default">
        <div class="panel-heading">Add a member to the event "{{ $event-> name}}"</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('post_edit_guest') }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name" class="col-md-1 control-label">Guest: </label>
                    <div class="col-md-11">
                        <input id="txtSearchMember" disabled
                               class="form-control autocomplete" 
                               value="{{ $member->fullname .' - ' . $member -> nickname . ' - ' . $member -> phone}}" />
                        <input id="Id" type="hidden" value="{{ $guest->id }}" class="form-control" name="id">
                    </div>                          
                    <!--                    <div class="col-md-1">
                                            <a href="{{ route('create_member') }}">
                                                <button type="button" id="myButton" class="btn btn-default" autocomplete="off">
                                                    New member
                                                </button>
                                            </a>
                                        </div>-->
                </div>

                <div class="form-group">
                    <label for="typeId" class="col-md-1 control-label">Status</label>

                    <div class="col-md-6">
                        <select id="statusId" type="number" class="form-control" name="statusId">
                            @foreach($statuses as $status)
                            <option 
                            <?php
                            if ($guest->statusId == $status->id) {
                                echo("selected");
                            }
                            ?> 
                                value="{{ $status->id }}">
                                {{ $status->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>      

                <div class="form-group">                    
                    <label for="note" class="col-md-1 control-label">Note</label>
                    <div class="col-md-11">
                        <textarea  id="note" type="text" 
                                   name="note" class="form-control">{{ $guest->note }}</textarea>
                    </div>
                </div>                

                <div class="form-group">
                    <!--                    <div class="col-md-2 col-md-offset-1">
                                            <a href="{{ route('create_member') }}">
                                                <button type="button" id="myButton" class="btn btn-link" autocomplete="off">
                                                    New member
                                                </button>
                                            </a>
                                        </div>-->

                    <div class="col-md-1 col-md-offset-1">
                        <button type="submit" id="btnPaid" 
                                id="myButton" class="btn btn-primary" autocomplete="off">
                            Save
                        </button>
                    </div>                   
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
