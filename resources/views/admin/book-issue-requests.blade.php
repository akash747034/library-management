@extends('layouts.app')

@section('scripts')

<script>
    $(document).ready(function() {
        var tabel = $('#datatables-basic').DataTable({
            ajax: '{{route("book-issue.requests") }}',
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


        $('#saveStatus').click(function() {
            $('#statusForm').submit();
        });

    });
</script>

<script>
    $(document).on('click', '.open-modal', function(event) {
        event.preventDefault();

        let bookId = $(this).data('id');
        let status = $(this).data('status');

        $('#rowId').val(bookId);
        $('#statusModal').modal('show');
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


    setTimeout(function() {
        let successMessage = document.getElementById('successFailedMessage');
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
    <span class="text-muted fw-light">Issue Book Requests</span>
</h4>


@if(session('failed'))
<div id="successFailedMessage" class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('failed') }}
</div>
@endif

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


<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="statusForm" action="{{route('admin.book-issue')}}" method="POST">
                    @csrf
                    <input type="hidden" id="rowId" name="book_id">

                    <label for="statusSelect">Select Status:</label>

                    <select id="statusSelect" class="form-control" name="issue_status">
                        <option value="issued" selected>Accept</option>
                        <option value="rejected">Reject</option>
                    </select>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveStatus">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection