<?php

//Frontend Routes
Route::namespace('frontend')->middleware('locale')->group(static function () {
    Route::get('/lang/{lang}', 'LanguageController@index')->name('lang');

    //Login
    Route::namespace('auth')->group(static function () {
        Route::get('/login', 'LoginsController@index')->name('login');
        Route::get('/register', 'RegisterController@index')->name('register');
        Route::post('/register', 'RegisterController@register')->name('school.register');
        Route::post('/login', 'LoginsController@login')->name('school.login');
        Route::get('/logout', 'LoginsController@logout')->name('school.logout');
        //verify email
        Route::get('verify', 'RegisterController@verifyEmail')->name('school.verify');

        //reset email
        Route::get('/update-email', 'EditProfileController@updateEmail')->name('update.email');

        //forgot password
        Route::get('/forgotpassword', 'LoginsController@forgotPasswordPage')->name('forgotpassword.index');
        Route::post('/forgotpassword', 'LoginsController@forgotPasswordReset')->name('forgotpassword');
        Route::get('/resetpasswordform', 'LoginsController@resetPasswordForm')->name('resetpassword.form');
        Route::post('/resetpassword', 'LoginsController@resetPassword')->name('resetpassword');

    });

    //student authenticated section
    Route::prefix('student')->middleware('student')->name('student.')->group(static function () {

        //student profile
        Route::prefix('profile')->namespace('auth')->name('profile.')->group(static function () {
            Route::get('/', 'EditProfileController@index')->name('index');
            Route::put('/update', 'EditProfileController@update')->name('update');
            Route::get('/change-password', 'ChangePasswordController@index')->name('changepassword');
            Route::put('/update-password', 'ChangePasswordController@updatePassword')->name('updatepassword');
        });

        Route::get('/dashboard', 'StudentController@index')->name('dashboard');

        //take test
        Route::get('/test', 'TestsController@index')->name('test');
        Route::get('/exam-details', 'TestsController@examDetails')->name('exam.details');
        Route::get('/start-test', 'TestsController@startTest')->name('start.test');
        Route::post('/test', 'TestsController@store')->name('test.submit');
        Route::get('/result', 'ResultController@index')->name('all.result');
        Route::get('/result/answers', 'ResultController@testResult')->name('test.result');
        Route::get('/test/time-store', 'ResultController@testTimeStore')->name('test.time.store');

        //career notice
        Route::get('/career', 'CareerController@careerNotice')->name('career');
        //chat
        Route::get('/chat', 'ChatController@index')->name('chat');
        Route::get('/course/chat/{courseId}', 'ChatController@courseChat')->name('course.chat');
        Route::get('/message/{id}', 'ChatController@getMessage')->name('message');
        Route::post('message', 'ChatController@sendMessage')->name('send.message');

        //course
        Route::get('course/course-list', 'StudentController@courseList')->name('course.list');
        Route::get('course/course-actions/{id}-{title_en}', 'CourseController@courseActions')->name('course.actions');

        //assignment
        Route::get('uploaded-assignment/{cid}', 'AssignmentController@showUploadedAssignments')->name('show.uploaded.assignments');
        Route::get('/submit-assignments/{cid}', 'AssignmentController@index')->name('submit.assignments.index');
        Route::get('/submit-assignments-form', 'AssignmentController@assignmentSubmissionForm')->name('submit.assignment.form');
        Route::post('/submit-assignment', 'AssignmentController@store')->name('submit.assignment');
        Route::get('assignment-list/{cid}', 'AssignmentController@showAssignmentList')->name('show.uploaded.assignmentlist');
        Route::get('/submitted-assignment/{cid}', 'AssignmentController@showSubmittedAssignments')->name('show.submitted.assignment');
        Route::get('submitted-assignment', 'AssignmentController@showUploadedAssignmentsByStudent')->name('show.student.assignment');

        Route::get('/assignment-edit/{assignmentId}', 'AssignmentController@editAssignmentSubmission')->name('assignment.edit');
        Route::put('/assignment-update/{assignmentId}', 'AssignmentController@updateAssignmentSubmission')->name('assignment.update');
        Route::get('/assignment-edit/{assignmentId}/deleteFile', 'AssignmentController@deleteAssignmentSubmissionFile')->name('assignment.delete.file');
        Route::get('/assignment-edit/{assignmentId}/delete', 'AssignmentController@deleteAssignmentSubmission')->name('assignment.delete');
    });

    //trainer authenticated section
    Route::prefix('trainer')->middleware('trainer')->name('trainer.')->group(static function () {

        //trainer profile
        Route::prefix('profile')->namespace('auth')->name('profile.')->group(static function () {
            Route::get('/', 'EditProfileController@index')->name('index');
            Route::put('/update', 'EditProfileController@update')->name('update');
            Route::get('/change-password', 'ChangePasswordController@index')->name('changepassword');
            Route::put('/update-password', 'ChangePasswordController@updatePassword')->name('updatepassword');
        });

        Route::get('/dashboard', 'TrainerController@index')->name('dashboard');
        Route::get('/homework', 'TrainerController@homework')->name('homework');

        //chat
        Route::get('/chat', 'ChatController@index')->name('chat');
        Route::get('/course/chat/{courseId}', 'ChatController@courseChat')->name('course.chat');
        Route::get('/message/{id}', 'ChatController@getMessage')->name('message');
        Route::post('message', 'ChatController@sendMessage')->name('send.message');

        //course
        Route::get('/course-list', 'TrainerController@courseList')->name('course.list');
        Route::get('/course-actions/{id}-{title_en}', 'CourseController@courseActions')->name('course.actions');

        //assignment
        Route::get('/upload-assignment/{id}', 'AssignmentController@index')->name('upload.assignment.index');
        Route::post('/upload-assignment', 'AssignmentController@store')->name('upload.assignment');
        Route::get('assignment/student-list/', 'AssignmentController@assignmentStudentList')->name('assignment.student.list');
        Route::get('assignment-list/{cid}', 'AssignmentController@showUploadedAssignments')->name('show.uploaded.assignments');
        Route::get('student/submitted-assignment', 'AssignmentController@showUploadedAssignmentsByStudent')->name('show.student.assignment');
        Route::get('/my-submitted-assignments/{cid}', 'AssignmentController@showSubmittedAssignments')->name('my.submitted.assignments');
        Route::get('/disable-assignment/{assignmentId}', 'AssignmentController@disableAssignment')->name('assignment.disable');

        Route::get('/assignment-edit/{assignmentId}', 'AssignmentController@editAssignment')->name('assignment.edit');
        Route::put('/assignment-update/{assignmentId}', 'AssignmentController@updateAssignment')->name('assignment.update');
        Route::get('/assignment-edit/{assignmentId}/deleteFile', 'AssignmentController@deleteAssignmentFile')->name('assignment.delete.file');
        Route::get('/assignment-edit/{assignmentId}/delete', 'AssignmentController@deleteAssignment')->name('assignment.delete');
    });

    //email not verified page
    Route::get('verify-email', 'StudentController@verifyEmailPage')->name('verify.email');
    //NavBar Pages
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/', 'SubscribeController@store')->name('subscribe.store');

    Route::get('/acreditation','HomeController@acreditation')->name('acreditation');
    //courses
    Route::get('/courses', 'CourseController@index')->name('courses');
    Route::get('/course/show/{course}', 'CourseController@show')->name('course.show');
    //category
    Route::get('/category/show/{category}', 'CategoryController@show')->name('category.show');
    //programs
    Route::get('/programs', 'ProgramsController@index')->name('programs');
    Route::get('/programs/show/{program}', 'ProgramsController@show')->name('programs.show');
    //trainings
    Route::get('/trainings', 'TrainingsController@index')->name('trainings');
    Route::get('/training/show/{training}', 'TrainingsController@show')->name('training.show');
    //contact
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact', 'ContactController@store')->name('contact.store');
    //verify certification
    Route::get('/verify-certification', 'CertificationController@index')->name('verify-certification');
    //about us
    Route::get('/about-us', 'AboutUsController@index')->name('about-us');
    //career
    Route::get('/career', 'CareerController@index')->name('career');
    //projects
    Route::get('projects', 'ProjectsController@index')->name('projects');
    Route::get('project/show/{project}', 'ProjectsController@show')->name('project.show');
    //events
    Route::get('/events', 'EventsController@index')->name('events');
    Route::get('event/show/{event}', 'EventsController@show')->name('event.show');
    //press
    Route::get('press', 'PressController@index')->name('press');
    Route::get('press/show/{press}', 'PressController@show')->name('press.show');

    //videos
    Route::get('videos', 'VideosController@index')->name('videos');

    //board of directors
    Route::get('board-of-directors', 'BODController@index')->name('bod');
    Route::get('resident-professors', 'BODController@resident')->name('resident');
    Route::get('visiting-professors', 'BODController@visiting')->name('visiting');
    Route::get('consultants', 'BODController@consultant')->name('consultant');
    Route::get('instructors', 'BODController@instructor')->name('instructor');
    //    Route::get('board-of-directors/show/{id}', 'PressController@show')->name('bod.show');

    //terms and conditions
    Route::get('terms-and-conditions', 'FooterController@termsandconditions')->name('termsandconditions');
    //privacy policy
    Route::get('privacy-policy', 'FooterController@privacyPolicy')->name('privacypolicy');

    Route::get('/admission', 'AdmissionController@index')->name('admission');
    Route::post('/admission', 'AdmissionController@admissionApply')->name('admission.apply');
    Route::get('/team', 'TeamController@index')->name('team');
    Route::get('/gallery', 'GalleryController@index')->name('gallery');
    Route::get('/gallery/images/{gallery}', 'GalleryController@show')->name('gallery.show');
    Route::post('/scholarship/apply', 'ScholarshipController@applyScholarship')->name('scholarship.apply');

    //Stripe Payment for course
    Route::group(['prefix' => 'purchase', 'as' => 'purchase.'], function () {
        Route::get('/course/{course}', 'CoursePaymentController@index')->name('index');
        Route::post('/course/{course}', 'CoursePaymentController@purchaseCourse')->name('course');
    });

    //Stripe Payment for training
    Route::group(['prefix' => 'purchase', 'as' => 'purchase.'], function () {
        Route::get('/training/{training}', 'TrainingPaymentController@index')->name('index');
        Route::post('/training/{courseid}', 'TrainingPaymentController@purchaseTraining')->name('training');
    });

    //Stripe donation
    Route::group(['prefix' => 'donation', 'as' => 'donation.'], function () {
        Route::get('/donation', 'DonationController@index')->name('index');
        Route::post('/donate', 'DonationController@donate')->name('donate');
    });

});


//Route::prefix('admin')->namespace('backend')->name('admin.')->middleware('admin')->group(static function () {
//    Route::get('/', 'HomeController@index')->name('home');
//});