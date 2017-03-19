@extends('layouts.app')

@section('content')
<div class="col-md-11">
    <div class="panel panel-default">
        <div class="panel-heading">Add a member to the event "{{ $event-> name}}"</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('post_create_member') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <!--<label for="name" class="col-md-1 control-label">Name: </label>-->
                    <div class="col-md-12">
                        <input id="txtSearchMember" class="form-control autocomplete" placeholder="Enter full name/ nick name/ phone" />
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
<!--                    <div class="col-md-2 col-md-offset-1">
                        <a href="{{ route('create_member') }}">
                            <button type="button" id="myButton" class="btn btn-link" autocomplete="off">
                                New member
                            </button>
                        </a>
                    </div>-->

                    <div class="col-md-1">
                        <button type="submit" id="btnPaid" disabled="false" id="myButton" class="btn btn-primary" autocomplete="off">
                            Paid
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('create_member') }}">
                            <button type="button" id="myButton" class="btn btn-default" autocomplete="off">
                                New member
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        initAutoCompleteBox();
        registerAutoCompleteBoxChangedEvent();
        registerAutoCompleteBoxPopupCloseEvent();
    });

    function registerAutoCompleteBoxChangedEvent() {
        var txtSearchMember = document.getElementById("txtSearchMember");
        $(txtSearchMember).on('change keydown paste input', function () {
            onAutoCompleteBoxchange();
        });
    }

    function registerAutoCompleteBoxPopupCloseEvent() {
        $('.ui-widget-content').on('click', function () {
            onAutoCompleteBoxchange();
        });
    }

    function onAutoCompleteBoxchange(searchString) {
        var txtSearchMember = document.getElementById("txtSearchMember");
        var value = txtSearchMember.value;
        var memberId = getMemberId(value);
        disablePaidButton(memberId < 1);
    }

    function disablePaidButton(disable) {
        var buttonPaid = document.getElementById("btnPaid");
        buttonPaid.disabled = disable;
    }

    function getMemberId(searchString) {
        if (!searchString) {
            return 0;
        }

        searchString = searchString.trim();
        var result = 0;
        var members = <?php echo json_encode($members); ?>;
        members.forEach(function (member) {
            var fullName = member.fullname;
            var nickName = member.nickname;
            var phone = member.phone;
            var item = formatAutoCompleteBoxItem(fullName, nickName, phone);
            if (item === searchString) {
                result = member.id;
            }
        });

        return result;
    }

    function initAutoCompleteBox() {
        var dataSource = getAutoCompleteBoxDataSource();
        $(".autocomplete").autocomplete({
            source: dataSource
        });
    }

    function getAutoCompleteBoxDataSource() {
        var members = <?php echo json_encode($members); ?>;
        var availableTags = [];
        members.forEach(function (member) {
            var fullName = member.fullname;
            var nickName = member.nickname;
            var phone = member.phone;
            var item = formatAutoCompleteBoxItem(fullName, nickName, phone);
            availableTags.push(item);
        });

        return availableTags;
    }

    function formatAutoCompleteBoxItem(fullname, nickName, phone) {
        return fullname + " - " + nickName + " - " + phone;
    }
</script>
@endsection
