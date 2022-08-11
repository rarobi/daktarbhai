@extends('frontend.layouts.theme.default')

@section('title')
    {!! 'Insurance Claim Details | ' . app_name()  !!}
@endsection

@section('main-content')
    @if(isset($insuranceClaimDetails))
        <div class="bhoechie-tab-content active subscription-status">
        <div class="col-md-10 padding-right-null">
            <div class="bhoechie-tab-content active">
                <div class="claim-history">
                    <div class="col-md-12">
                        <div class="subscriptions-history my-questions ">
                            <div class="col-md-10">
                                <div class="table-responsive sub-history sub-details">
                                    <table class="table insurance-details" width="50%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Claim History Details
                                                    @if($insuranceClaimDetails->verification_info->verification_status == 'Applied')
                                                        <a href="{!! route('frontend.insurance-claim.edit',['id'=>$insuranceClaimDetails->id]) !!}" class="claim-edit">
                                                            <span class="ion-ios-compose-outline"></span> Edit
                                                        </a>
                                                    @endif
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($claimDocs) > 0)
                                                <tr>
                                                    <td>
                                                        @foreach($claimDocs as $key => $doc)
                                                            <div class="attachment">
                                                                <a href="{!! $doc->doc_path != null ? $doc->doc_path : 'http://placehold.it/250x250' !!}" class="without-caption image-link">
                                                                    <img src="{!! $doc->doc_path != null ? $doc->doc_path : 'http://placehold.it/250x250' !!}" width="120" height="80" class="downloadable" />
                                                                </a>
                                                                {{--TODO: Need to integrate download options for users--}}
                                                                {{--<a href="" class="download-btn" download="{!! $doc->doc_path !!}">Download</a>--}}
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td><span> Claim Ticket No </span> : {{ $insuranceClaimDetails->claim_ticket_info->claim_ticket_no }}</td>
                                            </tr>
                                            <tr>
                                                <td><span> Subscription Plan Name </span> : {{ $subscriptionPlan }}</td>
                                            </tr>
                                            <tr>
                                                <td><span>  Insurance Type </span> : {{ $insuranceType }}</td>
                                            </tr>
                                            <tr>
                                                <td><span> Claimed on (date) </span> : {{ $claimedOn }}</td>
                                            </tr>
                                            <tr>
                                                <td><span> Claim Ticket Channel </span> : {{ $insuranceClaimDetails->claim_ticket_info->claim_ticket_channel }}</td>
                                            </tr>
                                            @if($insuranceType == 'Hospital Cashback (IPD)')
                                                <tr>
                                                    <td><span> Hospital Name </span> : {{ $insuranceClaimDetails->hospital_info->hospital_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><span> Admission Date </span> : {{ $insuranceClaimDetails->hospital_info->admission_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td><span> Discharge Date </span> : {{ $insuranceClaimDetails->hospital_info->discharge_date }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>
                                                    <span> Payment Method </span> :
                                                    @if($insuranceClaimDetails->payment_info->payment_method == 'BKASH')
                                                        bKash
                                                    @elseif($insuranceClaimDetails->payment_info->payment_method == 'ROCKET')
                                                        Rocket
                                                    @elseif($insuranceClaimDetails->payment_info->payment_method == 'BANK_TRANSFER')
                                                        Bank Transfer
                                                    @endif
                                                </td>
                                            </tr>
                                            @if($insuranceClaimDetails->payment_info->payment_method == 'BKASH' || $insuranceClaimDetails->payment_info->payment_method == 'ROCKET')
                                                <tr>
                                                    <td><span> Payment Number </span> : {{ $insuranceClaimDetails->payment_info->payment_number }}</td>
                                                </tr>
                                            @elseif($insuranceClaimDetails->payment_info->payment_method == 'BANK_TRANSFER')
                                                <tr>
                                                    <td><span> Bank Holder Name </span> : {{ $insuranceClaimDetails->bank_acc_info->bank_acc_holder_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><span> Bank Account No </span> : {{ $insuranceClaimDetails->bank_acc_info->bank_acc_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td><span> Bank Account Branch </span> : {{ $insuranceClaimDetails->bank_acc_info->bank_acc_branch }}</td>
                                                </tr>
                                                <tr>
                                                    <td><span>  Bank Name </span> : {{ $insuranceClaimDetails->bank_acc_info->bank_name }}</td>
                                                </tr>
                                            @endif
                                            @if(isset($insuranceClaimDetails->insurance_service_provider_info))
                                                <tr>
                                                    <td><span>  Insurance Service Provider Name </span> : {{ $insuranceClaimDetails->insurance_service_provider_info->provider_name }}</td>
                                                </tr>
                                            @endif
                                            @if($insuranceClaimDetails->verification_info->verification_status == 'Settled')
                                                <tr>
                                                    <td><span> Claim Settled Amount </span> : BDT {{ $insuranceClaimDetails->claim_settlement_info->claim_settled_amount }}</td>
                                                </tr>
                                                <tr>
                                                    <td><span> Transaction Number </span> : {{ $insuranceClaimDetails->claim_settlement_info->transaction_number }}</td>
                                                </tr>
                                                <tr>
                                                    <td><span> Claim Settled On </span> : {{ $insuranceClaimDetails->claim_settlement_info->claim_settled_on }}</td>
                                                </tr>
                                                <tr>
                                                    <td><span> Claim Settlement Remarks </span> : {{ $insuranceClaimDetails->claim_settlement_info->claim_settlement_remarks }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>
                                                    <span> Verification Status </span> :
                                                    @if($insuranceClaimDetails->verification_info->verification_status == 'Applied')
                                                        <span class="status-bg-applied">{!! 'Applied' !!}</span>
                                                    @elseif($insuranceClaimDetails->verification_info->verification_status == 'Approved' || $insuranceClaimDetails->verification_info->verification_status == 'Settled')
                                                        <span class="status-bg-approved">{!! ucfirst($insuranceClaimDetails->verification_info->verification_status) !!}</span>
                                                    @elseif($insuranceClaimDetails->verification_info->verification_status == 'Rejected')
                                                        <span class="status-bg-rejected">{!! 'Rejected' !!}</span>
                                                    @elseif($insuranceClaimDetails->verification_info->verification_status == 'Provider rejection')
                                                        <span class="status-bg-rejected">{!! 'Rejected by Provider' !!}</span>
                                                    @else
                                                        <span class="status-bg-in-prog">{{ ucfirst(str_replace('_', ' ', $insuranceClaimDetails->verification_info->verification_status)) }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span> Ticket Status </span> :
                                                    @if($insuranceClaimDetails->claim_ticket_info->claim_ticket_status == 'Open')
                                                        <span class="status-bg-open">{!! 'Open' !!}</span>
                                                    @elseif($insuranceClaimDetails->claim_ticket_info->claim_ticket_status == 'Close')
                                                        <span class="status-bg-closed">{!! 'Close' !!}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @if(isset($insuranceClaimDetails->remarks) && $insuranceClaimDetails->remarks != '')
                                                <tr>
                                                    <td><span> Remarks  </span> : {{ $insuranceClaimDetails->remarks }}</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="my-prescription">
            <div class="row">
                <div class="col-md-10 padding-right-null">
                    <div class="phr-create-img">
                        <img src="{!! asset('assets/img/claim/claim-history.png') !!}" alt="">
                    </div>
                    <p class="text-center padding-sm create-new">
                        {{__('profile.insurance_history.msg.not_authorized')}}
                    </p>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('after-scripts')
    <script>
        $('.without-caption').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300 // don't forget to change the duration also in CSS
            }
        });
        $('img.downloadable').each(function(){
            var $this = $(this);
            $this.wrap('<a href="' + $this.attr('src') + '" download />')
        });
    </script>

@endsection
