@extends('adminLayout')

@section('head')
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .select2-container.select2-container--default.select2-container--open {
            z-index: 5000;
        }

        #list li.active {
            background-color: #e4f6ff;
        !important;
        }

        #list li.active a {
            color: #5b5b71;
        !important;
        }

    </style>
@endsection

@section('content')
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1"> Accounts</a></li>
            <li class=""><a data-toggle="tab" href="#tab-2">Tabs</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="panel-body">
                    <div class="wrapper wrapper-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Add Income and Expenditure</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-user">
                                                <li><a href="#">Config option 1</a>
                                                </li>
                                                <li><a href="#">Config option 2</a>
                                                </li>
                                            </ul>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content" style="padding: 9px">
                                        <div class="container row">
                                            <ul id="list" class="nav bg-color nav-stacked col-md-2" style="width: auto">
                                                <li class="active totip" title="Add Account"><a href="#tab_a" data-toggle="pill"><i
                                                                class="fa fa-bookmark-o"></i></a></li>
                                                <li class="totip" title="Instant Add" ><a href="#tab_b" data-toggle="pill"><i
                                                                class="fa fa-plus-square"></i></a></li>
                                            </ul>
                                            <div class="tab-content col-md-10">
                                                <div class="tab-pane active" id="tab_a">
                                                    <div class="row" style="margin-top: 20px;margin-bottom: -5px">
                                                        <div class="col-md-3">
                                                            <label for="tab_id">Select Tab</label>
                                                            <select id="tab_id" onchange="show_dc()"
                                                                    class="select2 form-control">
                                                                <option readonly value="">Select One</option>
                                                                @foreach($allData as $data)
                                                                    <option value='{"id":{{$data->id}},"type":"{{$data->type}}","name":"{{$data->name}}"}'>{{$data->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div style="top: 25px" class="col-md-1"><strong
                                                                    id="out"></strong></div>
                                                        <div class="col-md-3">
                                                            <label for="">Amount</label>
                                                            <input id="num" type="number" class="form-control">

                                                        </div>
                                                        <div style="margin-top: 16px;margin-bottom: 16px;border-right: 1px solid #c6c3c1;padding-right: 90px"
                                                             class="col-md-1">
                                                            <button onclick="insert_acc()" class="btn btn-primary"
                                                                    style="margin-top: 8px">Save
                                                            </button>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="">Balance</label>
                                                            <h2 id="total">{{ $total[0]->total == null ? $total_invst[0]->amount : $total[0]->total}}<span>/=</span></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab_b">
                                                    <div class="row" style="margin-top:19px">
                                                        <div  class="col-md-3">
                                                            <label for="">Tab Name</label>
                                                            <input id="tab_name" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-2" style="margin-top: 14px">
                                                            <div class="i-checks"><label> <input id="dt" name="type" type="radio">
                                                                    <i></i>&nbsp;&nbsp;Debit
                                                                </label></div>
                                                            <div class="i-checks"><label> <input id="ct" name="type" type="radio">
                                                                    <i></i>&nbsp;&nbsp;Credit
                                                                </label></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Amount</label>
                                                            <input id="amount" type="text" class="form-control" placeholder="Amount...">
                                                        </div>
                                                        <div class="col-md-2" style="top:14px">
                                                            <button onclick="instant_insert()" class="btn btn-primary"
                                                                    style="margin-top: 8px">
                                                                Save
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- tab content -->
                                        </div>


                                    </div>
                                </div>
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Account Details</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-user">
                                                <li><a href="#">Config option 1</a>
                                                </li>
                                                <li><a href="#">Config option 2</a>
                                                </li>
                                            </ul>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="table-responsive">
                                            <table id="tableAcc"
                                                   class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>Date</th>
                                                    <th>Name</th>
                                                    <th>Debit</th>
                                                    <th>Credit</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <? $serial = 1; ?>
                                                @foreach($allAcc as $acc)
                                                    <tr class="gradeX">
                                                        <td>{{ $serial++ }}</td>
                                                        <td>{{ $acc->created_at }}</td>
                                                        <td>{{ $acc->name }}</td>
                                                        <td>{{ $acc->debit }}</td>
                                                        <td>{{ $acc->credit }}</td>
                                                        <td>{{ $acc->total }}</td>
                                                        <td>
                                                            @if($loop->last)
                                                                <button style="margin: -3px" name="{{ $acc->id }}"
                                                                        onclick="up_set_acc(this)"
                                                                        class="btn btn-circle btn-warning btn-outline small-btn"
                                                                        data-toggle="modal" data-target="#editAcc"><i
                                                                            class="fa fa-pencil"></i></button>
                                                                <button style="margin: -3px;margin-left: 5px"
                                                                        name="{{ $acc->id }}"
                                                                        onclick="del_set_acc(this)"
                                                                        class="btn btn-circle btn-danger btn-outline small-btn"
                                                                        data-toggle="modal" data-target="#delAcc"><i
                                                                            class="fa fa-trash"></i></button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="editAcc" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Tabs</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div style="margin-left:15px;" class="col-md-4">
                                        <label for="tab_id">Select Tab</label>
                                        <input type="hidden" id="u_id">
                                        <select id="u_tab_id" onchange="get_tab_name()" class="select2nd form-control"
                                                style="width: 100% ">
                                            <option readonly value="">Select One</option>
                                            @foreach($allData as $data)
                                                <option value='{{$data->id}}'>{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Debit</label>
                                        <input id="u_dr" type="number" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Credit</label>
                                        <input id="u_cr" type="number" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button onclick="edit_acc()" type="button" class="btn btn-warning" data-dismiss="modal">
                                    Update
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="delAcc" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Delete Item</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="del_id_acc">
                                Are You Sure Want To Delete This Item?
                            </div>
                            <div class="modal-footer">
                                <button onclick="del_acc()" type="button" class="btn btn-danger" data-dismiss="modal">
                                    Delete
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{--############## SECOND TAB #############--}}
            <div id="tab-2" class="tab-pane">
                <div class="panel-body">
                    <div class="wrapper wrapper-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Add new Tab</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-user">
                                                <li><a href="#">Config option 1</a>
                                                </li>
                                                <li><a href="#">Config option 2</a>
                                                </li>
                                            </ul>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div style="margin-left:15px;margin-top: 8px" class="col-md-4">
                                                <div class="input-group"><span class="input-group-btn"><button type="button"
                                                                          class="btn btn-primary btn-outline">Name</button></span>
                                                    <input id="name" type="text" class="form-control"
                                                           placeholder="Name...">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="i-checks"><label> <input id="dr" name="type" type="radio">
                                                        <i></i>&nbsp;&nbsp;Debit
                                                    </label></div>
                                                <div class="i-checks"><label> <input id="cr" name="type" type="radio">
                                                        <i></i>&nbsp;&nbsp;Credit
                                                    </label></div>

                                            </div>
                                            <div class="col-md-2">
                                                <button onclick="insert()" class="btn btn-primary"
                                                        style="margin-top: 8px">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Calculation Tabs</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-user">
                                                <li><a href="#">Config option 1</a>
                                                </li>
                                                <li><a href="#">Config option 2</a>
                                                </li>
                                            </ul>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">

                                        <div class="table-responsive">
                                            <table id="table"
                                                   class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>Tab Name</th>
                                                    <th>Type</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <? $serial = 1; ?>
                                                @foreach($allData as $data)
                                                    <tr class="gradeX">
                                                        <td>{{ $serial++ }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->type }}</td>
                                                        <td>
                                                            <button style="margin: -3px" name="{{ $data->id }}"
                                                                    onclick="up_set(this)"
                                                                    class="btn btn-circle btn-warning btn-outline small-btn"
                                                                    data-toggle="modal" data-target="#editModal"><i
                                                                        class="fa fa-pencil"></i></button>
                                                            <button style="margin: -3px;margin-left: 5px"
                                                                    name="{{ $data->id }}" onclick="del_set(this)"
                                                                    class="btn btn-circle btn-danger btn-outline small-btn"
                                                                    data-toggle="modal" data-target="#delModal"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="editModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Tabs</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="id">
                                    <div class="input-group">
                                    <span class="input-group-btn"><button type="button"
                                                                          class="btn btn-primary btn-outline">Name</button></span>
                                        <input id="u_name" type="text" class="form-control" placeholder="Name...">
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3">
                                            <div class="i-checks"><label> <input id="u_dt" name="u_type" type="radio">
                                                    <i></i>&nbsp;&nbsp;Debit</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="i-checks"><label> <input id="u_ct" name="u_type" type="radio">
                                                    <i></i>&nbsp;&nbsp;Credit
                                                </label></div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button onclick="edit()" type="button" class="btn btn-warning" data-dismiss="modal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="delModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete Item</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="del_id">
                                    Are You Sure Want To Delete This Item?
                                </div>
                                <div class="modal-footer">
                                    <button onclick="del()" type="button" class="btn btn-danger" data-dismiss="modal">
                                        Delete
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="js/plugins/select2/select2.full.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });
            var tableAcc = $('#tableAcc').DataTable();
            tableAcc.order( [ 1, 'desc' ] )
                .draw();

            $(".select2").select2();
            $(".select2nd").select2();
            $('.totip').tooltipster({
                animation: 'grow',
                side:'right'
            });
        });

    </script>

    <script>
        var table = document.getElementById('table');
        var tableAcc = document.getElementById('tableAcc');
        var row, get_tab_nam;

        function insert() {
            var typ;
            $('#dr').is(':checked') ? typ = 0 : typ = 1;

            var lastid = $('table tr:last').find('td:first').text();
            var newId = parseInt(lastid) + 1;

            var nam = $('#name').val();

            var send_data = {
                'name': nam,
                'type': typ
            };

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('tab.store') }}",
                type: 'POST',
                data: send_data,
                success: function (msg) {
                    if (msg == 'saved') {
                        //console.log("ok");
                        $('#name').val("");
                        $('[name="type"]').iCheck('uncheck');
                        $('#table tbody').append([
                            '<tr>',
                            '<td>', newId, '</td>',
                            '<td>', nam, '</td>',
                            '<td>', typ == 0 ? "Debit" : " Credit", '</td>',
                            '<td>', '<button style="margin: -3px" class="small-btn btn btn-primary btn-circle btn-outline" onclick="location.reload()">', '<i class="fa fa-refresh"></i>', '</button>', '</td>',
                            '</tr>',
                        ].join(''));

                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.success('Successfully Added new Tab', 'Added');

                        }, 0);
                    }
                },
                error:function () {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Something Wrong', 'Failed');
                    }, 0);
                }
            });
        }

        function insert_acc() {
            var dr, cr, update_total;
            var tab_json = JSON.parse($('#tab_id').val());
            var tab_id = tab_json.id;
            var tab_type = tab_json.type;
            const tab_name = tab_json.name;
            var type = $('#out').html();
            var amnt = parseInt($('#num').val());
            var total = parseInt($('#total').html());

            type === ' - Debit' ? dr = amnt : cr = amnt;
            type === ' - Debit' ? update_total = total + amnt : update_total = total - amnt;

            var lastid = $('#tableAcc tr:eq(1) > td:eq(0)').text();
            var newId = parseInt(lastid) + 1;

            var send_data = {
                "tab_id": tab_id,
                "debit": dr,
                "credit": cr,
                "total": update_total
            };
            //console.log(send_data);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('acc.store')}}",
                type: 'POST',
                data: send_data,
                success: function (msg) {
                    if (msg == 'saved') {
                        //console.log("ok");
                        $('#tab_id').val("");
                        $('#num').val("");
                        $('#tableAcc tbody').prepend([
                            '<tr>',
                            '<td>', newId, '</td>',
                            '<td>', 'Reload', '</td>',
                            '<td>', tab_name, '</td>',
                            '<td>', dr, '</td>',
                            '<td>', cr, '</td>',
                            '<td>', update_total, '</td>',
                            '<td>', '<button style="margin: -3px" class="small-btn btn btn-primary btn-circle btn-outline" onclick="location.reload()">', '<i class="fa fa-refresh"></i>', '</button>', '</td>',
                            '</tr>',
                        ].join(''));
                        $('#total').html(update_total);
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.success('Successfully Added new Account', 'Added');

                        }, 0);
                    }
                },
                error:function () {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Something Wrong', 'Failed');
                    }, 0);
                }
            });
        }

        function up_set(e) {
            row = e.parentNode.parentNode.rowIndex;
            document.getElementById("id").value = e.name;
            document.getElementById("u_name").value = table.rows[row].cells[1].innerHTML;
            var typ = table.rows[row].cells[2].innerHTML;
            typ == 'Debit' ? $('#u_dt').iCheck('check') : $('#u_ct').iCheck('check');

        }

        function up_set_acc(e) {
            row = e.parentNode.parentNode.rowIndex;
            document.getElementById('u_id').value = e.name;
            document.getElementById("u_dr").value = tableAcc.rows[row].cells[3].innerHTML;
            document.getElementById("u_cr").value = tableAcc.rows[row].cells[4].innerHTML;
        }

        function edit() {
            var typ;
            $('#u_dt').is(':checked') ? typ = 0 : typ = 1;

            var u_id = $('#id').val();
            var name = $('#u_name').val();
            var typ = typ;

            var send_data = {
                'id': u_id,
                'name': name,
                'type': typ
            };
            //console.log(send_data);
            const u = "{{ url('/tab') }}" + "/" + u_id;

            /*url = url.replace('id', u_id);*/

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: u,
                type: 'PUT',
                data: send_data,
                dataType: 'json',
                success: function (msg) {
                    if (msg == 'edited') {
                        table.rows[row].cells[1].innerHTML = name;
                        table.rows[row].cells[2].innerHTML = typ == 0 ? 'Debit' : 'Credit';
                        // console.log('okkk');
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.warning('Successfully Item Edited', 'Edited');

                        }, 0);
                    }
                },
                error:function () {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Something Wrong', 'Failed');
                    }, 0);
                }
            });
        }

        function edit_acc() {
            var id = $('#u_id').val();
            var tab_id = $('#u_tab_id').val();
            var dr = parseInt($('#u_dr').val());
            var cr = parseInt($('#u_cr').val());

            var total = 0;
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                async: false,
                url: '{{url('tab/acc/last')}}',
                type: 'POST',
                dataType: 'json',
                success: function (s_last_data) {
                    total = parseInt(s_last_data);
                }
            });

            if (isNaN(dr)) {
                total -= cr;
                dr = "";
            } else {
                total += dr;
                cr = "";
            }

            var data = {
                "id": id,
                "tab_id": tab_id,
                "debit": dr,
                "credit": cr,
                "total": total
            };
            //console.log(data);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '{{route('acc.update','edit')}}',
                type: 'patch',
                data: data,
                dataType: 'json',
                success: function (msg) {
                    if (msg == 'update') {
                        tableAcc.rows[row].cells[2].innerHTML = get_tab_nam;
                        tableAcc.rows[row].cells[3].innerHTML = dr;
                        tableAcc.rows[row].cells[4].innerHTML = cr;
                        tableAcc.rows[row].cells[5].innerHTML = total;
                        $('#total').html(total);
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.warning('Successfully Edited Account', 'Updated');

                        }, 0);
                    }
                },
                error:function () {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Something Wrong', 'Failed');
                    }, 0);
                }
            })

        }

        function del_set(e) {
            row = e.parentNode.parentNode.rowIndex;
            $('#del_id').val(e.name);
        }

        function del_set_acc(e) {
            $('#del_id_acc').val(e.name);
            row = e.parentNode.parentNode.rowIndex;
        }

        function del() {
            var del_id = $('#del_id').val();
            var send_data = {"id": del_id};
            const u = "{{ url('/tab') }}" + "/" + del_id;

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: u,
                type: 'DELETE',
                data: send_data,
                success: function (msg) {
                    if (msg == 'deleted') {
                        //console.log('ok');
                        $('#table tr:eq(' + row + ')').remove();
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.error('Successfully Added Deleted Tab', 'Deleted');

                        }, 0);
                    }
                },
                error:function () {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Something Wrong', 'Failed');
                    }, 0);
                }

            });
        }

        function del_acc() {
            var send_data = {
                "id": $('#del_id_acc').val()
            };

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '{{route('acc.destroy','del')}}',
                type: 'DELETE',
                data: send_data,
                dataType: 'json',
                success: function (msg) {
                    if (msg == 'deleted') {
                        //console.log('ok');
                        //last_row = $("#tableAcc tr:last").prev().find("td").html();
                        $('#tableAcc tr:eq(' + row + ')').remove();
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.error('Successfully Deleted Tab', 'Deleted');
                        }, 0);

                        $('#total').text(tableAcc.rows[1].cells[5].innerHTML);
                    }
                },
                error:function () {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Something Wrong', 'Failed');
                    }, 0);
                }

            });
        }

        function show_dc() {
            var string = document.getElementById('tab_id').value;
            var json = JSON.parse(string);
            var typ = json.type;
            var show_typ;
            typ === 'Debit' ? show_typ = ' - Debit' : show_typ = ' - Credit';
            document.getElementById('out').innerHTML = show_typ;
        }

        document.getElementById('u_dr').addEventListener('keyup', function () {
            document.getElementById('u_cr').value = '';
        });
        document.getElementById('u_cr').addEventListener('keyup', function () {
            document.getElementById('u_dr').value = '';
        });

        function get_tab_name() {
            var nam = document.getElementById('u_tab_id').options[document.getElementById('u_tab_id').selectedIndex].text;
            get_tab_nam = nam;
        }

        function instant_insert(){
            var typp,tab_id;
            $('#dt').is(':checked') ? typp = 0 : typp = 1;
            var tab_name = $('#tab_name').val();
            var amount= parseInt($('#amount').val());

            var lastid = $('table tr:last').find('td:first').text();
            var newId = parseInt(lastid) + 1;

            var send_data = {
                'name': tab_name,
                'type': typp
            };

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                async:false,
                url: "{{ route('tab.store') }}",
                type: 'POST',
                data: send_data,
                success: function (msg) {
                    if (msg == 'saved') {
                        //console.log("ok");
                        $('#tab_name').val("");
                        $('[name="type"]').iCheck('uncheck');
                        $('#table tbody').append([
                            '<tr>',
                            '<td>', newId, '</td>',
                            '<td>', tab_name, '</td>',
                            '<td>', typp == 0 ? "Debit" : " Credit", '</td>',
                            '<td>', '<button style="margin: -3px" class="small-btn btn btn-primary btn-circle btn-outline" onclick="location.reload()">', '<i class="fa fa-refresh"></i>', '</button>', '</td>',
                            '</tr>',
                        ].join(''));
                    }
                },
                error:function () {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Something Wrong', 'Failed');
                    }, 0);
                }
            });

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                async:false,
                url: "{{ route('tab.show',"show") }}",
                type: 'GET',
                dataType:'json',
                success: function (rst) {
                    tab_id=parseInt(rst);
                },
                error:function () {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Something Wrong', 'Failed');
                    }, 0);
                }
            });

            var dr, cr, update_total;

            var total = parseInt($('#total').html());

            typp === 0 ? dr = amount : cr = amount;
            typp === 0 ? update_total = total + amount : update_total = total - amount;

            //var lastid = $('#tableAcc tr:last').find('td:first').text();
            var lastid = $('#tableAcc tr:eq(1) > td:eq(0)').text();
            var newId = parseInt(lastid) + 1;

            var send_data = {
                "tab_id": tab_id,
                "debit": dr,
                "credit": cr,
                "total": update_total
            };
            //console.log(send_data);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('acc.store')}}",
                type: 'POST',
                data: send_data,
                success: function (msg) {
                    if (msg == 'saved') {
                        //console.log("ok");
                        $('#tab_id').val("");
                        $('#num').val("");
                        $('#tableAcc tbody').prepend([
                            '<tr>',
                            '<td>', newId, '</td>',
                            '<td>', 'Reload', '</td>',
                            '<td>', tab_name, '</td>',
                            '<td>', dr, '</td>',
                            '<td>', cr, '</td>',
                            '<td>', update_total, '</td>',
                            '<td>', '<button style="margin: -3px" class="small-btn btn btn-primary btn-circle btn-outline" onclick="location.reload()">', '<i class="fa fa-refresh"></i>', '</button>', '</td>',
                            '</tr>',
                        ].join(''));
                        $('#total').html(update_total);
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.success('Successfully Added new Account', 'Added');

                        }, 0);
                    }
                },
                error:function () {
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error('Something Wrong', 'Failed');
                    }, 0);
                }
            });

        }


    </script>
@endsection