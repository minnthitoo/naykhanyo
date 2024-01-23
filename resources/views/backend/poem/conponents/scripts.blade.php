@push('scripts')
    <script>
        $(document).ready(function(){
            $('#category').select2();
            $.ajax({
                type: 'get',
                url: '{{ route('admin.category.get-categories-by-ajax') }}',
                dataType: 'json',
                success: function(response) {
                    $.each(response.data, function(key, value) {
                        $('#category').append('<option value=' + value.id + '>' + value.name + '</option>')
                    })
                }
            })

            $('#table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{ route('admin.poems.get-data') }}',
                columns: [
                    {
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

            $(document).on('click', '.edit', function(){
                $parent = $(this);
                $data = $parent.closest('tr');
                $modal_data = $data.find('.modal-data').clone();
                $modal_data.show();

                $('#modal-body').empty();
                $('#modal-label').html('Poem');
                $('#modal-body').append($modal_data);
            })
        })
    </script>
@endpush
