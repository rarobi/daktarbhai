<?php
namespace App\Http\Controllers;
use App\Http\Requests\Pages\EmailRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiListController;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends ApiListController
{
    //
    protected $emailSubscriber;
    public function __construct()
    {
        parent::__construct();
    }

    public function emailSubscriber(EmailRequest $request)
    {
        $input = $request->except('_token','g-recaptcha-response');
        $url  = $this->postNewsletterSubscription();
        $result = $this->postDataFromApi($url, $input);

        if($result != null && $result->statusCode == 200) {
            $data['successNewsletter'] ='Please Check your Email To confirm your subscription';
        }
        else {
            $data['errorNewsletter'] = isset($result->error->message) ? $result->error->message : 'Opps,Some technical problem.';
        }
        return redirect()->back()->with($data);
        // return $data;
//        return redirect()->route('frontend.index')->with('flash_success', '<i class="fa fa-check"></i> ' . $data['success']);
    }

    public function active($random_key)
    {
        $input['random_key'] = $random_key;
        $input['is_active']  = true;
        $url  = $this->newsletterActivationApi();
        $result = $this->getQueryArticleListDataApi($url, $input);
//        dd($result);
        if(isset($result->statusCode) && ($result->statusCode) == 200 ) {
            return view('frontend.pages.newsletter-subscriber.subscription-reconfirmation');
        } else {
            abort(404);
        }

    }

    public function unsubscriber($random_key)
    {
        $input['random_key'] = $random_key;
        $url  = $this->newsletterActivationApi();
        $result = $this->getQueryArticleListDataApi($url, $input);
//        dd($result->emailSubscriber);
        if(isset($result->statusCode) && ($result->statusCode) == 200 ) {
            $emailSubscriber = $result->emailSubscriber;
            return view('frontend.pages.newsletter-subscriber.unsubscriber', compact('emailSubscriber'));
        } else {
            abort(404);
        }

    }

    public function deactive($random_key)
    {
        $input['random_key'] = $random_key;
        $input['is_active']  = false;
        $url  = $this->newsletterActivationApi();
        $result = $this->getQueryArticleListDataApi($url, $input);
//        dd($result);
        if(isset($result->statusCode) && ($result->statusCode) == 200 ) {
            return view('frontend.pages.newsletter-subscriber.unsubscribeconfirm');
        } else {
            abort(404);
        }

    }
}