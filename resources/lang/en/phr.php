<?php

return [
        'public_page' => [
            'phr' => '(PHR)',
            'title' => 'Personal Health Record',
            'sub_title' => 'Keep Track Of Your Health.',
            'section_web' => [
                'title'         => '', // Not in Use
                'description'   => ' - Having a bad day? Left behind a paper medical file? Not to worry, we have the perfect solution. 
                       All you need to do is, key in all your medical data into our app or web portal’s electronic personal health record (ePHR) and 
                       they will be recorded and saved. This ePHR will not only help you get paper free treatment, 
                       it’s smart features will give you AI indications on what is the next best solution to your health hazards. 
                       This will also save treatment time and cost by allowing doctors to get a precise view of your health status at a glance. 
                       Be safe live smart!.',
            ],
            'section_app' => [
                'title'         => 'Get the Daktarbhai app for your phone today and take charge of your own health!',
                'description'  => 'Go to Google Play Store & Ios app store Download our Daktarbhai app to enjoy your paper-free Medical Health Record System. 
                Be the first to record your medical issues & live smart.',
            ],
        ],

        'phr_report' => [
            'bmi'           => 'Height, Weight &amp; BMI',
            'bp'            => 'Blood Pressure',
            'cbc'           => 'CBC Report',
            'glucose'       => 'Glucose [Sugar]',
            'lipid'         => 'Lipid Report',
            'kidney'        => 'Kidney Function',
            'urine'         => 'Urine Profile',
            'electrolytes'  => 'Electrolytes Report',
            'thyroid'       => 'Thyroid Function',
            'tumor'         => 'Tumor Marker',
            'serology'      => 'Serology Report',
            'liver'         => 'Liver Function',

            'abcd'          => 'KKKKKKKKKKKKKKKKKK',
            'efgh'          => 'MMMMMMMMMMMMMMMMMM',
            'corona'        => 'Covid-19 Vaccine',
        ],

        'common' => [
            'return'        => 'Back to PHR',
            'add_1'         => 'Add your',
            'record'        => 'Record',
            'view_details'  => 'View Details',

            'taken_date'    => 'Taken Date',
            'date'          => 'Date',
            'back'          => 'Go Back',

            // table header
            'table_report_date'   => 'Report Date',
            'table_action'        => 'Action',
            'table_status'        => 'Status',
            'table_advice'       => 'Notes/Advice',

            'action' => [
                'add'       => 'Add',
                'edit'      => 'Edit',
                'delete'    => 'Delete',
                'create'    => 'Create',
                'update'    => 'Update',
                'reset'     => 'Reset',
            ],
            'confirm_msg' => [
                'sure' => 'Are You sure to Delete?',
                'yes' => 'Yes',
                'no' => 'No',
            ],
            'button' => [
                'rec_phr' => 'Record your PHR',
                'more_options' => 'More Options',
                'download' => 'Download',
            ],
        ],

        'bmi' => [
            'bmi'           => 'BMI',
            'list_title'    => 'BMI Records List ',
            'create_title'  => 'Add BMI',
            'edit'          => 'Edit BMI Record',
            'details'       => 'BMI Details',

            'table' => [
                'title' => [
                    'height' => 'Height',
                    'weight' => 'Weight',
                    'bmi_value' => 'BMI Value',
                ],
            ],

            'validation_msg' => [
                'height'    => 'Enter Height in Centimeter',
                'weight'    => 'Enter Weight',
            ],

            'unit' =>[
                'feet'          => 'Feet',
                'centimeter'    => 'Centimeter',
                'kg'            => 'kg',
                'ft'            => 'Ft',
                'inches'        => 'Inches',
            ],
        ],

        'cbc' => [
            'list_title'    => 'Complete Blood Count (CBC) Records List',
            'create_title'  => 'Add Complete Blood Count (CBC) Record',
            'edit'          => 'Edit Complete Blood Count (CBC) Record',
            'details'       => 'Complete Blood Count (CBC) Record Details :',

            'table' => [
                'title' => [
                    'hemoglobin'           => 'Hemoglobin',
                    'esr'                  => 'ESR',
                    'white_cell_count'     => 'White Cell Count',
                    'platelet'             => 'Platelet',
                    'details'             => 'CBC Details',
                ],
            ],

            'label' =>
                [
                    'hemoglobin'                =>  'Hemoglobin (g/dL)',
                    'esr'                       =>  'ESR (mm/H)',
                    'basophils'                 =>  'Basophils ( % )',
                    'platelets'                 =>  'Platelets (x10ˆ3/uL(billion/L))',
                    'neutrophils'               =>  'Neutrophilis (%) (%)',
                    'lymphocytes'               =>  'Lymphocytes (%)',
                    'eosinophils'               =>  'Eosinophils ( % )',
                    'monocytes'                 =>  'Monocytes (%)',
                    'pcv'                       =>  'Pack Cell Volume - PCV (%)',
                    'mcv'                       =>  'Mean Cell Volume - MCV (fL)',
                    'mch'                       =>  'Mean Cell Hemoglobin - MCH (pg)',
                    'mchc'                      =>  'Mean Corp. Hemoglobin Concent. (g/dL)',
                    'rwd'                       =>  'Red Cell Distribution Width - RWD (%)',
                    'rbc'                       =>  'Red Blood Cell - RBC (x10ˆ6/uL)',
                    'white_cell_count'          =>  'White Cell Count (x10⁹/L)',
                    'total_wbc'                 =>  'Total WBC (x10ˆ3/uL(Billion Cells/L))',
                    'plateletcript'             =>  'Plateletcript (%)',
                ],

            'placeholder' => [
                'hemoglobin'       => 'Hemoglobin',
                'hematology'       => 'Hematology',
                'esr'              => 'ESR',
                'westergren'       => 'Westergren',
                'platelets'        => 'Platelets',
                'neutrophils'      => 'Neutrophils',
                'lymphocytes'      => 'Lymphocytes',
                'eosinophils'      => 'Eosinophils',
                'monocytes'        => 'Monocytes',
                'pcv'              => 'Pack Cell Volume - PCV',
                'mcv'              => 'Mean Cell Volume - MCV',
                'mch'              => 'Mean Cell Haemoglobin - MCH',
                'mchc'             => 'Mean Corp. Hemoglobin Concentration',
                'rwd'              => 'Red Cell Distribution Width - RWD',
                'rbc'              => 'Red Blood Cell',
                'white_cell_count' => 'White Cell Count',
                'total_wbc'        => 'Total WBC',
                'plateletcript'    => 'Plateletcript (%)',
            ],

            'validation_msg' => [
                'hemoglobin'         => '13.5 - 17.5(Male), &nbsp; 12.0 - 15.5(Female)',
                'esr'                => '0 - 12',
                'basophils'          => '0 - 1',
                'platelets'          => '150 - 400',
                'neutrophils'        => 'Adult: 40 - 75%, &nbsp; Child: 20 - 50%',
                'lymphocytes'        => 'Adult: 20 - 50%, &nbsp; Child: 40 - 75%',
                'eosinophils'        => '1 - 6',
                'monocytes'          => '2 - 15',
                'pcv'                => '37 - 54',
                'mcv'                => '80 - 99',
                'mch'                => '26 - 33',
                'mchc'               => '30 - 37',
                'rwd'                => '11.0 - 15.0',
                'rbc'                => '4.2 - 6.0',
                'white_cell_count'   => '4.0 - 11.0',
                'total_wbc'          => '4.00 - 11.00',
                'plateletcript'      => '0.19 - 0.39',
            ],

            'unit' =>[
                'hemoglobin_unit'         => 'g/dl',
                'esr_unit'                => 'mm/H',
                'basophils_unit'          => '%',
                'platelets_unit'          => 'x10ˆ3/uL',
                'white_cell_count_unit'   => 'x10⁹/L',
                'unit_1'                  => '10^3/μl',
            ],

            'show' =>
                [
                    'pcv'              => 'Pack Cell Volume ',
                    'mcv'              => 'Mean Cell Volume ',
                    'mch'              => 'Mean Cell Haemoglobin',
                    'mchc'             => 'Mean Corpuscular Hemoglobin Concentration',
                    'rwd'              => 'Red Cell Distribution Width',
                ],
        ],


    'glucose' => [
        'list_title'    => 'Glucose Records List',
        'create_title'  => 'Add Glucose Record',
        'edit_title'    => 'Edit Glucose',
        'details'       => 'Glucose',

        'table' => [
            'title' => [
                'type'     => 'Type',
                'value'    => 'Value',
                'day_time' => 'Day Time',
                'glucose_details' => 'Glucose Details',
            ],
        ],

        'placeholder' =>
            [
                'select_type'      => 'Select a type',
                'glucose'          => 'Glucose',
                'hbA1c'            => 'HbA1c',
                'select_daytime'   => 'Select Daytime',
                'random'           => 'Random',
                'before_breakfast' => 'Before Breakfast',
                'after_breakfast'  => 'After Breakfast',
                'before_lunch'     => 'Before Lunch',
                'after_lunch'      => 'After Lunch',
                'before_dinner'    => 'Before Dinner',
                'after_dinner'     => 'After Dinner',
                'level'            => 'Level (mmol/L)',
            ],

        'validation_msg' => [
            'height'    => 'Enter Height in Centimeter',
            'weight'    => 'Enter Weight',
        ],

        'unit' =>[
            'feet'          => 'Feet',
            'centimeter'    => 'Centimeter',
            'kg'            => 'kg',
            'ft'            => 'Ft',
            'inches'        => 'Inches',
        ],
    ],

    'bp' => [

        'list_title'    => 'Blood Pressure Records List',
        'create_title'  => 'Blood Pressure Create',
        'edit_title'    => 'Edit BP',
        'details'       => 'Blood Pressure Details',

        'table' => [
            'title' => [
                'systolic_value'     => 'Systolic Value',
                'diastolic_value'    => 'Diastolic Value',
            ],
        ],


        'label' =>
            [
                'systolic' => 'Systolic (≤ 130 mmHg)',
                'diastolic' => 'Diastolic (≤ 85 mmHg)',
            ],


        'validation_msg' => [
            'systolic'     => 'Systolic Value Must be Numeric',
            'diastolic'    => 'diastolic Value Must be Numeric',
        ],

        'unit' =>[
            'feet'          => 'Feet',
            'centimeter'    => 'Centimeter',
            'kg'            => 'kg',
            'ft'            => 'Ft',
            'inches'        => 'Inches',
        ],
    ],

    'lipid' => [

        'list_title'    => 'Lipid Records List',
        'create_title'  => 'Add Lipid Record',
        'edit_title'    => 'Edit Lipid Record',
        'details'       => 'Lipid',

        'table' => [
            'title' => [
                'cholesterol'  => 'Total Cholesterol',
                'triglyceride' => 'Triglyceride',
                'hdl'          => 'HDL Cholesterol rate',
                'ldl'          => 'LDL Cholesterol rate',
                'hdl_ratio'    => 'HDL Ratio',
                'details'       => 'Lipid Details',
                'advice'       => 'Notes/Advice',
            ],
        ],


        'label' =>
            [
                'hdl' => 'High Density Lipoprotein (mg/dL)',
                'ldl' => 'Low Density Lipoprotein (mg/dL)',
                'triglyceride' => 'Triglyceride (mg/dL)',
                'cholesterol' => 'Total Cholesterol (mg/dL)',
            ],

    ],

    'kidney' => [

        'list_title'    => 'Kidney Records List',
        'create_title'  => 'Add Kidney Record',
        'edit_title'    => 'Edit Kidney Record',
        'details'       => 'Kidney',

        'table' => [
            'title' => [
                'urea'     => 'Urea',
                'creatinine'     => 'Creatinine',
                'uric_acid'     => 'Uric Acid',
                'calcium'     => 'Calcium',
                'phosphate'    => 'Phosphate',
                'eger'    => 'eGER',
                'nitrogen'    => 'Nitrogen',
                'details'    => 'Kidney Details',
            ],
        ],
    ],

    'urine-profile' => [

        'list_title'    => 'Urine Profile Records',
        'create_title'  => 'Add Urine Profile',
        'edit_title'    => 'Edit Urine Profile Record',
        'details'       => 'Urine Profile',

        'table' => [
            'title' => [
                'appearance'   => 'Appearance',
                'colour'       => 'Colour',
                'sediment'     => 'Sediment',
                'reaction'     => 'Reaction',
                'glucose'      => 'Glucose',
                'details'      => 'Urine Profile Details',
                'urine_color'      => 'Urine Color',
                'phosphate'      => 'Phosphate',
                'albumin'      => 'Albumin',
                'rbc'      => 'Red Blood Cell',
                'casts'      => 'Casts',
                'crystals'      => 'Crystals',
                'ketones'      => 'Ketones',
                'gravity'      => 'Specific Gravity',
                'ph_value'      => 'pH Value',
                'epithelial_cell'  => 'Epithelial Cell',
                'pus_cell'      => 'PUS Cell',
                'wbc'      => 'White Blood Cell',
                'leucocytes'      => 'Leucocytes',
                'erythrocytes'      => 'Erythrocytes',
            ],
        ],
    ],

    'serology' => [

        'list_title'    => 'Serology Report List',
        'create_title'  => 'Add Serology Report',
        'edit_title'    => 'Edit Serology Report',
        'details'       => 'Serology',
    ],

    'thyroid' => [

        'list_title'    => 'Thyroid Function Report List',
        'create_title'  => 'Add Thyroid Function Report',
        'edit_title'    => 'Edit Thyroid Function Report',
        'details'       => 'Thyroid Function',
    ],

    'liver-function' => [

        'list_title'    => 'Liver Function Report List',
        'create_title'  => 'Add Liver Function Record',
        'edit_title'    => 'Edit Liver Function Record',
        'details'       => 'Liver Function',
     ],

    'electrolytes-profile' => [

        'list_title'    => 'Electrolytes Report List',
        'create_title'  => 'Add Electrolytes Record',
        'edit_title'    => 'Edit Electrolyte Record',
        'details'       => 'Electrolytes',
        ],

    'tumor-marker' => [

        'list_title'    => 'Tumor Marker Report List',
        'create_title'  => 'Add Tumor Marker Record',
        'edit_title'    => 'Edit Tumor Marker Record',
        'details'       => 'Tumor Marker',

        ],

    ];