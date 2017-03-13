@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-9 col-md-offset-1">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('delete_members_list') }}">
            {{ csrf_field() }}
            
            <div class="row">
                <div class="panel panel-success">
                    <div class="panel-heading">List of Game of Thrones Characters</div>

                    @if(Auth::check())                                                    
                    <!-- Table -->
                    <table class="table">
                        <tr>
                            <th></th>
                            <th>Nick name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Facebook</th>
                        </tr>
                        @foreach($characters as $member)
                        <tr>
                            <td><input type="checkbox" name="checkboxDelete[]" value="{{ $member->id }}"/></td>
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

                <button type="submit" id="myButton" data-loading-text="Loading..." class="btn btn-primary" autocomplete="off">
                    Delete
                </button>
            </div>  
        </form>
    </div>
</div>
@endsection
