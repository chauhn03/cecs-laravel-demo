@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                <li><a href="href="{{ route('event_types_list')}}">Events</a></li>
                <li><a href="href="{{ route('members_list')}}">Thành viên</a></li>
                <li><a href="#">Export</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item</a></li>
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
                <li><a href="">More navigation</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
            </ul>
        </div>
        <div class="col-md-9 col-md-offset-1">
            <div class="row">
                <div class="panel panel-success">
                <div class="panel-heading">List of Game of Thrones Characters</div>

                @if(Auth::check())
                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>Nick name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Facebook</th>
                    </tr>
                    @foreach($characters as $member)
                    <tr>
                        <td> <a href="{{ route('member_edit', ['id' => $member->id]) }}"> {{ $member->nickname }}</a></td>
                        <td> {{ $member->phone }}</td>
                        <td> {{ $member->email }}</td>
                        <td> <a href="{{ $member->facebook }}"> {{ $member->nickname }}</a></td>
                    </tr>
                    @endforeach
                </table>
                @endif                
            </div>                       
            </div>
            <div class="row">
                
                <a href="{{ route('create_member') }}">
                    <button type="button" id="myButton" data-loading-text="Loading..." class="btn btn-primary" autocomplete="off">
                    Add new
                </button>
                </a>
                
            </div>            
        </div>
    </div>
</div>
@endsection
