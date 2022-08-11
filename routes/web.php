<?php

/*
 * Global Routes
 * Routes that are used between both frontend and backend.
 */
Route::group(['middleware' => ['throttle:10,1']], function () {
    Route::get('lang/{lang}', 'LanguageController@swap');
}); 
/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['as' => 'frontend.'], function (){
Route::group(['middleware' => ['throttle:20,1']], function () {
    //Route::get('/', 'FrontendController@index')->name('index');
    Route::get('/', 'Pages\PagesController@home')->name('index');
});

Route::group(['middleware' => ['throttle:20,1']], function () {
    //Route::get('/home', 'Pages\PagesController@home')->name('home');
    Route::get('about', 'Pages\PagesController@about')->name('about');
    
    Route::get('contact', 'Pages\PagesController@contact')->name('contact');
    Route::post('contact','Pages\PagesController@postContact')->name('contact'); // why same route name ?

    Route::get('faq','Pages\PagesController@faq')->name('faq');
    Route::get('terms', 'Pages\PagesController@webTerms')->name('terms');
    Route::get('privacy','Pages\PagesController@webPolicy')->name('policy');
    Route::get('/m/terms', 'Pages\PagesController@terms')->name('m.terms');
    Route::get('/m/privacy-policy', 'Pages\PagesController@policy')->name('m.policy');
    Route::get('/m/android-manual', 'Pages\PagesController@androidManual')->name('m.manual');

    Route::get('pages/district/{division}', 'Pages\LocationsController@district');
    Route::get('pages/division-wise-district/{division}', 'Pages\LocationsController@divisionWiseDistrict');
    Route::get('pages/district-with-param/{division}', 'Pages\LocationsController@districtWithParam');
    Route::get('pages/area-by-district/{district}', 'Pages\LocationsController@areaListByDistrict');
});

Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::get('blog/category/{id}','Pages\Blog\ArticlesController@index')->name('category.blogs');
    Route::get('blog/category/{category_id}/page/{number}', 'Pages\Blog\ArticlesController@index')->name('pagination.category.blogs');
    Route::get('blog/page/{number}', 'Pages\Blog\ArticlesController@indexWithPagination')->name('pagination.blogs');
    //Route::get('blog/pagination/{slashData}', 'Pages\Blog\ArticlesController@indexWithPagination')->where('slashData', '(.*(?:%2F:)?.*)')->name('pagination.blogs');
    Route::get('blog/search?{request}{page}', 'Pages\Blog\ArticlesController@search')->name('pagination.search.blogs');
    Route::get('blog/search', 'Pages\Blog\ArticlesController@search')->name('search.blogs');
    Route::get('blog/{id}/{slug?}', 'Pages\Blog\ArticlesController@show')->name('blog.show');
    Route::resource('blog', 'Pages\Blog\ArticlesController', [ 'only' => [
        'index'
    ]]);
});
    /*Start Healthtips Route List*/
Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::get('healthtips/search?{request}{page}', 'Pages\HealthTips\HealthTipsController@search')->name('pagination.search.healthtips');
    Route::get('healthtips/search', 'Pages\HealthTips\HealthTipsController@search')->name('search.healthtips');
    Route::get('healthtips/category/{category_id}/page/{number}', 'Pages\HealthTips\HealthTipsController@index')->name('pagination.category.healthtips');
    Route::get('healthtips/category/{id}','Pages\HealthTips\HealthTipsController@index')->name('category.healthtips');
    Route::get('healthtips/page/{number}', 'Pages\HealthTips\HealthTipsController@indexWithPagination')->name('pagination.healthtips');
    Route::resource('healthtips', 'Pages\HealthTips\HealthTipsController', [ 'only' => [
        'index', 'show'
    ]]);
});
    /*End Healthtips Route List*/

Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::get('hospital/type/{type}/page/{page}', 'Pages\Hospital\HospitalsController@index')->name('pagination.hospital.type');
    Route::get('hospital?{request}{page}', 'Pages\Hospital\HospitalsController@index')->name('pagination.hospital');
    Route::get('hospital/type/{type}','Pages\Hospital\HospitalsController@index')->name('hospital.type');
    Route::get('avail-discount/{id}','Pages\Hospital\HospitalDiscountController@avail_discount');
    Route::get('hospital/{id}/doctors/page/{page}','Pages\Hospital\HospitalsController@doctorList')->name('hospital.pagination.doctors');
    Route::get('hospital/{id}/doctors','Pages\Hospital\HospitalsController@doctorList')->name('hospital.doctors');
    Route::get('all/hospital','Pages\Hospital\HospitalsController@allHospitals')->name('hospital.all');
    Route::resource('hospital', 'Pages\Hospital\HospitalsController', ['only' => [
        'index', 'show'
    ]]);
    Route::get('nearby-hospital/{lat}/{long}', 'Pages\Hospital\HospitalsController@getNearByHospitals')->name('nearby-hospitals');
});

