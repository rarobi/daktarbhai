<?php


return [

    'sidebar' =>
    [
        'my_profile'           =>   'My Profile',
        'my_phr'               =>   'My PHR',
        'all_phr'              =>   'View All PHR',
        'bmi_records'          =>   'BMI Records',
        'cbc'                  =>   'Complete Blood Count',
        'glucose'              =>   'Glucose Records',
        'blood_pressure'       =>   'Blood Pressure',
        'lipid_records'        =>   'Lipid Records',
        'kidney_records'       =>   'Kidney Records',
        'urine_profile'        =>   'Urine Profile',
        'electrolytes'         =>   'Electrolytes',
        'tumor_marker'         =>   'Tumor Marker',
        'liver_function'       =>   'Liver Function',
        'covid_vaccine'        =>   'Covid-19 Vaccine',
        'serology'             =>   'Serology',
        'thyroid_function'     =>   'Thyroid Function',
        'change_password'      =>   'Change Password',
        'set_password'         =>   'Set Password',
        'insurance_claim'      =>   'Insurance Claim History',
        'appointment_history'  =>   'Appointment History',
        'home_pathology_history'  =>   'Home Pathology History',
        'tele_medicine_history'  =>   'Video Call To A Doctor',
        'discount_history'     =>   'Discount History',
        'my_questions'         =>   'My Questions',
        'saved_bookmarks'      =>   'Saved Bookmarks',
        'my_subscriptions'     =>   'My Subscriptions',
        'my_prescriptions'     =>   'My Prescriptions',
        'doctor_follow_up'     =>   'Doctor Follow Up',

    ],

    'update_profile' => ' Edit Profile',
    'update_profile_btn' => ' Update Profile',

    'gender' => 'Gender',
    'age' => 'Age',
    'membership_id' => 'Membership ID',
    'birth_date' => 'Date of Birth',
    'city' => 'City',
    'mobile_number' => 'Mobile Number',
    'email' => 'Email',
    'blood_type' => 'Blood Type',
    'national_id' => 'National ID',
    'nominee_name' => 'Nominee Name',
    'nominee_relation' => 'Nominee Relation',
    'msg' => '(not provided)',
    'verified' => 'Verified',
    'add_mobile' => 'Add Mobile Number',
    'add_email' => 'Add Email',
    'verify_email' => 'Verify Email Address',
    'verify_mobile' => 'Verify Mobile Number',


    'change_password' =>
        [
            'title' => 'Change Password',
            'current_password' => 'Current Password',
            'new_password' => 'New Password',
            'confirm_password' => 'Confirm Password',
            'update_password' => 'Update Password',
            'set_password' => 'Set Password',

            'validation_msg' =>
                [
                    'current_password' =>'Current Password is required',
                    'new_password' =>'New Password is required',
                    'confirm_password' =>'Password confirmation is required',
                ],
        ],

    'discount' =>
        [
            'title' => 'Discount History',

            'table' =>
                [
                    'title' =>
                        [
                            'avail_date' => 'Avail Date',
                            'discount_code' => 'Discount Code',
                            'services_name' => 'Services Name',
                            'discount_price' => 'Discount Price',
                        ],
                ],

            'msg' => [

                'discount_msg' => 'You haven\'t requested for any discounts Yet!. Click on get discount & enjoy discounts on our panel Hospitals.',
            ],

            'button' =>
                [
                    'get_discount' => 'Get Discount',
                ],
        ],


    'question' =>
        [
            'title' => 'My Questions',
            'answers' => 'Answers',
            'repost' => 'Re-post Request',



            'msg' => [

                'question_msg' => 'You Haven\'t asked any questions yet. Click on the button below to ask your first question.',
            ],

        ],

    'blog' =>
        [
            'title' => 'Saved Blogs',

            'msg' => [

                'blog_msg' => 'You Haven\'t saved any blogs yet. Click on the button below to view and save blog.',
            ],


            'button' => [

                'go_blog' => 'Go To Blog',
            ],

        ],

    'subscription_history' =>
        [
            'title' => 'Active Subscriptions',

            'table' =>
                [
                    'title' => 'Subscriptions History',
                    'header' =>
                        [
                            'activation_date' => 'Activation Date',
                            'expire_date'     => 'Expire Date',
                            'plan_name'       => 'Plan Name',
                            'amount'          => 'Amount',
                            'status'          => 'Status',
                            'details'         => 'Details',
                            'action'         => 'Action',
                        ],
                ],

            'msg' => [

                'subscription_msg' => 'Looks like you have no subscribed plan! Why not give it a try?',
            ],


            'button' => [

                'try_it' => 'Try it out',
            ],

        ],

    'appointment_history' =>
        [
            'title' => 'Appointment History',
            'thank_you' => 'Thank You.',
            'appointment_id' => 'Appointment-ID',
            'appointment_date' => 'Appointment Date',

            'msg' => [

                'received_request' => 'We have received your appointment request. Please expect a call from one of our patient representatives soon to confirm this appointment.',
                'book_appointment' => 'You haven\'t took any appoinment yet! Click on book appointment & choose your doctor.',
                'agent_call' => 'Please note our agent will only call you between the time 8 am to 10 pm.',
                'further_action' => 'No need to take any further action.',
            ],


            'button' => [

                'book_appointment' => 'Book Appointment',
            ],

        ],

    'prescription' =>
        [
            'title' => 'My Prescription',


            'msg' => [

                'no_data' => 'No Data Found',
                'any_prescription' => 'You haven\'t took any prescription yet!',

            ],


            'button' => [

                'download_prescription' => 'Download Prescription',
            ],

        ],

    'insurance_history' =>
        [
            'title' => 'Insurance Claims History',

            'msg' => [

                'never_claimed' => 'Looks like you have never claimed for insurance money before!',
                'not_authorized' => 'Oops! You are not authorized to see the details of this claim!',

            ],


            'button' => [

                'claim_now' => 'Claim Now',
            ],

        ],
    'profile_update' =>
        [
            'name' => 'Name',
            'gender' => 'Gender ',
            'city' => 'City',
            'blood_group' => 'Blood Group',
            'dob' => 'Date of Birth',
            'NID' => 'National ID',
        ],

    'doctor_followup' =>
        [
            'title' => 'Doctor Follow Up History',

            'msg' => [

                'never_claimed' => 'Looks like you have no Doctor Follow Up Requests! Why not give it a try?',

            ],
        ],

    'corona' =>
        [
            'title'   => 'Covid-19 Vaccine',
            'create_title'  => 'Covid-19 Vaccine Information',
            'edit_title'    => 'Covid-19 Vaccine Information Edit',
            'dose_number'   => 'Which type of dose you taken?',
            'add_btn' => 'New',
            'edit_btn' => 'Edit',
            'back_btn' => 'Back',
            'delete_btn' => 'Delete',
            'dose1' => 'First Dose',
            'dose2' => 'Second Dose',
            'vaccine_name' => 'Vaccine Name',
            'date1' => 'Date of First vaccine',
            'date2' => 'Date of Second vaccine',
            'no_data' => 'You haven\'t created any record yet!',

            'msg' => [

                'never_claimed' => 'Looks like you have no Doctor Follow Up Requests! Why not give it a try?',

            ],
        ],

];