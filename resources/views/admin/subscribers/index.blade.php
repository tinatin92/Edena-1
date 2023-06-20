
@extends('admin.layouts.app')
@push('name')
    {{ trans('admin.subscribers') }}
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">

            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>
                            {{ trans('admin.email') }}
                           
                        </th>
                        <th>
                            {{ trans('admin.name') }}
                           
                        </th>

                        <th>
                            {{ trans('admin.surname') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $subscriber)
                    
                        <tr>   
                            <td class="">
                                
                                <a href="mailto:{{ $subscriber->email}}" target="blank" style="color: #414141">{{ $subscriber->email }}</a>

                                
                            </td>
                            <td>
                                <a href="{{ $subscriber->name}}" target="blank" style="color: #414141">{{ $subscriber->name }}</a>
                            </td>
                            <td>
                                <a href="{{ $subscriber->surname}}" target="blank" style="color: #414141">{{ $subscriber->surname }}</a>
                            </td>
                            <td>
                                <a href="/{{ app()->getLocale() }}/admin/subscribers/delete/{{$subscriber->id}}" class="btn btn-danger" style="float: right" onclick="return confirm('დარწმნებლი ხართ რომ გსურთ  წაშლა ?');">{{trans('admin.delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a class="btn btn-warning" href="/{{ app()->getLocale() }}/admin/subscribers/export">
            <img src="/website/assets/img/excel.png" alt="">F
            Export Subscribers List</a>
    </div>
</div>
@endsection

@push('styles')
    <!-- third party css -->
        <link href="{{ asset('/admin/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/admin/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endpush

@push('scripts')
    <!-- third party js -->
    <script src="{{ asset('/admin/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/admin/libs/pdfmake/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->
    <!-- Datatables init -->
    <script src="{{ asset('/admin/js/pages/datatables.init.js') }}"></script>
@endpush