//Route::get('schedule-date/{doctor_id}/{selected_date}', 'Pages\Doctor\DoctorsController@getSchedule');
Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::post('confirm-appointment','Pages\Doctor\DoctorsAppointmentController@confirmAppointment')->name('doctor.confirm-appointment');
    Route::get('doctor/search?{request}{page}', 'Pages\Doctor\DoctorsController@doctorSearchDetails')->name('pagination.doctor');
    Route::get('doctor/specialities/{category}/page/{page}', 'Pages\Doctor\DoctorsController@index')->name('pagination.doctor.category');
    Route::get('doctor/specialities/{id}', 'Pages\Doctor\DoctorsController@doctorSearchDetails')->name('doctor.speciality');
    Route::get('doctor/{doctor_id}/{schedule_id}/dateTime/{time}', 'Pages\Doctor\DoctorsAppointmentController@confirm_appointment_form')->name('doctor.confirm_appointment_form');
    Route::post('doctor/schedule', 'Pages\Doctor\DoctorsController@getDoctorSchedule')->name('doctor.get-schedule');
    Route::get('doctor/search', 'Pages\Doctor\DoctorsController@doctorSearchDetails')->name('doctor.details-info-search');
    Route::resource('doctor', 'Pages\Doctor\DoctorsController', ['only' => [
        'index', 'show'
    ]]);
});

Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::get('profile/appointment-history/{page?}', 'Pages\Profile\ProfileController@getAppointmentHistoryPage');
    Route::get('profile/discount-history/{page?}', 'Pages\Profile\ProfileController@getDiscountHistoryPage');
    Route::get('profile/my-questions/{page?}', 'Pages\Profile\ProfileController@getMyQuestionPage');
    Route::get('profile/edit', 'Pages\Profile\ProfileController@getProfileUpdatePage');
    Route::get('profile/change-password', 'Pages\Profile\ProfileController@getChangePasswordPage');
    Route::get('profile/send/email/verification-url', 'Pages\Profile\ProfileController@sendEmailVerificationUrl')->name('profile.verify.email');

    /*For Email Add*/
    Route::get('add-email-form', 'Pages\Profile\ProfileController@addEmailForm')->name('add.email');
    Route::get('change/email/{email}', 'Pages\Profile\ProfileController@changeEmail')->name('change.email.confirmation');
    Route::post('update/email-password', 'Pages\Profile\ProfileController@updateEmailPassword')->name('updateEmailPassword');
    Route::post('verify/email', 'Pages\Profile\ProfileController@verifyEmail')->name('verifyEmail');

    // For Mobile Add
    Route::post('add-mobile', 'Pages\Profile\ProfileController@generateOtp')->name('add-mobile');
    Route::post('mobile-verify', 'Pages\Profile\ProfileController@verifyOtp')->name('mobile-otp-verify');

    Route::post('profile/change-profile-image', 'Pages\Profile\ProfileController@changeProfileImage')->name('profile.change-image');

    //Route::get('profile/{terms}/{page}','Pages\Profile\ProfileController@indexWithPagination')->name('pagination.profile');
    Route::get('profile', 'Pages\Profile\ProfileController@index')->name('profile');
    Route::post('profile', 'Pages\Profile\ProfileController@updateProfile')->name('update-profile');
    Route::post('change-password', 'Pages\Profile\ProfileController@changePassword')->name('change-password');
    Route::get('profile/add-password', 'Pages\Profile\ProfileController@getAddPasswordPage');
    Route::post('add-password', 'Pages\Profile\ProfileController@addPassword')->name('add-password');

    Route::get('profile/subscription-history/{page?}', 'Pages\Profile\ProfileController@getSubscriptionHistoryPage')->name('subscription.history');
    Route::get('profile/subscription-history/invoice/{id?}', 'Pages\Profile\ProfileController@getSubscriptionInvoiceDetails')->name('subscription.invoice.details');

    Route::get('profile/prescription-history', 'Pages\Profile\ProfileController@getPrescriptionHistory')->name('prescription.history');
    Route::get('profile/prescription-history/details/{id}', 'Pages\Profile\ProfileController@getPrescriptionHistoryDetails')->name('prescription.history.details');
    Route::get('profile/prescription/download/{id}', 'Pages\Profile\ProfileController@downloadPrescriptionAsPdf')->name('prescription.download');

    /* Prescription pdf Download From APP start*/
    Route::get('download/prescription','Api\PrescriptionDetails@downloadPrescriptionApp');
    /* Prescription pdf Download From APP End */

    Route::get('download/subscription-history/invoice/details/{id}', 'Pages\Profile\ProfileController@downloadInvoiceDetails')->name('download.user.single.invoice');
    Route::get('profile/sub-history/{id}', 'Pages\Profile\ProfileController@getSubscriptionHistoryDetails');
    Route::get('profile/saved-bookmarks', 'Pages\Profile\ProfileController@getSavedBookmarks');
    Route::get('profile/feedback', 'Pages\Doctor\DoctorsAppointmentController@appointmentFeedback')->name('appointment.feedback');
});

