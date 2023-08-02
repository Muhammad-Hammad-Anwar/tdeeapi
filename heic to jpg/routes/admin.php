<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Route
|--------------------------------------------------------------------------
*/
Route::get('dashboard', DashboardController::class)->name('dashboard');

/*
|--------------------------------------------------------------------------
| Role Routes
|--------------------------------------------------------------------------
| All route related to users roles module
*/
Route::resource('roles', RoleController::class);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
| All route related to users module
*/
Route::resource('users', UserController::class);
Route::controller(UserController::class)->prefix('user')->group(function () {
	Route::get('profile', 		 'profileEdit'	)->name('user.profile.edit');
    Route::post('profile',		 'profileUpdate')->name('user.profile.update');
    Route::post('check_email', 	 'checkEmail'	)->name('user.checkEmail');
    Route::post('check_password','checkPassword')->name('user.checkPassword');
});

/*
|--------------------------------------------------------------------------
| Language Routes
|--------------------------------------------------------------------------
| All route related to languages module
*/
Route::resource('languages', LanguageController::class);
Route::controller(LanguageController::class)->prefix('language')->group(function () {
	Route::post('check_code', 'checkCode')->name('languages.check_code');
});

/*
|--------------------------------------------------------------------------
| Auther Routes
|--------------------------------------------------------------------------
| All route related to auther module
*/
Route::resource('authers', AutherController::class);
Route::controller(AutherController::class)->prefix('auther')->group(function () {
	Route::post('store',		'storeLink' )->name('author.link.store');
	Route::delete('delete/{id}','deleteLink')->name('author.link.destroy');
});

/*
|--------------------------------------------------------------------------
| Media Routes
|--------------------------------------------------------------------------
| All route related to media module
*/
Route::controller(GalleryController::class)->prefix('media')->group(function () {
	Route::get('index',		  	'index'	 )->name('media.index');
	Route::post('store',		'store'	 )->name('media.store');
	Route::delete('delete/{id}','destroy')->name('media.destroy');
});

/*
|--------------------------------------------------------------------------
| Menu Routes
|--------------------------------------------------------------------------
| All route related to menu module
*/
Route::resource('menus', MenuController::class);

/*
|--------------------------------------------------------------------------
| Career Routes
|--------------------------------------------------------------------------
| All route related to career module
*/
Route::resource('careers', CareerController::class);

/*
|--------------------------------------------------------------------------
| Job Application Routes
|--------------------------------------------------------------------------
| All route related to application module
*/
Route::controller(JobApplicationController::class)->prefix('applications')->group(function () {
	Route::get('index',		  	'index'	 )->name('applications.index');
	Route::get('show/{id}',		'show'	 )->name('applications.show');
	Route::delete('delete/{id}','destroy')->name('applications.destroy');
});

/*
|--------------------------------------------------------------------------
| String Routes
|--------------------------------------------------------------------------
| All route related to strings managment module
*/
Route::resource('dynamic-strings', DynamicStringController::class);
Route::controller(DynamicStringController::class)->prefix('string')->group(function () {
	Route::post('check_key',	'checkKey')->name('string.check_key');
	Route::get('language/{id}',	'addLanguage')->name('string.add');
});

/*
|--------------------------------------------------------------------------
| Tools Routes
|--------------------------------------------------------------------------
| All route related to tool module
*/
Route::resource('tools', ToolController::class);

/*
|--------------------------------------------------------------------------
| API Tokens Routes
|--------------------------------------------------------------------------
| All route related to api tokens
*/
Route::resource('api-tokens', ApiTokenController::class);

