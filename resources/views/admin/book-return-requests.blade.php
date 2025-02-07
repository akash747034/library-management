@extends('layouts.app')

@section('scripts')

<script>
    $(document).ready(function() {
        var tabel = $('#datatables-basic').DataTable({
            ajax: '{{route("book-return.requests") }}',
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },


                {
                    "data": "user.name"
                },
                {
                    "data": "book.name"
                },

                {
                    "data": "action"
                },

                {
                    "data": "created_at"
                }

            ]
        });

    });
</script>

<script>
    setTimeout(function() {
        let successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.transition = "opacity 0.5s ease";
            successMessage.style.opacity = "0";
            setTimeout(() => successMessage.remove(), 500);
        }
    }, 3000);
</script>

@endsection


@section('content')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light"> Return Book Reuquest</span>
</h4>

@if(session('success'))
<div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-datatable table-responsive pt-0">
        <table class="datatables-basic table" id="datatables-basic">
            <thead>
                <tr>

                    <th>#</th>
                    <th>User Name</th>
                    <th>Book Name</th>
                    <th>action</th>
                    <th>Created At</th>

                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection