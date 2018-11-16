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
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Total Details</h5>
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
                        <div class="row" style="padding: 10px">
                            <div class="col-md-2" style="border-right: 1px solid #ccdae4">
                                <label for="">Total Partner Invest</label>
                                <h2>{{$totalPartnerInv[0]->amount}}</h2>
                            </div>
                            <div class="col-md-2" style="border-right: 1px solid #ccdae4">
                                <label for="">Total Debit</label>
                                <h2>{{$total[0]->total_debit}}</h2>
                            </div>
                            <div class="col-md-2" style="border-right: 1px solid #ccdae4">
                                <label for="">Total Credit</label>
                                <h2>{{$total[0]->total_credit}}</h2>
                            </div>
                            <div class="col-md-2" style="border-right: 1px solid #ccdae4">
                                <label for="">Now Balance</label>
                                <h2>{{$total[0]->total}}</h2>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>


                        <div class="table-responsive">
                            <table id="tableAvg"
                                   class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Date</th>
                                    <th>Total Account</th>
                                    <th>Total Debit</th>
                                    <th>Total Credit</th>
                                    <th>Differance</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? $serial = 1; ?>
                                @foreach($avg as $single)
                                    <tr class="gradeX">
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $single->date }}</td>
                                        <td>{{ $single->total_account }}</td>
                                        <td>{{ $single->debit }}</td>
                                        <td>{{ $single->credit }}</td>
                                        <td>{{ $single->differance }}</td>
                                        <td><a href="{{URL::to('reports/' ."?date=". $single->date)}}" style="margin: -3px" class="btn btn-circle btn-primary btn-outline small-btn"><i
                                                        class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Serial</th>
                                    <th>Date</th>
                                    <th>Total Account</th>
                                    <th>Total Debit</th>
                                    <th>Total Credit</th>
                                    <th>Differance</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
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

            $('#tableAvg tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input style="width: 100%" class="form-control" type="text" placeholder="Search..." />' );
            } );

            // DataTable
            var tableAV = $('#tableAvg').DataTable();

            // Apply the search
            tableAV.columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );

            tableAV.order( [ 1, 'desc' ] )
                .draw();

        });

    </script>

@endsection