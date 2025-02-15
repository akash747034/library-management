@extends('layouts.app')

@section('scripts')


<script>
    $(document).ready(function() {
        var tabel = $('#datatables-basic').DataTable({
            ajax: '{{route("books.issued") }}',
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },

                {
                    "data": "book.name"
                },

                {
                    "data": "book.auther.name"
                },

                {
                    "data": "issue_status"
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
    <span class="text-muted fw-light">Issued Books</span>
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
                    <th>Name</th>
                    <th>Auther Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Created At</th>

                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection