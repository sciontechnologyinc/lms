
@extends('lms.master.template')

@section('content')
<style>

.menu-list1 a {
    color:#2e77d1 !important;
}
        
</style>
<div class="Search">Search</div>
<div class="container search">
  <div class="row search">
    <div class="col-sm searchbar">
      <input type="text" id="searchbartext" class="searchbartext" name="bookname" placeholder="Book Name"/>
    </div>
    <div class="col-sm searchbar">
      <input type="text" id="searchbartext1" class="searchbartext" name="authorname" placeholder="Category"/>
    </div>
    <div class="col-sm searchbar">
      <input type="text" id="searchbartext2" class="searchbartext" name="publishername" placeholder="Author Name"/>
    </div>
    <div class="col-sm searchbar">
      <input type="text" id="searchbartext3" class="searchbartext" name="publishername" placeholder="Year Publish"/>
    </div>
  </div>
</div>

<div class="booklist-container">

    <div class="booklist-title">List of Books</div>
    <div class="booklist-row">
    @foreach($books as $book)
        <div class="perbook-container" data-toggle="modal" data-target= "#{{$book->id}}">
        <div class="perbook-img">
                                @if($book->digitalphoto)
                                <img src="{{asset('storage/uploads/'.$book->digitalphoto)}}" alt="">&nbsp;
                                @else
                                <img src="{{asset('storage/uploads/book_icon.png')}}" alt="">
                                @endif
         
        </div>
        <div class="perbook-title"  >{{$book->bookname}} </div>
        <div class="perbook-title" hidden="true" >{{$book->writername}} </div>
        <div class="perbook-title" hidden="true" >{{$book->yearpublish}} </div>
        <div class="perbook-title" hidden="true" >{{$book->categoryname}} </div>
   </div>
   
    @endforeach 
        </div>

    </div>
</div>


<!-- The Modal -->
@foreach($books as $book)
<div class="modal fade" id="{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
  <div class="modal-dialog" role="document">
      
    <div class="modal-content">
      <div class="modal-header">
          
        <h5 class="modal-title" id="exampleModalLabel">{{$book->bookname}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="yearpublish">Year Publish. : {{$book->yearpublish}}</div>
        <div class="book-isbn">Book ISBN No. : {{$book->ISBN}}</div>
        <div class="availbook-number">Available Book No. : {{$book->booknumber}}</div>
        <div class="book-price">Book Price : {{$book->bookprice}}</div>
        <div class="writer-name">Author Name : {{$book->writername}}</div>
        <div class="book-category">Book Category : {{$book->categoryname}}</div>
        <div class="book-status">Status : {{$book->status}}</div>
        <div class="book-type">Book Type : {{$book->booktype}}</div>
        <div class="book-condition">Book Condition : {{$book->bookcondition}}</div>
        <div class="book-adtl-details">Details : {{$book->details}}</div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   
    </div>
    
  </div>
</div>
@endforeach

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#searchbartext").on("keyup", function() {
   var key = this.value;
    $(".perbook-container").each(function() {
       var $this = $(this);
       $this.toggle($(this).text().toLowerCase().indexOf(key) >= 0);
    });

  });

    $("#searchbartext1").on("keyup", function() {
   var key = this.value;
    $(".perbook-container").each(function() {
       var $this = $(this);
       $this.toggle($(this).text().toLowerCase().indexOf(key) >= 0);
    });

  });

  $("#searchbartext2").on("keyup", function() {
   var key = this.value;
    $(".perbook-container").each(function() {
       var $this = $(this);
       $this.toggle($(this).text().toLowerCase().indexOf(key) >= 0);
    });

  });

  $("#searchbartext3").on("keyup", function() {
   var key = this.value;
    $(".perbook-container").each(function() {
       var $this = $(this);
       $this.toggle($(this).text().toLowerCase().indexOf(key) >= 0);
    });

  });
  
    
});
</script>




@endsection
