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
        })
    </script>
@endpush
