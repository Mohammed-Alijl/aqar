<?php

return [

    //================================================================================
    // CATEGORIES=====================================================================
    //================================================================================
    'category.name.required' => 'The Category Name Is Required',
    'category.name.max' => 'The Category Name Is Too Long',
    'category.display_main.required' => 'Please Select If The Category Will Be In The Home Page Or Not',
    'category.display_main.boolean' => 'Please Select If The Category Will Be In The Home Page Or Not',
    'category.display_order.integer' => 'The Display Order Should Be Integer Only',
    'display_order.required_if' => 'When The Display In Home Page Is True You Should Enter The Display Order',
    'category.can.not.delete' => 'This Category Is already In Use',

    //================================================================================
    // ZONES==========================================================================
    //================================================================================
    'zone.name.required' => 'The Name Of Zone Is Required',
    'zone.name.max' => 'The Name Of Zone Is Too Long',
    'zone.can.not.delete' => 'This Zone Is already In Use',

    //================================================================================
    // CITIES=========================================================================
    //================================================================================
    'city.name.required' => 'The Name Of City Is Required',
    'city.name.max' => 'The Name Of City Is Too Long',
    'city.zone_id.required' => 'Please Select Zone From The Selected Box',
    'city.zone_id.integer' => 'Please Select Zone From The Selected Box',
    'city.zone_id.exists' => 'Please Select Zone From The Selected Box',
    'city.can.not.delete' => 'This City Is already In Use',

    //================================================================================
    // ATTRIBUTES=====================================================================
    //================================================================================
    'attribute.name.required' => 'The Name Of Attribute Is Required',
    'attribute.name.max' => 'The Name Of Attribute Is Too Long',

    //================================================================================
    // ATTRIBUTE VALUES===============================================================
    //================================================================================
    'attribute.value.name.required' => 'The Name Of Attribute Value Is Required',
    'attribute.value.name.max' => 'The Name Of Attribute Value Is Too Long',

    //================================================================================
    // AQARS =========================================================================
    //================================================================================
    'aqar.title.required' => 'The Aqar Title Is Required',
    'aqar.title.max' => 'Aqar Title Is Too Long',
    'aqar.description.required' => 'Aqar Description Can Not Be Empty',
    'aqar.zone_id.required' => 'Please Select The Zone From The Selected Box',
    'aqar.zone_id.integer' => 'Please Select The Zone From The Selected Box',
    'aqar.zone_id.exists' => 'Please Select The Zone From The Selected Box',
    'aqar.latitude.required' => 'Latitude Is Required',
    'aqar.latitude.numeric' => 'Please Enter A Valid Latitude',
    'aqar.longitude.required' => 'Longitude Is Required',
    'aqar.longitude.numeric' => 'Please Enter A Valid Longitude',
    'aqar.attachments.required' => 'Please Send At Least One Attachment (Image Or Video)',
    'aqar.attachments.array' => 'Attachments Should Be An Array',
    'aqar.attachments.*.file' => 'Attachment Should Be Image Or Video',
    'aqar.attachments.*.mimes' => 'Attachment Should Be Image Or Video',
    'aqar.attributes.array' => 'Attributes Should Be An Array',
    'aqar.attributes.*.integer' => 'Please Select A Valid Attributes',
    'aqar.attributes.*.exists' => 'Please Select A Valid Attributes',
    'aqar.values.array' => 'Attribute Values Should Be Array',
    'aqar.values.*.integer' => 'Please Select A Valid Attributes Values',
    'aqar.values.*.exists' => 'Please Select A Valid Attributes Values',
    'aqar.related_aqars.array' => 'Related Aqars Should Be Array',
    'aqar.related_aqars.*.integer' => 'Please Select A Valid Aqars',
    'aqar.related_aqars.*.exists' => 'Please Select A Valid Aqars',
];
