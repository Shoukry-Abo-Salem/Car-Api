<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['status'=>true,'message'=>'success','data'=>'
            سياسة الخصوصية
             تاريخ السريان: [أدخل التاريخ]

             مقدمة
             توضح سياسة الخصوصية هذه كيفية قيام [أدخل اسم تطبيقك] ("نحن" أو "نحن" أو "خاصتنا") بجمع المعلومات واستخدامها والكشف عنها عند استخدام تطبيق الهاتف المحمول الخاص بنا ("التطبيق"). من خلال الوصول إلى التطبيق أو استخدامه ، فإنك توافق على شروط وأحكام سياسة الخصوصية هذه.

             المعلومات التي نجمعها

             قد نجمع الأنواع التالية من المعلومات عند استخدام التطبيق:

             المعلومات الشخصية: قد نجمع معلومات يمكن استخدامها لتحديد هويتك ، مثل اسمك وعنوان بريدك الإلكتروني ورقم هاتفك وموقعك. نقوم بجمع هذه المعلومات عندما تقوم بالتسجيل للحصول على حساب أو استخدام التطبيق أو التواصل معنا.

             معلومات السيارة: قد نقوم بجمع معلومات حول المركبات التي تبيعها أو ترغب في شرائها ، مثل الطراز والطراز والسنة والمسافة المقطوعة و VIN.

             معلومات الاستخدام: قد نجمع معلومات حول كيفية استخدامك للتطبيق ، مثل الصفحات التي تزورها والميزات التي تستخدمها والإجراءات التي تتخذها.

             معلومات الجهاز: يجوز لنا جمع معلومات حول الجهاز الذي تستخدمه للوصول إلى التطبيق ، مثل نوع جهازك ونظام التشغيل ونوع المتصفح.

             معلومات الموقع: قد نجمع معلومات حول موقعك ، بما في ذلك موقعك في الوقت الفعلي إذا سمحت لنا بالوصول إليه.

             ملفات تعريف الارتباط والتقنيات المشابهة: قد نستخدم ملفات تعريف الارتباط والتقنيات المماثلة لجمع معلومات حول استخدامك للتطبيق.

             كيف نستخدم معلوماتك

             قد نستخدم المعلومات التي نجمعها للأغراض التالية:

             لتوفير التطبيق: قد نستخدم معلوماتك لتوفير التطبيق وتحسينه وتخصيص تجربتك والاستجابة لطلباتك.

             للتواصل معك: قد نستخدم معلوماتك للتواصل معك بشأن التطبيق ، بما في ذلك إرسال التحديثات والإشعارات والرسائل الترويجية إليك.

             لإضفاء الطابع الشخصي على تجربتك: قد نستخدم معلوماتك لتخصيص تجربتك على التطبيق ، مثل عرض محتوى وتوصيات مخصصة لك.

             لتسهيل مبيعات السيارات: قد نستخدم معلوماتك لتسهيل مبيعات السيارات وشرائها ، مثل مطابقة المشترين والبائعين وتقديم معلومات السيارة للأطراف المهتمة.

             لتحليل التطبيق وتحسينه: قد نستخدم معلوماتك لتحليل التطبيق وتحسينه ، مثل تتبع اتجاهات الاستخدام وتفضيلات المستخدم.

             للامتثال للالتزامات القانونية: قد نستخدم معلوماتك للامتثال للالتزامات القانونية ، مثل الرد على مذكرات الاستدعاء أو الطلبات القانونية الأخرى.

             كيف نشارك معلوماتك

             يجوز لنا مشاركة معلوماتك مع الأنواع التالية من الجهات الخارجية:

             مقدمو الخدمة: قد نشارك معلوماتك مع مزودي الخدمة الخارجيين الذين يساعدوننا في تشغيل التطبيق وتقديم الخدمات لك.

             المشترون والبائعون: قد نشارك معلوماتك مع المشترين والبائعين المهتمين بشراء أو بيع سيارة.

             موفرو التحليلات: قد نشارك معلوماتك مع موفري التحليلات الذين يساعدوننا في تحليل استخدام التطبيق.

             شركاء العمل: قد نشارك معلوماتك مع شركائنا في العمل الذين يساعدوننا في توفير التطبيق والخدمات ذات الصلة.

             السلطات القانونية: قد نشارك معلوماتك مع السلطات القانونية إذا طُلب منا القيام بذلك بموجب القانون أو استجابة لطلب قانوني.

             حماية

             نتخذ تدابير معقولة لحماية معلوماتك من الوصول والاستخدام والكشف غير المصرح به. ومع ذلك ، لا يمكننا ضمان أمان معلوماتك ، ونحن لسنا مسؤولين عن الوصول أو الاستخدام أو الكشف غير المصرح به الخارج عن سيطرتنا.

             اختياراتك

             قد يكون لديك خيارات معينة فيما يتعلق باستخدام معلوماتك ، مثل:

             إلغاء الاشتراك في رسائل البريد الإلكتروني الترويجية: يمكنك إلغاء الاشتراك في تلقي رسائل البريد الإلكتروني الترويجية منا باتباع الإرشادات الواردة في البريد الإلكتروني.

             موقع:غزة
        '],Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Privacy Policy
        //            Effective date: [Insert date]
        //
        //            Introduction
        //            This Privacy Policy describes how [insert name of your app] ("we," "us," or "our") collects, uses, and discloses information when you use our mobile application (the "App"). By accessing or using the App, you agree to the terms and conditions of this Privacy Policy.
        //
        //            Information We Collect
        //
        //            We may collect the following types of information when you use the App:
        //
        //            Personal Information: We may collect information that can be used to identify you, such as your name, email address, phone number, and location. We collect this information when you register for an account, use the App, or communicate with us.
        //
        //            Vehicle Information: We may collect information about the vehicles you are selling or interested in buying, such as make, model, year, mileage, and VIN.
        //
        //            Usage Information: We may collect information about how you use the App, such as the pages you visit, the features you use, and the actions you take.
        //
        //            Device Information: We may collect information about the device you use to access the App, such as your device type, operating system, and browser type.
        //
        //            Location Information: We may collect information about your location, including your real-time location if you allow us to access it.
        //
        //            Cookies and Similar Technologies: We may use cookies and similar technologies to collect information about your use of the App.
        //
        //            How We Use Your Information
        //
        //            We may use the information we collect for the following purposes:
        //
        //            To Provide the App: We may use your information to provide and improve the App, to customize your experience, and to respond to your requests.
        //
        //            To Communicate with You: We may use your information to communicate with you about the App, including to send you updates, notifications, and promotional messages.
        //
        //            To Personalize Your Experience: We may use your information to personalize your experience on the App, such as by showing you personalized content and recommendations.
        //
        //            To Facilitate Car Sales: We may use your information to facilitate car sales and purchases, such as by matching buyers and sellers and providing vehicle information to interested parties.
        //
        //            To Analyze and Improve the App: We may use your information to analyze and improve the App, such as by tracking usage trends and user preferences.
        //
        //            To Comply with Legal Obligations: We may use your information to comply with legal obligations, such as responding to subpoenas or other legal requests.
        //
        //            How We Share Your Information
        //
        //            We may share your information with the following types of third parties:
        //
        //            Service Providers: We may share your information with third-party service providers who help us operate the App and provide services to you.
        //
        //            Buyers and Sellers: We may share your information with buyers and sellers who are interested in purchasing or selling a vehicle.
        //
        //            Analytics Providers: We may share your information with analytics providers who help us analyze usage of the App.
        //
        //            Business Partners: We may share your information with our business partners who help us provide the App and related services.
        //
        //            Legal Authorities: We may share your information with legal authorities if we are required to do so by law or in response to a legal request.
        //
        //            Security
        //
        //            We take reasonable measures to protect your information from unauthorized access, use, and disclosure. However, we cannot guarantee the security of your information, and we are not responsible for unauthorized access, use, or disclosure that is beyond our control.
        //
        //            Your Choices
        //
        //            You may have certain choices regarding the use of your information, such as:
        //
        //            Opting-Out of Promotional Emails: You may opt-out of receiving promotional emails from us by following the instructions in the email.
        //
        //            Location
    }
}
