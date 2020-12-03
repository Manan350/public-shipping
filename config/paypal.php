<?php 
return [ 
    'client_id' => env('PAYPAL_CLIENT_ID','AYCFJ9kX6lmyHl1YbsP1OAKVPgsOGY2H7tDhYk4XajKqK7yU8Chex9CIUrpor0IMTZR0Uzd_BaRrOKwf'),
    'secret' => env('PAYPAL_SECRET','EKY40jXG5EerS2mUJ_Vrn5gqFA670z8Ig1GSIY6fGM58r40_JhTYjjOW66u4GeFqiIlyTyoMzD3laY2u'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];