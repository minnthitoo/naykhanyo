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
            })
        })(jQuery);
    </script>
@endpush
