@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
@endsection

@section('headerContent')
    <div class="header-container">
        <h1>ابدأ التعلم من أفضل منصة</h1>
        <p>ادرس أي موضوع في أي وقت. استكشف آلاف الدوات بأقل سعر على الإطلاق!</p>

        <div class="mt-5 search-bar">
            <input type="text" placeholder="ماذا تريد ان تتعلم اليوم">
            <button type="submit">
                <i class="fa-solid fa-magnifying-glass fa-rotate-90 text-light"></i>
            </button>
        </div>
    </div>
@endsection

@section('content')
    <section class="features">
        <div class="card">
            <i class="fa-solid fa-laptop"></i>
            <h3>كورسات اون لاين</h3>
            <p>تصفح المشاريع المتنوعة</p>
        </div>
        <div class="card towCard">
            <i class="fa-solid fa-magnifying-glass-plus"></i>
            <h3>كورسات اون لاين</h3>
            <p>تصفح المشاريع المتنوعة</p>
        </div>
        <div class="card">
            <i class="fa-solid fa-clock "></i>
            <h3>كورسات اون لاين</h3>
            <p>تصفح المشاريع المتنوعة</p>
        </div>
    </section>

    <div class="note">
        <p>احصل على المساعدة الداسية التي تحتاجها في لحظات و استمتع بتجربة تعليمية ممتعة و فدة من نوعها.
            بخطوات بسيطة إمكانك الوصول الى اكفاء المدرسين اونلان ليقوموا بمساعدتك والاجابة على اسئلتك الخاصة بالمنهج
            الداسي.
        </p>
    </div>

    <div class="roadmap">
        <div class="card">
            <img src="img/1.png.png" alt="" class="img-fluid">
            <p>كمعلم يمكنك انشاء مجموعة داسية و دعوه طلابك للداسة بشكل تفاعلي ،
                تابع طلابك بشكل ومي و شارك معهم كل متعلقات الدوس ، جدول حصص
                جماعية و قدم لطلابك تجربة تعليمية ثة و ممتعة .</p>
            <h3>أنضم كمدرس</h3>
            <a class="btn btn-danger d-inline">انضم الان</a>
        </div>
        <div class="card">
            <img src="img/4.png.png" alt="" class="img-fluid">
            <p>بخطوات بسيطة إمكانك الوصول الى اكفاء المدرسين اونلان ليقوموا
                بمساعدتك والاجابة على اسئلتك الخاصة بالمنهج الداسي</p>
            <h3>أنضم الان لتبدا التعلم</h3>
            <a class="btn btn-primary d-inline">انضم الان</a>
        </div>
    </div>


    <section class="courses">
        <div class="labels">
            <h2>اعلى الدورات</h2>
        </div>
        <div class="cards">
            @foreach ($courses as $course)
                <div class="card">
                    <img src="{{ asset("admin/upload/courses/images/$course->main_image") }}" alt=""
                        class="img-fluid img-thumbnail">
                    <div class="details">
                        <p>{{ $course->name }}</p>
                        <a href="{{ route('course-details', $course->id) }}" class="btn btn-danger">التفاصيل</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="quality">
        <div>
            <img src="img/10.png.png" alt="">
            <h1>ضمان الرضى</h1>
            <p>بامكان الطالب طلب حصة تجية
                لمدة 30 دقيقة ليتعرف على اسلوب
                المدرس</p>
        </div>
        <div>
            <img src="img/10.png.png" alt="">
            <h1>ضمان الرضى</h1>
            <p>بامكان الطالب طلب حصة تجية
                لمدة 30 دقيقة ليتعرف على اسلوب
                المدرس</p>
        </div>
        <div>
            <img src="img/10.png.png" alt="">
            <h1>ضمان الرضى</h1>
            <p>بامكان الطالب طلب حصة تجية
                لمدة 30 دقيقة ليتعرف على اسلوب
                المدرس</p>
        </div>
        <div>
            <img src="img/10.png.png" alt="">
            <h1>ضمان الرضى</h1>
            <p>بامكان الطالب طلب حصة تجية
                لمدة 30 دقيقة ليتعرف على اسلوب
                المدرس</p>
        </div>
    </section>
@endsection
