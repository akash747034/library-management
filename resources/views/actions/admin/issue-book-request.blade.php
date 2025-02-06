<form action="{{route('admin.book-issue')}}" method="POST">
 @csrf

  <input type="hidden" name="book_id" value=" {{$book->id}} ">


  <button type="button" class="btn btn-primary" id="updateStatus">
                                    {{ __('Requested') }}
 </button>
  

</form>