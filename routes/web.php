<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\backend\DashboardController;

//frontend routes
require __DIR__ . "/frontend.php";

//Auth::routes();

//Admin Login Routes
Route::prefix('admin')->namespace('backend\Admin')->name('admin.')->group(static function () {
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@login')->name('login.submit');
    Route::get('/logout', 'LoginController@logout')->name('logout');

    //Admin verify email
    Route::get('verify', 'AdminManagementController@verifyEmailForm')->name('verify');
    Route::put('verify', 'AdminManagementController@verifyEmailConfirm')->name('verify.email');

    //Admin Login Failed error message
    Route::get('account/verification', 'LoginController@verificationFailed')->name('verification.failed');
    Route::get('account/disabled', 'LoginController@accountDisabledMessage')->name('account.disabled');
});

//Backend Admin
Route::prefix('admin')->namespace('backend')->name('admin.')->middleware('admin')->group(static function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //Admin Profile
    Route::prefix('profile')->namespace('Admin')->name('profile.')->group(static function () {
        Route::get('/', 'EditProfileController@index')->name('index');
        Route::put('/update', 'EditProfileController@update')->name('update');
        Route::get('/update-email', 'EditProfileController@updateEmail')->name('update.email');

        Route::get('/change-password', 'ChangePasswordController@index')->name('changepassword');
        Route::put('/update-password', 'ChangePasswordController@updatePassword')->name('updatepassword');
    });

    //Admin Management
    Route::prefix('manage')->namespace('Admin')->name('manage.')->group(static function () {
        Route::get('/', 'AdminManagementController@index')->name('index');
        Route::get('/create', 'AdminManagementController@create')->name('create');
        Route::post('/store', 'AdminManagementController@store')->name('store');
        Route::get('/show/{id}', 'AdminManagementController@show')->name('show');
        Route::get('/{id}/edit', 'AdminManagementController@edit')->name('edit');
        Route::put('/update/{id}', 'AdminManagementController@update')->name('update');
        Route::get('/destroy/{id}', 'AdminManagementController@destroy')->name('destroy');
    });

    //Trainer
    Route::prefix('trainer')->name('trainer.')->group(static function () {
        Route::get('/', 'TrainerController@index')->name('index');
        Route::get('/create', 'TrainerController@create')->name('create');
        Route::post('/store', 'TrainerController@store')->name('store');
        Route::get('/show/{id}', 'TrainerController@show')->name('show');
        Route::get('/{id}/edit', 'TrainerController@edit')->name('edit');
        Route::put('/update/{id}', 'TrainerController@update')->name('update');
        Route::get('/destroy/{id}', 'TrainerController@destroy')->name('destroy');
    });

    //Contact Message
    Route::prefix('contact')->name('contact.')->group(static function () {
        Route::get('/', 'ContactController@index')->name('index');
        Route::get('/show/{id}', 'ContactController@show')->name('show');
        Route::get('/destroy/{id}', 'ContactController@destroy')->name('destroy');
    });

    //Banner
    Route::prefix('banner')->name('banner.')->group(static function () {
        Route::get('/', 'BannerController@index')->name('index');
        Route::get('/create', 'BannerController@create')->name('create');
        Route::post('/store', 'BannerController@store')->name('store');
        Route::get('/show/{id}', 'BannerController@show')->name('show');
        Route::get('/{id}/edit', 'BannerController@edit')->name('edit');
        Route::put('/update/{id}', 'BannerController@update')->name('update');
        Route::get('/destroy/{id}', 'BannerController@destroy')->name('destroy');
    });

    //Advertisement
    Route::prefix('advertisement')->name('advertisement.')->group(static function () {
        Route::get('/', 'AdvertisementController@index')->name('index');
        Route::get('/create', 'AdvertisementController@create')->name('create');
        Route::post('/store', 'AdvertisementController@store')->name('store');
        Route::get('/show/{id}', 'AdvertisementController@show')->name('show');
        Route::get('/{id}/edit', 'AdvertisementController@edit')->name('edit');
        Route::put('/update/{id}', 'AdvertisementController@update')->name('update');
        Route::get('/destroy/{id}', 'AdvertisementController@destroy')->name('destroy');
    });

    //Videos
    Route::prefix('video')->name('video.')->group(static function () {
        Route::get('/', 'VideoController@index')->name('index');
        Route::get('create', 'VideoController@create')->name('create');
        Route::post('store', 'VideoController@store')->name('store');
        Route::get('show/{id}/', 'VideoController@show')->name('show');
        Route::get('{id}/edit', 'VideoController@edit')->name('edit');
        Route::put('update/{id}', 'VideoController@update')->name('update');
        Route::get('destroy/{id}', 'VideoController@destroy')->name('destroy');
    });

    //Press
    Route::prefix('press')->name('press.')->group(static function () {
        Route::get('/', 'PressController@index')->name('index');
        Route::get('/create', 'PressController@create')->name('create');
        Route::post('/store', 'PressController@store')->name('store');
        Route::get('/show/{id}', 'PressController@show')->name('show');
        Route::get('/{id}/edit', 'PressController@edit')->name('edit');
        Route::put('/update/{id}', 'PressController@update')->name('update');
        Route::get('/destroy/{id}', 'PressController@destroy')->name('destroy');
    });

    //Team
    Route::prefix('team')->name('team.')->group(static function () {
        Route::get('/', 'TeamController@index')->name('index');
        Route::get('/create', 'TeamController@create')->name('create');
        Route::post('/store', 'TeamController@store')->name('store');
        Route::get('/show/{id}', 'TeamController@show')->name('show');
        Route::get('/{id}/edit', 'TeamController@edit')->name('edit');
        Route::put('/update/{id}', 'TeamController@update')->name('update');
        Route::get('/destroy/{id}', 'TeamController@destroy')->name('destroy');
    });

    //Tags
    Route::prefix('tags')->name('tags.')->group(static function () {
        Route::get('/', 'TagController@index')->name('index');
        Route::get('/create', 'TagController@create')->name('create');
        Route::post('/store', 'TagController@store')->name('store');
        Route::get('/{id}/edit', 'TagController@edit')->name('edit');
        Route::put('/update/{id}', 'TagController@update')->name('update');
        Route::get('/destroy/{id}', 'TagController@destroy')->name('destroy');
    });

    //Board Of Director
    Route::prefix('bod')->name('bod.')->group(static function () {
        Route::get('/', 'BoardDirController@index')->name('index');
        Route::get('/create', 'BoardDirController@create')->name('create');
        Route::post('/store', 'BoardDirController@store')->name('store');
        Route::get('/show/{id}', 'BoardDirController@show')->name('show');
        Route::get('/{id}/edit', 'BoardDirController@edit')->name('edit');
        Route::put('/update/{id}', 'BoardDirController@update')->name('update');
        Route::get('/destroy/{id}', 'BoardDirController@destroy')->name('destroy');
    });


    //Scholarship
    Route::prefix('scholarship')->name('scholarship.')->group(static function () {
        Route::get('/', 'ScholarshipController@index')->name('index');
        Route::get('/create', 'ScholarshipController@create')->name('create');
        Route::post('/store', 'ScholarshipController@store')->name('store');
        Route::get('/show/{id}', 'ScholarshipController@show')->name('show');
        Route::get('/{id}/edit', 'ScholarshipController@edit')->name('edit');
        Route::put('/update/{id}', 'ScholarshipController@update')->name('update');
        Route::get('/destroy/{id}', 'ScholarshipController@destroy')->name('destroy');
    });

    //Admission
    Route::prefix('admission')->name('admission.')->group(static function () {
        Route::get('/', 'AdmissionController@index')->name('index');
        Route::get('/create', 'AdmissionController@create')->name('create');
        Route::post('/store', 'AdmissionController@store')->name('store');
        Route::get('/show/{id}', 'AdmissionController@show')->name('show');
        Route::get('/{id}/edit', 'AdmissionController@edit')->name('edit');
        Route::put('/update/{id}', 'AdmissionController@update')->name('update');
        Route::get('/destroy/{id}', 'AdmissionController@destroy')->name('destroy');
    });

    //Exam
    //add exam
    Route::prefix('exam')->name('exam.')->group(static function () {
        Route::get('/', 'ExamController@index')->name('index');
        Route::get('/create', 'ExamController@create')->name('create');
        Route::post('/store', 'ExamController@store')->name('store');
        Route::get('/show/{id}', 'ExamController@show')->name('show');
        Route::get('/{id}/edit', 'ExamController@edit')->name('edit');
        Route::put('/update/{id}', 'ExamController@update')->name('update');
        Route::get('/destroy/{id}', 'ExamController@destroy')->name('destroy');
    });

    //add question
    Route::prefix('question')->name('question.')->group(static function () {
        Route::get('/', 'QuestionController@index')->name('index');
        Route::get('/create', 'QuestionController@create')->name('create');
        Route::post('/store', 'QuestionController@store')->name('store');
        Route::get('/show/{id}', 'QuestionController@show')->name('show');
        Route::get('/{id}/edit', 'QuestionController@edit')->name('edit');
        Route::put('/update/{id}', 'QuestionController@update')->name('update');
        Route::get('/destroy/{id}', 'QuestionController@destroy')->name('destroy');
        Route::get('/search', 'QuestionController@search')->name('search');

    });

    //view result
    Route::prefix('result')->name('result.')->group(static function () {
        Route::get('/', 'ResultsController@index')->name('index');
        Route::get('/search', 'ResultsController@searchStudent')->name('search.student');
        Route::get('/student/{studentId}', 'ResultsController@studentResult')->name('student');
        Route::get('/student/show-answer/{resultId}', 'ResultsController@showAnswer')->name('student.show.answer');
        Route::get('/download/{resultId}', 'ResultsController@downloadResult')->name('download');
    });

    //Testimonial
    Route::prefix('testimonial')->name('testimonial.')->group(static function () {
        Route::get('/', 'TestimonialController@index')->name('index');
        Route::get('/create', 'TestimonialController@create')->name('create');
        Route::post('/store', 'TestimonialController@store')->name('store');
        Route::get('/show/{id}', 'TestimonialController@show')->name('show');
        Route::get('/{id}/edit', 'TestimonialController@edit')->name('edit');
        Route::put('/update/{id}', 'TestimonialController@update')->name('update');
        Route::get('/destroy/{id}', 'TestimonialController@destroy')->name('destroy');
    });

    //Event
    Route::prefix('event')->name('event.')->group(static function () {
        Route::get('/', 'EventController@index')->name('index');
        Route::get('/create', 'EventController@create')->name('create');
        Route::post('/store', 'EventController@store')->name('store');
        Route::get('/show/{id}', 'EventController@show')->name('show');
        Route::get('/{id}/edit', 'EventController@edit')->name('edit');
        Route::put('/update/{id}', 'EventController@update')->name('update');
        Route::get('/destroy/{id}', 'EventController@destroy')->name('destroy');
    });

    //Notice
    Route::prefix('notice')->name('notice.')->group(static function () {
        Route::get('/', 'NoticeController@index')->name('index');
        Route::get('/create', 'NoticeController@create')->name('create');
        Route::post('/store', 'NoticeController@store')->name('store');
        Route::get('/show/{id}', 'NoticeController@show')->name('show');
        Route::get('/{id}/edit', 'NoticeController@edit')->name('edit');
        Route::put('/update/{id}', 'NoticeController@update')->name('update');
        Route::get('/destroy/{id}', 'NoticeController@destroy')->name('destroy');
    });

    //Featured Student
    Route::prefix('featuredstudent')->name('featuredstudent.')->group(static function () {
        Route::get('/', 'FeaturedStudentController@index')->name('index');
        Route::get('/create', 'FeaturedStudentController@create')->name('create');
        Route::post('/store', 'FeaturedStudentController@store')->name('store');
        Route::get('/show/{id}', 'FeaturedStudentController@show')->name('show');
        Route::get('/{id}/edit', 'FeaturedStudentController@edit')->name('edit');
        Route::put('/update/{id}', 'FeaturedStudentController@update')->name('update');
        Route::get('/destroy/{id}', 'FeaturedStudentController@destroy')->name('destroy');
    });

    //Gallery
    Route::prefix('gallery')->name('gallery.')->group(static function () {
        Route::get('/', 'GalleryController@index')->name('index');
        Route::get('/create', 'GalleryController@create')->name('create');
        Route::post('/store', 'GalleryController@store')->name('store');
        Route::get('/show/{id}', 'GalleryController@show')->name('show');
        Route::get('/{id}/edit', 'GalleryController@edit')->name('edit');
        Route::put('/update/{id}', 'GalleryController@update')->name('update');
        Route::get('/destroy/{id}', 'GalleryController@destroy')->name('destroy');
        Route::get('/destroy-image-item/{id}', 'GalleryController@destroyImageItem')->name('destroy.image.item');
    });

    //Donations
    Route::prefix('donation')->name('donation.')->group(static function () {
        Route::get('/', 'DonationController@index')->name('index');
        Route::get('/show/{id}', 'DonationController@show')->name('show');
        Route::get('/download-certificate/{id}', 'DonationController@downloadCertificate')->name('download.certificate');
    });

    //Dean Message
    Route::prefix('dean-message')->name('deanmessage.')->group(static function () {
        Route::get('/', 'DeanMessageController@index')->name('index');
        Route::get('/create', 'DeanMessageController@create')->name('create');
        Route::post('/store', 'DeanMessageController@store')->name('store');
        Route::get('/show/{id}', 'DeanMessageController@show')->name('show');
        Route::get('/{id}/edit', 'DeanMessageController@edit')->name('edit');
        Route::put('/update/{id}', 'DeanMessageController@update')->name('update');
        Route::get('/destroy/{id}', 'DeanMessageController@destroy')->name('destroy');
    });

    //Career
    Route::prefix('career')->name('career.')->group(static function () {
        Route::get('/', 'CareerController@index')->name('index');
        Route::get('/create', 'CareerController@create')->name('create');
        Route::post('/store', 'CareerController@store')->name('store');
        Route::get('/{id}/edit', 'CareerController@edit')->name('edit');
        Route::put('/update/{id}', 'CareerController@update')->name('update');
        Route::get('/destroy/{id}', 'CareerController@destroy')->name('destroy');
    });

    //Course
    Route::prefix('course')->name('course.')->group(static function () {
        Route::get('/', 'CourseController@index')->name('index');
        Route::get('/create', 'CourseController@create')->name('create');
        Route::post('/store', 'CourseController@store')->name('store');
        Route::get('/show/{id}', 'CourseController@show')->name('show');
        Route::get('/{id}/edit', 'CourseController@edit')->name('edit');
        Route::put('/update/{id}', 'CourseController@update')->name('update');
        Route::get('/destroy/{id}', 'CourseController@destroy')->name('destroy');
        Route::get('/destroy-image-item/{id}', 'CourseController@destroyImageItem')->name('destroy.image.item');
        Route::get('/destroy-video-item/{id}', 'CourseController@destroyVideoItem')->name('destroy.video.item');
    });

    //Category
    Route::prefix('category')->name('category.')->group(static function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/{id}/edit', 'CategoryController@edit')->name('edit');
        Route::put('/update/{id}', 'CategoryController@update')->name('update');
        Route::get('/destroy/{id}', 'CategoryController@destroy')->name('destroy');
    });

    //Programs
    Route::prefix('program')->name('program.')->group(static function () {
        Route::get('/', 'ProgramsController@index')->name('index');
        Route::get('/create', 'ProgramsController@create')->name('create');
        Route::post('/store', 'ProgramsController@store')->name('store');
        Route::get('/show/{id}', 'ProgramsController@show')->name('show');
        Route::get('/{id}/edit', 'ProgramsController@edit')->name('edit');
        Route::put('/update/{id}', 'ProgramsController@update')->name('update');
        Route::get('/destroy/{id}', 'ProgramsController@destroy')->name('destroy');
        Route::get('/destroy-image-item/{id}', 'ProgramsController@destroyImageItem')->name('destroy.image.item');
        Route::get('/destroy-video-item/{id}', 'ProgramsController@destroyVideoItem')->name('destroy.video.item');
    });

    //Trainings
    Route::prefix('training')->name('training.')->group(static function () {
        Route::get('/', 'TrainingsController@index')->name('index');
        Route::get('/create', 'TrainingsController@create')->name('create');
        Route::post('/store', 'TrainingsController@store')->name('store');
        Route::get('/show/{id}', 'TrainingsController@show')->name('show');
        Route::get('/{id}/edit', 'TrainingsController@edit')->name('edit');
        Route::put('/update/{id}', 'TrainingsController@update')->name('update');
        Route::get('/destroy/{id}', 'TrainingsController@destroy')->name('destroy');
        Route::get('/destroy-image-item/{id}', 'TrainingsController@destroyImageItem')->name('destroy.image.item');
        Route::get('/destroy-video-item/{id}', 'TrainingsController@destroyVideoItem')->name('destroy.video.item');

        Route::get('/enrolled-students/{id}', 'TrainingsController@enrolledStudents')->name('enrolled.students');

    });

    //Partner
    Route::prefix('partner')->name('partner.')->group(static function () {
        Route::get('/', 'PartnerController@index')->name('index');
        Route::get('/create', 'PartnerController@create')->name('create');
        Route::post('/store', 'PartnerController@store')->name('store');
        Route::get('/show/{id}', 'PartnerController@show')->name('show');
        Route::get('/{id}/edit', 'PartnerController@edit')->name('edit');
        Route::put('/update/{id}', 'PartnerController@update')->name('update');
        Route::get('/destroy/{id}', 'PartnerController@destroy')->name('destroy');
    });

    //Company Associate
    Route::prefix('company-associate')->name('companyassociate.')->group(static function () {
        Route::get('/', 'CompanyAssociateController@index')->name('index');
        Route::get('/create', 'CompanyAssociateController@create')->name('create');
        Route::post('/store', 'CompanyAssociateController@store')->name('store');
        Route::get('/show/{id}', 'CompanyAssociateController@show')->name('show');
        Route::get('/{id}/edit', 'CompanyAssociateController@edit')->name('edit');
        Route::put('/update/{id}', 'CompanyAssociateController@update')->name('update');
        Route::get('/destroy/{id}', 'CompanyAssociateController@destroy')->name('destroy');
    });

    //Franchise
    Route::prefix('franchise')->name('franchise.')->group(static function () {
        Route::get('/', 'FranchiseController@index')->name('index');
        Route::get('/create', 'FranchiseController@create')->name('create');
        Route::post('/store', 'FranchiseController@store')->name('store');
        Route::get('/show/{id}', 'FranchiseController@show')->name('show');
        Route::get('/{id}/edit', 'FranchiseController@edit')->name('edit');
        Route::put('/update/{id}', 'FranchiseController@update')->name('update');
        Route::get('/destroy/{id}', 'FranchiseController@destroy')->name('destroy');
    });

    //CMS
    Route::prefix('cms')->name('cms.')->group(static function () {
        Route::get('{page}', 'CmsController@index')->name('index');
        Route::get('show/{page}/', 'CmsController@show')->name('show');
        Route::get('{page}/edit', 'CmsController@edit')->name('edit');
        Route::put('update/{page}', 'CmsController@update')->name('update');
    });

    //Site Settings routes
    Route::get('/site-settings/', 'SiteSettingsController@index')->name('sitesettings.index');
    Route::put('/site-settings/update/{id}', 'SiteSettingsController@update')->name('sitesettings.update');
});

//Trainer Verify Email
Route::prefix('trainer')->namespace('backend')->name('trainer.')->group(static function () {
    Route::get('verify', 'TrainerController@verifyEmailForm')->name('verify');
    Route::put('verify', 'TrainerController@verifyEmailConfirm')->name('verify.email');
});


