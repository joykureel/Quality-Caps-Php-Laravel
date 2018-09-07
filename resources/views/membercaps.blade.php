@extends('layouts.app')
@section('content')
<h2>Shop Online</h2>
<div class="row">
    
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
            <a class="nav-link " href="/membercaps">Full List <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <span class="nav-link">Sort by</span>
              </li>
              <li class="nav-item">
                <span class="nav-link">Price</span>
                <a class="nav-link" href="/membercaps/?price=desc">&nbsp;&nbsp;&nbsp;&nbsp;maxtomin</a>
                <a class="nav-link" href="/membercaps/?price=asc">&nbsp;&nbsp;&nbsp;&nbsp;mintomax</a>
              </li>
              <li class="nav-item">
                <span class="nav-link">Categories</span>
              </li>
            </ul>
            
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a class="nav-link" href="/membercaps?category_id=1">&nbsp;&nbsp;&nbsp;&nbsp;Men</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/membercaps?category_id=2">&nbsp;&nbsp;&nbsp;&nbsp;Women</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/membercaps?category_id=3">&nbsp;&nbsp;&nbsp;&nbsp;kids</a>
              </li>
            </ul>
            
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <span class="nav-link" href="#">Search by</span>
              </li>
              <li class="nav-item">
                <center>
                <form name="myForm" onsubmit="return validateForm()" action="membercaps" method="GET">
                    <input id="search" type="text" name="search" class="">
                    <p id="searchvalidation"></p>
                    <input type="submit"class="btn btn-primary" value="Search">
                  </form>
                </center>
              </li>
               
            </ul>
          </nav>
    <div class="col-1"></div>
    <div class="md-col-8">
        <div class="row">
                
                <br><hr>
            @if(count($caps)>0)
            @foreach($caps as $cap)
            <div class="md-col-3">
                    <div class="container ">
                            
                            <div class="card">
                              <div class="card-header">{{$cap->name}}&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;{{$cap->category->name}}</div>
                              <div class="card-body"><img style="width:200px;height=100px" src="/storage/images/{{$cap->image}}" alt="No Image"></div> 
                              <div class="card-footer">
                                  Price:${{$cap->price}}&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a href="{{route('membercaps.addtocart',['id'=>$cap->id])}}" style="color:white;" class="btn btn-success">Add To Cart</a>
                                </div>
                            </div>
                        
                    </div>
                </div>
            @endforeach
            @endif
            
        </div>
    </div>
</div>
<span>{{$caps->links()}}</span>
@endsection
<script>
  function validateForm() {
    var x = document.forms["myForm"]["search"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>