/** start of phr route **/
//Route for covid-19 vaccine
Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::get('phr-profile/corona/vaccine', 'Pages\Phr\PhrModuleController@coronaVaccineList')->name('phr.corona.vaccine');
    Route::get('phr-profile/corona/vaccine/create', 'Pages\Phr\PhrModuleController@createVaccine')->name('phr.corona.vaccine.create');
    Route::post('phr-profile/corona/vaccine/create', 'Pages\Phr\PhrModuleController@storeVaccine')->name('phr.corona.vaccine.store');
    Route::get('phr-profile/corona/vaccine/edit/{id}', 'Pages\Phr\PhrModuleController@editVaccine')->name('phr.corona.vaccine.edit');
    Route::post('phr-profile/corona/vaccine/update/{id}', 'Pages\Phr\PhrModuleController@updateVaccine')->name('phr.corona.vaccine.update');
    Route::get('phr-profile/corona/vaccine/delete/{id}', 'Pages\Phr\PhrModuleController@deleteVaccine')->name('phr.corona.vaccine.delete');

    Route::get('phr-profile', 'Pages\Phr\PhrModuleController@phrListPage')->name('profile.phr');

    Route::get('phr-profile/{phr}', 'Pages\Phr\PhrModuleController@index')->name('phr.index');
    Route::get('phr-profile/{phr}/add', 'Pages\Phr\PhrModuleController@create')->name('phr.create');
    Route::get('phr-profile/{phr}/{id}/edit', 'Pages\Phr\PhrModuleController@edit')->name('phr.edit');
    Route::post('phr-profile/{phr}', 'Pages\Phr\PhrModuleController@store')->name('phr.store');
    Route::get('phr-profile/{phr}/{id}', 'Pages\Phr\PhrModuleController@show')->name('phr.show');
    Route::put('phr-profile/{phr}/{id}', 'Pages\Phr\PhrModuleController@update')->name('phr.update');
    Route::get('phr-profile/{phr}/{id}/delete', 'Pages\Phr\PhrModuleController@delete')->name('phr.delete');
});
/** end of phr route **/

Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::post('signup','Pages\Auth\AuthController@register')->name('signup');
    Route::get('signout','Pages\Auth\AuthController@logout')->name('signout');
    Route::get('reset-password','Pages\Auth\AuthController@resetPasswordForm')->name('reset-password-form');
    Route::post('reset-password','Pages\Auth\AuthController@resetPassword')->name('reset-password');

    Route::get('signin','Pages\Auth\AuthController@loginForm')->name('signin');
    Route::post('signin', 'Pages\Auth\AuthController@login')->name('post.signin');

    // login with OTP
    Route::post('login/mobile', 'Pages\Auth\AuthController@generateOtp')->name('otp_generate');
    // Route::post('login/mobile', 'Pages\Auth\AuthController@generateOtp')->name('otp_generate')->middleware('throttle:5,1');
    Route::post('login/mobile-verify', 'Pages\Auth\AuthController@verifyOtp')->name('otp_verify');

    Route::post('login/otp-verify-in-ask-doctor', 'Pages\Auth\AuthController@verifyOtpInAskDoctor')->name('ask-doctor.otp_verify');

    //Route::get('login/account-kit/facebook', 'Pages\Auth\AuthController@accountKitLogin')->name('login.facebook.get');
    Route::post('login/account-kit/facebook', 'Pages\Auth\AuthController@accountKitLogin')->name('login.facebook');
    Route::post('mobile/account-kit/varification', 'Pages\Profile\ProfileController@getVerifiedMobile')->name('mobile.verification');
    Route::post('login/check-availability', 'Pages\Auth\AuthController@getEmailVerificationStatus')->name('pre.email.validation');
    Route::post('user/is-active','Pages\Auth\AuthController@isUserLoggedIn')->name('user.loggedin.status');
});

