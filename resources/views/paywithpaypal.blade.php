<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-container">
        @if ($message = Session::get('success'))
        <div class="w3-panel w3-green w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
    				class="w3-button w3-green w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('success');?>
        @endif

        @if ($message = Session::get('error'))
        <div class="w3-panel w3-red w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
    				class="w3-button w3-red w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('error');?>
        @endif
        
    	<form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form" action="{!! URL::to('paypal') !!}">
    	  <div class="w3-container w3-teal w3-padding-16">Paywith Paypal</div>
    	  {{ csrf_field() }}
        @foreach($data2 as $data2)
    	  <h2 class="w3-text-blue">Public Shipping</h2>
        <label class="w3-text-blue"><b>Your Item Name</b></label>
    	  <p>{{$data2->item_name}}</p>
        <p></p>
    	  <label class="w3-text-blue"><b>Your Amount</b></label>
    	  <input class="w3-input w3-border" id="amount" type="text" name="amount" value="{{$data2->price}}" disabled><i class="fa fa-inr" aria-hidden="true"></i>
        </p>
    	  <button class="w3-btn w3-blue">Pay with PayPal</button>
        @endforeach
    	</form>
      
    </div>
</body>
</html>