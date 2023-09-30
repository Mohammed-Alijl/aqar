<?php

return [

    //================================================================================
    // CATEGORIES=====================================================================
    //================================================================================
    'category.name.required' => 'اسم القسم مطلوب',
    'category.name.max' => 'اسم القسم طويل جداً',
    'category.display_main.required' => 'الرجاء اختيار ما إذا كان سيتم عرضه في الصفحة الرئيسية أم لا',
    'category.display_main.boolean' => 'الرجاء اختيار نعم أو لا للعرض في الصفحة الرئيسية',
    'category.display_order.integer' => 'الرجاء إدخال ترتيب العرض كرقم صحيح',
    'display_order.required_if' => 'بما أنك قررت عرض القسم في الصفحة الرئيسية، يجب عليك إدخال ترتيب العرض',
    'category.can.not.delete' => 'هذا القسم مستخدم بالفعل',

    //================================================================================
    // ZONES==========================================================================
    //================================================================================
    'zone.name.required' => 'اسم المنطقة مطلوب',
    'zone.name.max' => 'اسم المنطقة كبير جدا',
    'zone.can.not.delete' => 'هذه المنطقة مستخدمة بالفعل',

    //================================================================================
    // CITIES=========================================================================
    //================================================================================
    'city.name.required' => 'اسم المدينة مطلوب',
    'city.name.max' => 'اسم المدينة طويل جدًا',
    'city.zone_id.required' => 'الرجاء اختيار المنطقة من صندوق الاختيارات',
    'city.zone_id.integer' => 'الرجاء اختيار المنطقة من صندوق الاختيارات',
    'city.zone_id.exists' => 'الرجاء اختيار المنطقة من صندوق الاختيارات',
    'city.can.not.delete' => 'هذه المدينة مستخدمة بالفعل',

    //================================================================================
    // ATTRIBUTES=====================================================================
    //================================================================================
    'attribute.name.required' => 'اسم الصفة مطلوب',
    'attribute.name.max' => 'اسم الصفة كبير جدا',

    //================================================================================
    // ATTRIBUTE VALUES===============================================================
    //================================================================================
    'attribute.value.name.required' => 'اسم قيمة الصفة مطلوب',
    'attribute.value.name.max' => 'اسم قيمة الصفة كبير جدا',

    //================================================================================
    // AQARS =========================================================================
    //================================================================================
    'aqar.title.required' => 'اسم العقار مطلوب',
    'aqar.title.max' => 'اسم العقار طويل جدًا',
    'aqar.description.required' => 'وصف العقار لا يمكن أن يكون فارغًا',
    'aqar.zone_id.required' => 'الرجاء اختيار المنطقة من القائمة المنسدلة',
    'aqar.zone_id.integer' => 'الرجاء اختيار المنطقة من القائمة المنسدلة',
    'aqar.zone_id.exists' => 'الرجاء اختيار المنطقة من القائمة المنسدلة',
    'aqar.latitude.required' => 'الخط العرض مطلوب',
    'aqar.latitude.numeric' => 'الرجاء إدخال خط عرض صحيح',
    'aqar.longitude.required' => 'خط الطول مطلوب',
    'aqar.longitude.numeric' => 'الرجاء إدخال خط طول صحيح',
    'aqar.attachments.required' => 'الرجاء إرسال مرفق واحد على الأقل (صورة أو فيديو)',
    'aqar.attachments.array' => 'يجب أن تكون المرفقات مصفوفة',
    'aqar.attachments.*.file' => 'يجب أن يكون المرفق صورة أو فيديو',
    'aqar.attachments.*.mimes' => 'يجب أن يكون المرفق صورة أو فيديو',
    'aqar.attributes.array' => 'يجب أن تكون الخصائص مصفوفة',
    'aqar.attributes.*.integer' => 'الرجاء اختيار خاصية صحيحة',
    'aqar.attributes.*.exists' => 'الرجاء اختيار خاصية صحيحة',
    'aqar.values.array' => 'قيم الخصائص يجب أن تكون مصفوفة',
    'aqar.values.*.integer' => 'الرجاء اختيار قيمة خاصية صحيحة',
    'aqar.values.*.exists' => 'الرجاء اختيار قيمة خاصية صحيحة',
    'aqar.related_aqars.array' => 'العقارات المرتبطة يجب أن تكون مصفوفة',
    'aqar.related_aqars.*.integer' => 'الرجاء اختيار عقار صحيح',
    'aqar.related_aqars.*.exists' => 'الرجاء اختيار عقار صحيح',

];