//Route::get('login-social/{provider}','Auth\SocialLoginController@accountKitLogin');
Route::group(['middleware' => ['throttle:15,1']], function () {
    Route::get('services', 'Pages\Service\ServicesController@index')->name('services');
    Route::get('services/health-package', 'Pages\PagesController@health_package')->name('health_package');
    Route::get('services/health-tourism', 'Pages\PagesController@health_tourism')->name('health_tourism');
    Route::get('services/personal-health-record', 'Pages\PagesController@getPhrInfoPage')->name('personal_health_report');
});    
//Route::post('services/phr/contact','Pages\PagesController@postPhrContact')->name('phr.contact');

Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::get('services/ask-a-doctor', 'Pages\AskDoctor\AskDoctorController@index')->name('ask_doctor');
    Route::post('services/ask-a-question', 'Pages\AskDoctor\AskDoctorController@indexRedirect')->name('ask_doctor1');
    Route::get('questions/ask-a-doctor', 'Pages\AskDoctor\AskDoctorController@questionForm')->name('questionform');
    Route::post('services/ask-a-doctor','Pages\AskDoctor\AskDoctorQuestionController@postQuestion')->name('post-ask-doctor');
    Route::get('services/ask-a-doctor/all-questions', 'Pages\AskDoctor\AskDoctorController@allQuestions')->name('all_questions');
    Route::get('services/ask-a-doctor/all-questions/page/{page}', 'Pages\AskDoctor\AskDoctorController@allQuestions')->name('all_questions.pagination');
    Route::get('services/ask-a-doctor/topics/{id}','Pages\AskDoctor\AskDoctorController@topicQuestions')->name('question.topics');

    Route::get('services/ask-a-doctor/edit/{id}','Pages\AskDoctor\AskDoctorController@questionEdit')->name('question.edit');
    Route::PUT('services/ask-a-doctor/update/{id}','Pages\AskDoctor\AskDoctorController@updateQuestion')->name('update-ask-doctor');

    Route::get('services/ask-a-doctor/topics/{id}/page/{page}','Pages\AskDoctor\AskDoctorController@topicQuestions')->name('pagination.question.topics');
    Route::get('services/ask-a-doctor/{id}','Pages\AskDoctor\AskDoctorController@questionDetails')->name('question.show');
    Route::post('services/ask-a-doctor/contact','Pages\PagesController@postAskDoctorContact')->name('services.contact');
});

    require (__DIR__ . '/EmailSubscription/Emailsubscription.php');
    /*
     * User's Single PHR Report Download Specific
     */
    Route::post('download/single/phr', 'Pages\Phr\SingleReportDownloadController@downloadSinglePhr')->name('download.single.phr');

    Route::get('register/email-verify/{confirmationCode}', [
        'as' => 'confirmation_path',
        'uses' => 'Pages\Auth\AuthController@getEmailConfirmation'
    ]);

    /* Social Login */
