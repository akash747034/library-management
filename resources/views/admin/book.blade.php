@extends('layouts.app')

@section('scripts')

<script>
  $(document).ready(function() {
    var tabel = $('#datatables-basic').DataTable({
      ajax: '{{route("admin.books")}}',
      columns: [{
          data: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },

        {
          "data": "name"
        },
        {
          "data": "auther.name"
        },

        {
          "data": "publisher.name"
        },

        {
          "data": "created_at"
        }

      ]
    });

  });
</script>



@endsection



@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Books</span>
</h4>

<div class="card">
  <div class="card-datatable table-responsive pt-0">
    <table class="datatables-basic table" id="datatables-basic">
      <thead>
        <tr>

          <th>#</th>
          <th>Book Name</th>
          <th>Auther</th>
          <th>Publisher</th>
          <th>Created At</th>

        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection