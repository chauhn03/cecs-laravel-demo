@extends('layouts.app')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Edit member: {{ $characters->fullname }}</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('post_member_edit') }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Full name</label>

                    <div class="col-md-6">
                        <input id="id" value="{{ $characters->id}}" type="hidden" class="form-control" name="id" required autofocus>
                        <input id="fullname" value="{{ $characters->fullname}}" type="text" class="form-control" name="fullname" required autofocus>

                        </input>
                        @if ($errors->has('fullname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fullname') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="nickname" class="col-md-4 control-label">Nick name</label>

                    <div class="col-md-6">
                        <input id="nickname" value="{{ $characters->nickname}}" type="text" class="form-control" name="nickname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="en_name" class="col-md-4 control-label">English name</label>

                    <div class="col-md-6">
                        <input id="en_name" type="text" value="{{ $characters->en_name}}" class="form-control" name="en_name">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" value="{{ $characters->email}}" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Phone</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" name="phone" 
                               class="form-control bfh-phone" data-country="US" 
                               value="{{ $characters->phone}}"
                               required>
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Facebook</label>

                    <div class="col-md-6">
                        <input id="facebook" name="facebook" type="text" class="form-control bfh-phone" 
                               data-country="US" value="{{ $characters->facebook}}" required>
                        @if ($errors->has('facebook'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                        @endif
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
                        <button name="submit" type="submit" class="btn btn-primary" value="save">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