//    Route::get('login/social/{provider}','Frontend\Auth\SocialLoginController@login');

/* Subscription */

Route::get('banglalink/packages', 'Pages\Subscription\UserEnableSubscriptionController@banglalinkPackagesList')->name('subscription.blink-plan-list');

Route::group(['prefix'=>'subscription','middleware' => ['throttle:20,1']],function(){
    Route::get('plan', 'Pages\Subscription\UserEnableSubscriptionController@index')->name('subscription.plan');
    Route::get('plan/blink', 'Pages\Subscription\UserEnableSubscriptionController@packagesList')->name('subscription.plan-list');
    Route::get('{planId}', 'Pages\Subscription\SubscriptionController@subscriptionConfirmation')->name('subscription.confirmation');
    Route::get('blink/{planId}', 'Pages\Subscription\SubscriptionController@subscriptionConfirmationForBlink')->name('subscription.confirmation.blink');
    Route::get('enable/trial', 'Pages\Subscription\SubscriptionController@trialSubscriptionConfirmation')->name('subscription.trial');

    Route::post('blink/subscribe', 'Pages\Subscription\SubscriptionController@blinkSubscription')->name('subscription.blink');

    //Route::get('purchase/{planId}', 'Pages\Subscription\SubscriptionController@subscriptionPurchase')->name('subscription.purchase');

    Route::post('blink/generate-otp', 'Pages\Subscription\SubscriptionController@generateOtpForBLSubscription')->name('subscription.blink.otp_generate');

    Route::get('confirmation/sslwireless','Pages\Subscription\SubscriptionController@confirmedSslSubscription')->name('subscription.ssl.confirmation');

    Route::post('un-subscribe','Pages\Subscription\SubscriptionController@unSubscribe')->name('subscription.disable');
    Route::post('blink/un-subscribe','Pages\Subscription\SubscriptionController@blinkUnsubscribe')->name('blink-subscription.disable');

    Route::group(['prefix'=>'operator'],function() {

        Route::get('{provider}/{receiver}/{plan?}', 'Pages\Subscription\SubscriptionController@operatorEnableNewSubscriber')->name('user.subscription');
    });

    Route::post('make-payment/bkash', 'Pages\Subscription\SubscriptionController@makePayment')->name('subscription.make-payment.bkash');
    Route::post('confirm-payment/bkash', 'Pages\Subscription\SubscriptionController@confirmBkashPayment')->name('subscription.confirm-payment.bkash');

    //Route::post('download/invoice','Api\SubscriptionInvoice@downloadInvoiceApp');
    Route::get('download/invoice','Api\SubscriptionInvoice@downloadInvoiceApp');
});

Route::post('user-reaction/{type}/{id}','Pages\UserReactionController@userReaction')->name('user.reaction');

    /*health directory start*/
