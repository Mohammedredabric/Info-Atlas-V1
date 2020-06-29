
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css" />
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    @include('panles.breadcrumb')

@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.min.js"></script>
    <script type="text/javascript">
        @if(!empty($category))
        $('.social-icon').iconpicker();
        $(".search-control").attr('name','icon_class');
        $(".search-control").val("{{($category->icon_class)? $category->icon_class:""}} ");
        @endif
        $('#DataTableAmenities').DataTable(
            {
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            }
        );
        $('.Country,#multicat').select2();
       /* $('input.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });*/

        $('#summernoten,#about_us,#terms_and_condition,#privacy_policy,#faq').summernote({
            height: 160,
        });
        $('#content').summernote({
            height: 250,
            placeholder: 'write here...'

        });


        $('#dataTable').dataTable()

    </script>
@stop

