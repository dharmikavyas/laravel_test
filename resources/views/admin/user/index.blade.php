@extends('admin.layouts.app')
@section('title','User')
@section('breadcrumb','user dashboard')
@section('main-content')
@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 add_button"> 
            <div class="btn-group float-sm-right">
                <a href="{{ route('user.create') }}" class="btn btn-info"> <i class="fas fa-plus-circle"></i> Add New</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h3 class="card-title">Data Table With Full Features</h3>
                </div> --}}
                <div class="card-body">
                    <table id="datatables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 4.0
                                </td>
                                <td>Win 95+</td>
                                <td> 4</td>
                                <td>X</td>
                            </tr>
                           
                            <tr>
                                <td>Other browsers</td>
                                <td>All others</td>
                                <td>-</td>
                                <td>-</td>
                                <td>U</td>
                            </tr>
                        </tbody>
                       {{--  <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>    
</div>
@section('js')
<script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/fastclick/fastclick.js')}}"></script>
@stop
@section('other_js')
<script>
    $(function () {
        $('#datatables').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script> 
@stop
@endsection