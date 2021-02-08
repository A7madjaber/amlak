<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{asset('assets/js/table-data.js')}}"></script>
<script src="{{asset('assets/js/modal.js') }}"></script>

<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
    })

</script>





<script>

    $(document).on("click", "#delete", function(e){

        e.preventDefault();
        var id =  $(this).attr('data-id');
        var route =  $(this).attr('data-route');


        swal({

            title: "هل انت متأكد من الحذف",
            text: "بمجرد الحذف ، سيتم حذف هذا نهائيًا!",
            icon: "warning",
            buttons: ["الغاء", "حذف"],

            dangerMode: true,
        })
            .then((willDelete) => {

                if (willDelete) {

                    $.ajax({
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id' :id,
                        },
                        url: route,
                        type: "post",
                        dataType: "JSON",
                        success : function(data)
                        {
                            swal({

                                text: data.message,
                                icon: "success",
                                buttons:  "موافق",
                            });


                            $('#example1').load(document.URL +  ' #example1');
                        },
                    })

                } else {
                    swal({

                        title: "لم يتم الحذف",
                        icon: "info",
                        buttons:  "موافق",
                    })
                }
            });
    });
</script>