Route::group(['middleware' => ['throttle:15,1']], function () {
    Route::get('health-directory', 'Pages\HealthDirectoryController@index')->name('health_directory');
    Route::post('health-directory', 'Pages\HealthDirectoryController@search')->name('health_directory.search');
    Route::get('health-directory/{type}/{location}', 'Pages\HealthDirectoryController@searchResult')->name('health_directory.searchResult');
    Route::get('health-directory/{type}', 'Pages\HealthDirectoryController@searchResult')->name('health_directory.type');
    Route::get('health-directory/{type}/page/{number}', 'Pages\HealthDirectoryController@typeWithPagination')->name('pagination.type.health_directory');
    Route::get('health-directory/{type}/{location?}/page/{number}', 'Pages\HealthDirectoryController@typeWithPagination')->name('pagination.type.location.health_directory');


//    Route::group(['prefix' => 'health-directory', 'as' => 'health-directory.'], function () {
//        Route::get('ambulance/{location}', 'Pages\Ambulance\AmbulancesController@index')->name('ambulance.search');
//        Route::resource('ambulance', 'Pages\Ambulance\AmbulancesController', ['only' => [
//            'index', 'show'
//        ]]);
//    });
});
    /*health directory end*/

    /* Insurance claim start */
Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::get('claim-insurance/history/{page?}', 'Pages\InsuranceClaim\InsuranceClaimController@index')->name('insurance-claim');
    Route::get('claim-insurance/details/{claimID}', 'Pages\InsuranceClaim\InsuranceClaimController@show')->name('insurance-claim.details');
    Route::get('claim-insurance/create', 'Pages\InsuranceClaim\InsuranceClaimController@create')->name('insurance-claim.create');
    Route::post('claim-insurance', 'Pages\InsuranceClaim\InsuranceClaimController@submit')->name('insurance-claim.submit');
    Route::get('claim-insurance/{id}/edit', 'Pages\InsuranceClaim\InsuranceClaimController@edit')->name('insurance-claim.edit');
    Route::delete('claim-insurance/removeInsuranceClaimDocRecord', 'Pages\InsuranceClaim\InsuranceClaimController@removeInsuranceClaimDocRecord')->name('insurance-claim.removeInsuranceClaimDocRecord');
    Route::post('claim-insurance/{id}', 'Pages\InsuranceClaim\InsuranceClaimController@update')->name('insurance-claim.update');
    Route::get('claim-insurance/confirm', 'Pages\InsuranceClaim\InsuranceClaimController@confirm')->name('insurance-claim.confirm');
});
    /* Insurance claim end */

    /*user reaction on  answer of a question*/
   Route::get('user-reaction/answers/{id}/{reaction}', 'Pages\AskDoctor\AskDoctorQuestionController@postReactionOnAnswer')->name('user.reaction.answers');
   /*Health Insurance page*/
   Route::get('health-insurance', 'Pages\PagesController@healthInsurance')->name('health-insurance');
   /*Premium page*/
   Route::get('plan/premium', 'Pages\PagesController@premium')->name('premium');

   /* route for bangalink packages (daily,monthly,yearly)  */
Route::group(['middleware' => ['throttle:20,1']], function () {
   Route::get('plan/banglalink-daily', 'Pages\PagesController@daily_pack')->name('daily-plan');
   Route::get('plan/banglalink-monthly', 'Pages\PagesController@monthly_pack')->name('monthly-plan');
   Route::get('plan/banglalink-yearly', 'Pages\PagesController@yearly_pack')->name('yearly-plan');
});

Route::group(['middleware' => ['throttle:5,1']], function () {
   /*pharmacy page design*/
    Route::resource('pharmacy', 'Pages\Pharmacy\PharmacyController', ['only' => [
        'index', 'show'
    ]]);

    /*healthy living design*/
    Route::resource('healthy-living', 'Pages\Healthyliving\HealthyLivingController', ['only' => [
        'index', 'show'
    ]]);
});    

    /*directory avail discount */
