@push('scripts')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $('#table').DataTable({
                    serverSide: true,
                    processing: true,
                    ajax: '{{ route('admin.category.get-categories') }}',
                    columns: [{
                            data: 'id',
                        },
                        {
                            data: 'name',
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: 'action'
                        }
                    ]
                })
                $(document).on('click', '.status', function(){
                    let id = $(this).data('id');
                    let status = $(this).data('status');

                    let parent = $(this);
                    let parentRow = parent.closest('tr');
                    let statusElement = parentRow.find('.status-pointer');

                    let datas = {
                        '_token': '{{ csrf_token() }}',
                        'id' : id,
                        'status' : status
                    };

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.category.status-change') }}',
                        data: datas,
                        dataType: 'json',
                        success: function(response){
                            if(status == 0){
                                parent.data('status', 1);
                                statusElement.removeClass('bg-success').addClass('bg-danger');
                                statusElement.html('INACTIVE');
                                toastr.success("Changed successfully." ,"Status Change");
                            }else{
                                parent.data('status', 0);
                                statusElement.removeClass('bg-danger').addClass('bg-success');
                                statusElement.html('ACTIVE');
                                toastr.success("Changed successfully." ,"Status Change");
                            }
                        },
                        error: function(response){

                            toastr.error("Something want wrong." ,"Status Change");

                        }
                    })

                })
                $(document).on('click', '.edit', function(){
                    let parent = $(this);
                    let parentRow = parent.closest('tr');
                    let data = parentRow.find('.category-update');
                    let form_data = data.clone();
                    form_data.show();
                    $('#modal-body').empty();
                    $('#modal-label').html('Category Edit');
                    $('#modal-body').append(form_data);
                })
            })
        })(jQuery);
    </script>
@endpush
