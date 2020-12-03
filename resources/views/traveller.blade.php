<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Host</title>
	<!-- Mobile Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
	<!-- Font-->
   
<style>

/*search box css start here*/
.search-sec{
    padding: 2rem;
    z-index:2;
    margin-top:1%;
    border-radius: 40px 40px 40px 40px ;
}
.search-slt{
    display: block;
    width: 100%;
    font-size: 0.875rem;
    line-height: 1.5;
   
    background-image: none;
    border: 1px solid;
    height: calc(3rem + 2px) !important;
    
    border-radius:0;
}
.wrn-btn{
    width: 100%;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
@media (min-width: 992px){
    .search-sec{
        position: relative;
        top: -114px;
        background: rgba(26, 70, 104, 0.51);
    }
}

@media (max-width: 992px){
    .search-sec{
        background: #1A4668;
    }
}
.page-content{
    margin-bottom:150px;
}
.magic-ball{
    margin-bottom:50px;
}
.serif {
    font-family: "Times New Roman", Times, serif;
} 
</style>
@if (session('name')==null)
<script type="text/javascript">
  window.location = "{{ url('/')  }}";//here double curly bracket
</script>
@endif
</head>
@include('Include.header')
<body class="bg-shape">

  <section class="hero-banner magic-ball magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 0 100px">
    <div class="container-fluid">
      <div class="hero-banner-content" style="margin:auto;"> 
        <h1 class="serif"style="text-align: center;" >SHOP ANYWHERE, SHIP EVERYWHERE!</h1>
      <section>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" >
          <div class="carousel-inner" style="border-radius: 40px 40px 40px 40px ;">
              <div class="carousel-item active">
                  <img src="https://pbs.twimg.com/media/EGHYvttU4AAYKb7?format=jpg&name=large" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                  <img src="https://pbs.twimg.com/media/EGHYvtkUcAAuc8T?format=jpg&name=large" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                  <img src="https://pbs.twimg.com/media/EGHYvtjU0AAO8w1?format=jpg&name=large" class="d-block w-100" alt="...">
              </div>
         
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
      </div>
    </section>

    <section class="search-sec">
      <div class="container">
        
        {!! Form::open(['action'=>'travellerController@hostByCountry','method' => 'POST','class'=>'form-detail needs-validation']) !!}
        {{ csrf_field() }}

              <div class="row">
                  <div class="col-lg-12">
                      <div class="row">
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select id="from" class="form-control" name="from">
                              <option value=''>From</option>
                              @foreach($country as $country)
                              <option value='{{$country->name}}'>{{$country->name}}</option>
                              @endforeach
                             
                        </select>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select id="to" class="form-control" name="to"  style="padding-left: 2em;">
                              <option value=''>To</option>
                              @foreach($Country as $Country)
                              <option value='{{$Country->name}}'>{{$Country->name}}</option>
                              @endforeach
                                        
                              </select>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="submit" class="button button-hero mt-7 wrn-btn" style="margin-button=20px;" value="Search">
                          </div>
                         
                      </div>
                  </div>
              </div>
              {!!Form::close()!!}
      </div>
  </section>
           

 </div>
    </div>
  </section>
<h1 class="serif"style="text-align: center;"> Our Host</h1>
 @include('Include.message')
        <section class="site-section">
      <div class="container">
       <ul class="job-listings mb-5">
         @if(count($data) > 0)
       @foreach($data as $data)
       <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
           

            <div class="job-listing-logo">
              <img src="data:image/jpeg;base64,{{$data->avatar}}" style="height:150px;width:150px;" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>{{$data->fname}} {{$data->lname}}</h2>
                <strong>Traveller</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span>{{$data->From}}, {{$data->To}}
              </div>
              <div class="job-listing-meta">
               {!! Form::open(['action'=>'hostController@Indexs','method' => 'POST','class'=>'form-detail needs-validation']) !!}
                          @csrf
                          <input type="hidden" name="journey_id" value="{{ $data->id }}" >
 
                                <input type="hidden" name="traveller_id" value="{{ $data->user_id }}" >
                     <input type="submit" class="button button-hero mt-7" style="margin-button=20px;" value="Request">
              {!!Form::close()!!}
              </div>
            </div>
            
          </li>
           @endforeach
           <!-- {!! var_dump($data) !!} -->
           
           
           @else
           <p>  No host found</p>
           @endif

       </ul>
      </div>
      </section>
    



@include('Include.footer')

</body>
 @include('Include.css')
  @include('Include.js')
 
</html>