<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'        => 'The :attribute must be accepted.',
    'active_url'      => 'The :attribute is not a valid URL.',
    'after'           => 'The :attribute must be a date after :date.',
    'after_or_equal'  => 'The :attribute must be a date after or equal to :date.',
    'alpha'           => 'The :attribute may only contain letters.',
    'alpha_dash'      => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'       => 'The :attribute may only contain letters and numbers.',
    'array'           => 'The :attribute must be an array.',
    'before'          => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between'         => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'        => 'The :attribute field must be true or false.',
    'confirmed'      => 'The :attribute confirmation does not match.',
    'date'           => 'The :attribute is not a valid date.',
    'date_format'    => 'The :attribute does not match the format :format.',
    'different'      => 'The :attribute and :other must be different.',
    'digits'         => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions'     => 'The :attribute has invalid image dimensions.',
    'distinct'       => 'The :attribute field has a duplicate value.',
    'email'          => 'The :attribute must be a valid email address.',
    'exists'         => 'The selected :attribute is invalid.',
    'file'           => 'The :attribute must be a file.',
    'filled'         => 'The :attribute field must have a value.',
    'image'          => 'The :attribute must be an image.',
    'in'             => 'The selected :attribute is invalid.',
    'in_array'       => 'The :attribute field does not exist in :other.',
    'integer'        => 'The :attribute must be an integer.',
    'ip'             => 'The :attribute must be a valid IP address.',
    'ipv4'           => 'The :attribute must be a valid IPv4 address.',
    'ipv6'           => 'The :attribute must be a valid IPv6 address.',
    'json'           => 'The :attribute must be a valid JSON string.',
    'max'            => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'     => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min'       => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'   => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique'   => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url'      => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'                      => 'Name',
        'display_name'              => 'Display name',
        'username'                  => 'Pseudo',
        'email'                     => 'Email',
        'first_name'                => 'Firstname',
        'last_name'                 => 'Lastname',
        'password'                  => 'Password',
        'password_confirmation'     => 'Confirm password',
        'old_password'              => 'Old password',
        'new_password'              => 'New password',
        'new_password_confirmation' => 'Confirm new password',
        'postal_code'               => 'Postal code',
        'city'                      => 'City',
        'country'                   => 'Country',
        'address'                   => 'Address',
        'phone'                     => 'Phone',
        'mobile'                    => 'Mobile',
        'age'                       => 'Age',
        'sex'                       => 'Sex',
        'gender'                    => 'Gender',
        'day'                       => 'Day',
        'month'                     => 'Month',
        'year'                      => 'Year',
        'hour'                      => 'Hour',
        'minute'                    => 'Minute',
        'second'                    => 'Second',
        'title'                     => 'Title123',
        'content'                   => 'Content',
        'description'               => 'Description',
        'problemType'               => 'Problem Type',
        'summary'                   => 'Summary',
        'excerpt'                   => 'Excerpt',
        'date'                      => 'Date',
        'time'                      => 'Time',
        'available'                 => 'Available',
        'size'                      => 'Size',
        'roles'                     => 'Roles',
        'permissions'               => 'Permissions',
        'active'                    => 'Active',
        'message'                   => 'Message',
        'g-recaptcha-response'      => 'Captcha',
        'locale'                    => 'Localization',
        'route'                     => 'Route',
        'url'                       => 'URL alias',
        'form_type'                 => 'Form type',
        'form_data'                 => 'Form data',
        'recipients'                => 'Recipients',
        'source_path'               => 'Original path',
        'target_path'               => 'Target path',
        'redirect_type'             => 'Redirect type',
        'timezone'                  => 'Timezone',
        'order'                     => 'Display order',
        'image'                     => 'Image',
        'status'                    => 'Status',
        'pinned'                    => 'Pinned',
        'promoted'                  => 'Promoted',
        'body'                      => 'Body',
        'tags'                      => 'Tags',
        'published_at'              => 'Publish at',
        'unpublished_at'            => 'Unpublish at',
        'metable_type'              => 'Entity',
        'rate'                      => 'Rate',
        'jobcard_num'                => 'Jobcard No',
        'description'                => 'Description',
        'status'                  => 'Status'
    ],



    'jobcards' => [
        'jobcard_num'               => 'Jobcard Number',
        'project_num'               => 'Project Number',
        'description'               => 'Description',
        'problem_type'              => 'Problem Type',
        'priority'                  => 'Priority',
        'facility_name'             => 'Facility Name',
        'district'                  => 'Select District',
        'sub_district'              => 'Select Sub District',
        'projects'                  => 'Select Projects',
        'projectmanager'            => 'Select Project Manager',
        'labour_paid'               => 'Labour Paid',
        'travelling_paid'           => 'Travelling Paid',
        'materials_paid'            => 'Materials Paid',
        'quoted_amount'            => 'Quoted Amount',
        'status'                    => 'Select Status',
        'assigned_to'               => 'Select User to Assign',
        'before_pictures'           => 'Before Pictures',
        'during_pictures'           => 'During Pictures',
        'after_pictures'           => 'After Pictures',
        'attachment_receipt'           => 'Receipt & Invoice Attachment',
        'upload_jobcard'           => 'Upload Jobcard',
        'quotations'           => 'Quotation',
        'vat_rate_id'           => 'Select Vat Rates',
    ],

    'quotes' => [
      'quotation_number'          => 'Quote Number',
      'project_num'               => 'Project Number',
      'quotation_name'               => 'Quotes Name',
      'travelling_time'           => 'Travelling Time',
      'travelling_km'             => 'Travelling KM',
      'vat_amount'                => 'Vat Amount',
      'net_amount'                => 'Net Amount',
      'total_amount'              => 'Total Amount',
      'quotation_date'           => 'Quotation Date',
      'labour_rates'           => 'Labour Rates',
      'material_rates'           => 'Material Rates',
      'vat_rates'           => 'Vat Rates',
      'jobcard_id'          => 'Jobcard'
      
    ],
