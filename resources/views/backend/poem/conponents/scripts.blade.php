@push('scripts')
    <script>
        $(document).ready(function() {
            $('#category').select2();
            $.ajax({
                type: 'get',
                url: '{{ route('admin.category.get-categories-by-ajax') }}',
                dataType: 'json',
                success: function(response) {
                    $.each(response.data, function(key, value) {
                        $('#category').append('<option value=' + value.id + '>' + value.name +
                            '</option>')
                    })
                }
            })

            $('#table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{ route('admin.poems.get-data') }}',
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'image'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action'
                    }
                ]
            });

            $(document).on('click', '.edit', function() {
                $parent = $(this);
                $data = $parent.closest('tr');
                $modal_data = $data.find('.modal-data').clone();
                $modal_data.show();

                $('#modal-body').empty();
                $('#modal-label').html('Poem');
                $('#modal-body').append($modal_data);
            })

            $(document).on('click', '.status', function() {
                let id = $(this).data('id');
                let status = $(this).data('status');

                let parent = $(this);
                let parentRow = parent.closest('tr');
                let statusElement = parentRow.find('.status-pointer');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.poems.status-change') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                        'status': status
                    },
                    success: function(response) {

                        console.log('Hello');

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
                        toastr.error("Something went wrong." ,"Status Change");
                    }
                })

            })
        })
    </script>
@endpush
