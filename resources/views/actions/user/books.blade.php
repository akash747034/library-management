<form action="{{route('book.issue')}}" method="POST">
 @csrf

  <input type="hidden" name="book_id" value=" {{$book->id}} ">

  <button type="submit" class="btn btn-primary">
                                    {{ __('Request Book') }}
 </button>
  
</form>