Route::get('directory-avail-discount/{type}/{id}','Pages\Hospital\HospitalDiscountController@directory_discount');

Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::get('video-blogs','Pages\VideoBlog\VideoBlogController@index')->name('video-blogs.index');

    Route::post('sample-collection/test-list', 'Pages\SampleCollection\SampleCollectionController@getTestList')->name('sample-collection.test-list');
    Route::post('sample-collection/invoice', 'Pages\SampleCollection\SampleCollectionController@sampleCollectionAmountCalculation')->name('sample-collection.test-amount');
    Route::post('sample-collection/vendor', 'Pages\SampleCollection\SampleCollectionController@userInfoSubmit')->name('sample-collection.user-info-submit');
    Route::post('sample-collection/confirmation', 'Pages\SampleCollection\SampleCollectionController@paymentConfirmation')->name('sample-collection.payment-confirmation');
    Route::get('sample-collection/confirm-payment', 'Pages\SampleCollection\SampleCollectionController@paymentInformation')->name('sample-collection.payment-info');
    Route::get('sample-collection/details', 'Pages\SampleCollection\SampleCollectionController@sampleCollectionDetails')->name('sample-collection.details');
    Route::get('sample-collection/invoice-report/{id}', 'Pages\SampleCollection\SampleCollectionController@sampleCollectionInvoiceReport')->name('sample-collection.invoice-report');
    Route::resource('sample-collection', 'Pages\SampleCollection\SampleCollectionController',['only' => ['create', 'store','index']]);

    Route::get('tele-medicine/doctor-specialities', 'Pages\TeleMedicine\TeleMedicineController@getDoctorSpecialities')->name('tele-medicine.speciality-list');
    Route::get('tele-medicine/speciality-wise-doctor', 'Pages\TeleMedicine\TeleMedicineController@specialityWiseDoctorList')->name('tele-medicine.speciality-wise-doctor');
    Route::get('tele-medicine/doctor-appointment/{id}', 'Pages\TeleMedicine\TeleMedicineController@doctorDetails')->name('tele-medicine.doctor-appointment');
    Route::post('tele-medicine/doctor-appointment-info', 'Pages\TeleMedicine\TeleMedicineController@appointmentInfo')->name('tele-medicine.doctor-appointment-info');
    Route::post('tele-medicine/confirm-appointment', 'Pages\TeleMedicine\TeleMedicineController@confirmAppointment')->name('tele-medicine.confirm-appointment');
    Route::get('tele-medicine/payment-info', 'Pages\TeleMedicine\TeleMedicineController@paymentInformation')->name('tele-medicine.payment-info');
    Route::post('tele-medicine/confirm-payment', 'Pages\TeleMedicine\TeleMedicineController@confirmPayment')->name('tele-medicine.payment-confirmation');
    Route::get('tele-medicine/appointment-history', 'Pages\TeleMedicine\TeleMedicineController@telemedicineAppointmentHistory')->name('tele-medicine.appointment-history');
    Route::post('tele-medicine/promo-code', 'Pages\TeleMedicine\TeleMedicineController@applyPromoCode')->name('tele-medicine.promo-code');

    Route::get('tele-medicine/request-details/{id}', 'Pages\TeleMedicine\TeleMedicineController@teleMedicineRequestDetails')->name('tele-medicine.request-details');
    Route::get('tele-medicine/invoice-report/{id}', 'Pages\TeleMedicine\TeleMedicineController@teleMedicineInvoiceReport')->name('tele-medicine.invoice-report');

    Route::get('tele-medicine/doctor-specialities-search', 'Pages\TeleMedicine\TeleMedicineController@getDoctorSpecialitiesForSearch')->name('tele-medicine.speciality-list-search');
});
    /*For brac*/
    Route::get('brac','Pages\BkashPageRedirectionController@index');

    /*For undp*/
    Route::get('undp','Pages\BkashPageRedirectionController@undp');

    /*For banglalink*/
    Route::get('banglalink','Pages\BkashPageRedirectionController@banglalink');

    /*For bkash marchant logo*/
    Route::get('merchant-logo/Healthcare-Information-System-Limited.png','Pages\BkashPageRedirectionController@marchantLogo');

    /*For Subscription History Report */
    Route::get('subscription-history/invoice/report/{id}', 'Pages\Profile\ProfileController@invoiceReport')->name('user.invoice-report');

    /*Route for Doctor Follow Up */
Route::group(['middleware' => ['throttle:20,1']], function () {
    Route::get('doctor-follow-up/packages', 'Pages\DoctorFollowUp\DoctorFollowUpController@packages')->name('doctor-follow-up.packages');
    Route::post('doctor-follow-up/user-info', 'Pages\DoctorFollowUp\DoctorFollowUpController@userInfo')->name('doctor-follow-up.user-info');
    Route::post('doctor-follow-up/store', 'Pages\DoctorFollowUp\DoctorFollowUpController@requestStore')->name('doctor-follow-up.store');
    Route::get('doctor-follow-up/confirm-payment', 'Pages\DoctorFollowUp\DoctorFollowUpController@paymentInformation')->name('doctor-follow-up.payment-info');
    Route::post('doctor-follow-up/payment', 'Pages\DoctorFollowUp\DoctorFollowUpController@paymentConfirmation')->name('doctor-follow-up.payment-confirm');
    Route::get('doctor-follow-up/request-list', 'Pages\DoctorFollowUp\DoctorFollowUpController@followUpRequestHistory')->name('doctor-follow-up.request-list');
    Route::get('doctor-follow-up/request-details', 'Pages\DoctorFollowUp\DoctorFollowUpController@followUpRequestDetails')->name('doctor-follow-up.request-details');
});
    /*End Route of Doctor Follow Up */

});