'District' => [
      'name'        => 'District Name'
     ],

'SubDistrict' => [
      'name'        => 'Sub District Name'
     ],

'quotes' => [
      'quotation_number'          => 'Quote Number',
      'project_num'               => 'Project Number',
      'quotation_name'               => 'Quotes Name',
      'travelling_time'           => 'Travelling Time',
      'travelling_km'             => 'Travelling KM',
      'vat_amount'                => 'Vat Amount',
      'net_amount'                => 'Net Amount',
      'total_amount'              => 'Total Amount',
      'quotation_date'           => 'Quotation Date',
      'labour_rates'           => 'Labour Rates',
      'material_rates'           => 'Material Rates',
      'vat_rates'           => 'Vat Rates',
      'jobcard_id'          => 'Jobcard'
      
    ],
    'reports' => [
      'description'=> 'Description',
      'status'=> 'Status',
      'expenses'=> 'Expenses',
      'amount'=> 'Amount',
      'vat_collected'=> 'Vat Collected',
      'profit_loss'=> 'Profit Loss',
      'jobcard' => 'Jobcard'                      
    ],

    'settings' => [
      'company_name'=> 'Company Name',
      'company_address'=> 'Company Address',
      'company_logo'=> 'Company Logo',
      'bank_account'=> 'Bank Account',
      'quote_ref_start'=> 'Quote Reference Start',
      'quote_ref_alphabet'=> 'Quote Reference Start Characters',
      'invoice_ref_alphabet'=> 'Invoice Reference Start Characters',
      'quote_vat'=> 'Quote Vat Rate', 
      'invoice_ref_start' => 'Invoice Reference Start'                   
    ],

    'invoices' => [
      'description'=> 'Description',
      'quantity'=> 'Quantity',
      'amount'=> 'Amount',
      'net_amount'=> 'Net Amount',
      'vat_amount'=> 'Vat Amount',
      'total_amount'=> 'Total Amount',
      'materials_rates_id'=> 'Materials Paid',
      'vat_id'=>'Vat Rates',
      'quotations_id'=>'Quotation',
      'invoice_name' => 'Name',
      'invoice_status' => 'Status',
      'invoice_reference' => 'Reference No',
      'client_email' => 'Client Email',
      'invoice_date' => 'Invoice Date',
      'jobcard_id'          => 'Jobcard',
      'invoice_number' => 'Invoice #',
      'vats_amount'=>'Output VAT'
    ],

    'clients' => [
      'first_name'  => 'First Name',
      'last_name'  => 'Last Name',
      'business_name'  => 'Business Name',
      'street'  => 'Street',
      'town'  => 'Town',
      'email'  => 'Email',
      'region'  => 'Region',
      'primary_phone'  => 'Primary Phone',
      'secondary_phone'  => 'Secondary Phone',
      'notes'  => 'Notes',
    ],
];
