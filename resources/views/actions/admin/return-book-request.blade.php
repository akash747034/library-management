<form action="{{route('admin.book-return')}}" method="POST">
 @csrf

  <input type="hidden" name="book_id" value=" {{$book->id}} ">

  <button type="submit" class="btn btn-primary">
                                    {{ __('Accept return request') }}
 </button>
  
</form>

