<?php

    /*route for email subscriber and is active subscriber email*/
    Route::post('email-subscriber', 'SubscriberController@emailSubscriber')->name('emailsubscriber');
    Route::get('active-email/{id}', 'SubscriberController@active')->name('active-email');
    /*route for email unsubscriber*/
    Route::get('unsubscriber-email/{id}', 'SubscriberController@unsubscriber')->name('unsubscriber-email');
    Route::get('deactive-email/{id}', 'SubscriberController@deactive')->name('deactive-email');