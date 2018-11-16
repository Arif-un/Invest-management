@extends('adminLayout')

@section('head')
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-users"></i> Partners</a></li>
            <li class=""><a data-toggle="tab" href="#tab2"><i class="fa fa-money"></i> Invests</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="panel-body">
                    <div class="wrapper wrapper-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Partner's</h5>
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

                                        <button class="btn btn-outline btn-circle btn-primary btn-lg "
                                                data-toggle="modal" data-target="#addModal"><i
                                                    class="fa fa-user-plus"></i></button>
                                        <strong>Add New </strong>
                                        <br>
                                        <br>
                                        <div class="table-responsive">
                                            
                                            <table id="table"
                                                   class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>Partner Name</th>
                                                    <th>Partner ID</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <? $serial = 1; ?>
                                                @foreach($allData as $data)
                                                    <tr class="gradeX">
                                                        <td>{{ $serial++ }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->partner_id }}</td>
                                                        <td>{{ $data->mobile }}</td>
                                                        <td>{{ $data->email }}</td>
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
                    <div id="addModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Partner</h4>
                                </div>
                                <form action="{{route('partner.store')}}" method="post">
                                    <div class="modal-body">

                                        {{csrf_field()}}
                                        <div class="input-group"><span class="input-group-btn"><button type="button"
                                                                                                       class="btn btn-primary btn-outline">Name</button></span>
                                            <input id="" name="name" type="text" class="form-control"
                                                   placeholder="Name...">
                                        </div>
                                        <br>
                                        <div class="input-group"><span class="input-group-btn"><button type="button"
                                                                                                       class="btn btn-primary btn-outline">Mobile</button></span>
                                            <input id="" name="mobile" type="tel" class="form-control"
                                                   placeholder="Mobile...">
                                        </div>
                                        <br>
                                        <div class="input-group"><span class="input-group-btn"><button type="button"
                                                                                                       class="btn btn-primary btn-outline">Email</button></span>
                                            <input id="" name="email" type="email" class="form-control"
                                                   placeholder="Email...">
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div id="editModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Partner</h4>
                                </div>
                                <form action="{{route('partner.update','id')}}" method="post">
                                    <div class="modal-body">
                                        {{method_field('patch')}}
                                        {{csrf_field()}}
                                        <input id="u_id" type="hidden" name="u_id">
                                        <div class="input-group"><span class="input-group-btn"><button type="button"
                                                                                                       class="btn btn-primary btn-outline">Name</button></span>
                                            <input id="u_name" name="name" type="text" class="form-control"
                                                   placeholder="Name...">
                                        </div>
                                        <br>
                                        <div class="input-group"><span class="input-group-btn"><button type="button"
                                                                                                       class="btn btn-primary btn-outline">Mobile</button></span>
                                            <input id="u_mobile" name="mobile" type="tel" class="form-control"
                                                   placeholder="Mobile...">
                                        </div>
                                        <br>
                                        <div class="input-group"><span class="input-group-btn"><button type="button"
                                                                                                       class="btn btn-primary btn-outline">Email</button></span>
                                            <input id="u_email" name="email" type="email" class="form-control"
                                                   placeholder="Email...">
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Save Changes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div id="delModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete Partner</h4>
                                </div>
                                <form action="{{route('partner.destroy','delete')}}" method="post">
                                    {{ method_field('delete') }}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <input type="hidden" id="del_id" name="id">
                                        Are You Sure Want To Delete This Partner?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{--############## SECOND TAB #############--}}
            <div id="tab2" class="tab-pane">
                <div class="panel-body">
                    <div class="wrapper wrapper-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Add Balance</h5>
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
                                        <form action="{{route('inv.store')}}" method="post">
                                            {!! csrf_field() !!}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="acc">Select Partner</label>
                                                <select id="acc" name="partner_id" class="select2 form-control" style="width: 100%;">
                                                    <option readonly value="">Select One</option>
                                                    @foreach($allData as $data)
                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="">Amount</label>
                                                <input type="number" name="amount" class="form-control">
                                            </div>
                                            <div style="padding-right:95px; margin-top: 16px;margin-bottom: 16px;border-right: 1px solid #c6c3c1" class="col-md-1">
                                                <button onclick="insert()" class="btn btn-primary" style="margin-top: 8px">Save</button>
                                            </div>
                                            <div class="col-md-3" style="margin-left: 20px">
                                                <label for="">Total Amount</label>
                                                <h2>{{$totalPartnerInv[0]->amount}}</h2>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Invest's</h5>
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
                                            <table id="table2"
                                                   class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>Date</th>
                                                    <th>Partner Name</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <? $serial = 1; ?>
                                                @foreach($allInv as $data)
                                                    <tr class="gradeX">
                                                        <td>{{ $serial++ }}</td>
                                                        <td>{{ $data->created_at }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->amount }}</td>
                                                        <td>
                                                            <button style="margin: -3px" name="{{ $data->id }}" data-id="{{$data->partner_id}}"
                                                                    onclick="up_set_inv(this)"
                                                                    class="btn btn-circle btn-warning btn-outline small-btn"
                                                                    data-toggle="modal" data-target="#edit"><i
                                                                        class="fa fa-pencil"></i></button>
                                                            <button style="margin: -3px;margin-left: 5px"
                                                                    name="{{ $data->id }}" onclick="del_set_inv(this)"
                                                                    class="btn btn-circle btn-danger btn-outline small-btn"
                                                                    data-toggle="modal" data-target="#del"><i
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

                    <div id="edit" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Tabs</h4>
                                </div>
                                <form action="{{route('inv.update','edit')}}" method="post">
                                <div class="modal-body">
                                    {{method_field('patch')}}
                                    {{csrf_field()}}
                                    <div class="row">
                                        <input type="hidden" id="partner_id" name="partner_id">
                                        <input type="hidden" id="id" name="id">
                                        <div class="col-md-6">
                                            <label for="acc">Partner</label>
                                            <input class="form-control" id="partner_name" type="text" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Amount</label>
                                            <input id="u_amount" type="number" name="amount" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div id="del" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form action="{{route('inv.destroy',"delete")}}" method="post">
                                {!! method_field('delete') !!}
                                {{csrf_field()}}
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title text-center">Delete Item</h4>
                                </div>
                                <div class="modal-body text-center">
                                    <input type="hidden" id="delete_id" name="id">
                                    Are You Sure Want To Delete This Item?
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                                </form>

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

        });

    </script>
    <script>
        $(".select2").select2({
            width: 'resolve'
        });

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
            });
        }

        function up_set_inv(e) {
            var row = e.parentNode.parentNode.rowIndex;
            var table2 = document.getElementById('table2');
            document.getElementById('id').value = e.name;
            document.getElementById('partner_id').value = e.getAttribute('data-id');
            document.getElementById("partner_name").value = table2.rows[row].cells[2].innerHTML;
            document.getElementById("u_amount").value = table2.rows[row].cells[3].innerHTML;
        }

        function up_set(e) {
            var row = e.parentNode.parentNode.rowIndex;
            var table = document.getElementById('table');
            document.getElementById('u_id').value = e.name;
            document.getElementById("u_name").value = table.rows[row].cells[1].innerHTML;
            document.getElementById("u_mobile").value = table.rows[row].cells[3].innerHTML;
            document.getElementById("u_email").value = table.rows[row].cells[4].innerHTML;
        }

        function del_set(e) {
            row = e.parentNode.parentNode.rowIndex;
            $('#del_id').val(e.name);
        }
        function del_set_inv(e) {
            row = e.parentNode.parentNode.rowIndex;
            $('#delete_id').val(e.name);
        }
        
    </script>
    @if(Session::has('message'))
    <script>
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.{{Session::get('type')}}('{{Session::get("message")}}', "{{Session::get('title')}}");

        }, 0);
    </script>
    @endif
@endsection