/*
|--------------------------------------------------------------------------
| Pages Routes
|--------------------------------------------------------------------------
| All route related to page managment module
*/
Route::controller(PageController::class)->prefix('pages')->group(function(){
	/*
	|--------------------------------------------------------------------------
	| Home Pages Routes
	|--------------------------------------------------------------------------
	*/
	Route::group(['prefix' => 'home'], function (){
    	Route::get('index',		'index_home' )->name('pages.home.index' );
    	Route::get('create',	'create_home')->name('pages.home.create');
    	Route::get('edit/{id}',	'edit_home'  )->name('pages.home.edit'  );
    });

    /*
	|--------------------------------------------------------------------------
	| Tool Pages Routes
	|--------------------------------------------------------------------------
	*/
    Route::group(['prefix' => 'tool'], function (){
    	Route::get('index',		'index_tool' )->name('pages.tool.index' );
    	Route::get('create',	'create_tool')->name('pages.tool.create');
    	Route::get('edit/{id}',	'edit_tool'  )->name('pages.tool.edit'  );
    });

    /*
	|--------------------------------------------------------------------------
	| Blog Pages Routes
	|--------------------------------------------------------------------------
	*/
    Route::group(['prefix' => 'blog'], function (){
    	Route::get('index',		'index_blog' )->name('pages.blog.index' );
    	Route::get('create',	'create_blog')->name('pages.blog.create');
    	Route::get('edit/{id}',	'edit_blog'  )->name('pages.blog.edit'  );
    });

    /*
	|--------------------------------------------------------------------------
	| Problem Pages Routes
	|--------------------------------------------------------------------------
	*/
    Route::group(['prefix' => 'problem'], function (){
    	Route::get('index',		'index_problem' )->name('pages.problem.index' );
    	Route::get('create',	'create_problem')->name('pages.problem.create');
    	Route::get('edit/{id}',	'edit_problem'  )->name('pages.problem.edit'  );
    });

    /*
	|--------------------------------------------------------------------------
	| Category Pages Routes
	|--------------------------------------------------------------------------
	*/
    Route::group(['prefix' => 'category'], function (){
    	Route::get('index',		'index_category' )->name('pages.category.index' );
    	Route::get('create',	'create_category')->name('pages.category.create');
    	Route::get('edit/{id}',	'edit_category'  )->name('pages.category.edit'  );
    });

    /*
	|--------------------------------------------------------------------------
	| Category Pages Routes
	|--------------------------------------------------------------------------
	*/
    Route::group(['prefix' => 'career'], function (){
    	Route::get('index',		'index_career' )->name('pages.career.index' );
    	Route::get('create',	'create_career')->name('pages.career.create');
    	Route::get('edit/{id}',	'edit_career'  )->name('pages.career.edit'  );
    });

    /*
	|--------------------------------------------------------------------------
	| Contact Us Pages Routes
	|--------------------------------------------------------------------------
	*/
    Route::group(['prefix' => 'contact_us'], function (){
    	Route::get('index',		'index_contact_us' )->name('pages.contact_us.index' );
    	Route::get('create',	'create_contact_us')->name('pages.contact_us.create');
    	Route::get('edit/{id}',	'edit_contact_us'  )->name('pages.contact_us.edit'  );
    });

    /*
	|--------------------------------------------------------------------------
	| Simple Pages Routes
	|--------------------------------------------------------------------------
	*/
    Route::group(['prefix' => 'simple'], function (){
    	Route::get('index',		'index_simple' )->name('pages.simple.index' );
    	Route::get('create',	'create_simple')->name('pages.simple.create');
    	Route::get('edit/{id}',	'edit_simple'  )->name('pages.simple.edit'  );
    });

    /*
	|--------------------------------------------------------------------------
	| General Page Routes
	|--------------------------------------------------------------------------
	*/
    Route::post('store', 			'store'		)->name('pages.store'		);
    Route::patch('update/{page}', 	'update'	)->name('pages.update'		);
    Route::delete('delete/{id}', 	'destroy'	)->name('pages.destroy'		);
    Route::post('check_slug',	 	'checkSlug'	)->name('pages.check_slug'	);
    Route::patch('publish/{page}',	'publish'	)->name('pages.publish'		);
    Route::patch('unpublish/{page}','unpublish'	)->name('pages.unpublish'	);
});

/*
|--------------------------------------------------------------------------
| Feedback Routes
|--------------------------------------------------------------------------
| All route related to feedback managment module
*/
Route::resource('feedbacks', FeedbackController::class);

/*
|--------------------------------------------------------------------------
| NewsLatters Routes
|--------------------------------------------------------------------------
| All route related to Newsletter managment module
*/
Route::resource('newsletters', NewsletterController::class);

/*
|--------------------------------------------------------------------------
| Comment Routes
|--------------------------------------------------------------------------
| All route related to comments managment module
*/
Route::controller(CommentController::class)->prefix('comments')->group(function () {
	Route::get('index', 		  	'index'  )->name('comments.index');
	Route::get('show/{id}', 	  	'show'   )->name('comments.show');
	Route::post('store', 	  	    'store'  )->name('comments.store');
	Route::patch('update/{comment}','update' )->name('comments.update');
	Route::delete('destroy/{id}', 	'destroy')->name('comments.destroy');
});

/*
|--------------------------------------------------------------------------
| Audit Routes
|--------------------------------------------------------------------------
| All route related to audit managment module
*/
Route::controller(AuditController::class)->prefix('audits')->group(function () {
	Route::get('index', 		 'index')->name('audit.index');
	Route::get('show/{id}', 	 'show')->name('audit.show');
	Route::delete('destroy/{id}','destroy')->name('audit.destroy');
});

/*
|--------------------------------------------------------------------------
| Questionner Routes
|--------------------------------------------------------------------------
| All route related to questionner managment module
*/
Route::group(['prefix' => 'questionner'], function (){
	Route::resource('topics', 	TopicController::class 		)->names('topics');
	Route::resource('quizzes', 	QuizController::class 		)->names('quizzes');
	Route::resource('questions', QuestionController::class 	)->names('questions');
});

/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
| All route related to overall settings of website
*/
Route::controller(SettingController::class)->prefix('settings')->group(function () {
	Route::get('index', 	'index'	)->name('settings.index');
	Route::post('save', 	'save'	)->name('settings.save');
});

/*
|--------------------------------------------------------------------------
| Error Log Route
|--------------------------------------------------------------------------
*/
Route::get('logs', 
	[\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']
)->name('logs');
