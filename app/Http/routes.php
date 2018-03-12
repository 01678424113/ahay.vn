<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', 'Admin\HomeController@index');
        Route::group(['prefix' => 'user', 'middleware' => 'function:user'], function () {
            Route::get('/', 'Admin\UserController@listUser');
            Route::post('/add', 'Admin\UserController@doAddUser');
            Route::get('/load', 'Admin\UserController@loadUser');
            Route::post('/edit', 'Admin\UserController@doEditUser');
            Route::post('/delete', 'Admin\UserController@doDeleteUser');
        });

        Route::group(['prefix' => 'promotion'], function () {
            Route::get('/', 'Admin\PromotionController@listPromotion');
            Route::get('/add', 'Admin\PromotionController@addPromotion');
            Route::post('/add', 'Admin\PromotionController@doAddPromotion');
            Route::get('/edit/{promotion_id}', 'Admin\PromotionController@editPromotion')->where(['promotion_id' => '[0-9]+']);
            Route::post('/edit/{promotion_id}', 'Admin\PromotionController@doEditPromotion')->where(['promotion_id' => '[0-9]+']);
            Route::post('/delete', 'Admin\PromotionController@doDeletePromotion');
        });

        Route::group(['prefix' => 'review'], function () {
            Route::get('/', 'Admin\ReviewController@listReview')->name('listReview');
            Route::get('/add', 'Admin\ReviewController@addReview');
            Route::post('/add', 'Admin\ReviewController@doAddReview');
            Route::get('/edit/{review_id}', 'Admin\ReviewController@editReview')->where(['review_id' => '[0-9]+'])->name('editReview');
            Route::post('/edit/{review_id}', 'Admin\ReviewController@doEditReview')->where(['review_id' => '[0-9]+'])->name('doEditReview');
            Route::post('/delete', 'Admin\ReviewController@doDeleteReview');
        });

        Route::group(['prefix' => 'website'], function () {
            Route::get('/banner-1', 'Admin\WebsiteController@getSettingBanner1')->name('getSettingBanner');
            Route::get('/banner-2', 'Admin\WebsiteController@getSettingBanner2')->name('getSettingBanner');
            Route::get('/banner-3', 'Admin\WebsiteController@getSettingBanner3')->name('getSettingBanner');
            Route::get('/banner-4', 'Admin\WebsiteController@getSettingBanner4')->name('getSettingBanner');
            Route::get('/banner-5', 'Admin\WebsiteController@getSettingBanner5')->name('getSettingBanner');
            Route::get('/banner-6', 'Admin\WebsiteController@getSettingBanner6')->name('getSettingBanner');
            Route::post('/banner', 'Admin\WebsiteController@postSettingBanner')->name('postSettingBanner');
        });

        Route::group(['prefix' => 'comic'], function () {
            Route::get('/', 'Admin\ComicController@listComic');
            Route::get('/add', 'Admin\ComicController@addComic');
            Route::post('/add', 'Admin\ComicController@doAddComic');
            Route::get('/tags-input', 'Admin\ComicController@tagsInput');
            Route::get('/edit/{comic_id}', 'Admin\ComicController@editComic')->where(['comic_id' => '[0-9]+']);
            Route::post('/edit/{comic_id}', 'Admin\ComicController@doEditComic')->where(['comic_id' => '[0-9]+']);
            Route::post('/delete', 'Admin\ComicController@doDeleteComic');
            Route::group(['prefix' => 'story'], function () {
                Route::get('/', 'Admin\StoryController@listStory');
                Route::get('/add', 'Admin\StoryController@addStory');
                Route::post('/add', 'Admin\StoryController@doAddStory');
                Route::get('/edit/{story_id}', 'Admin\StoryController@editStory')->where(['story_id' => '[0-9]+']);
                Route::post('/edit/{story_id}', 'Admin\StoryController@doEditStory')->where(['story_id' => '[0-9]+']);
                Route::post('/delete', 'Admin\StoryController@doDeleteStory');
            });
            Route::group(['prefix' => 'setting-sale-comic'], function () {
                Route::get('/', 'Admin\SettingSaleComicController@listSettingSaleComic');
                Route::post('/add', 'Admin\SettingSaleComicController@doAddSettingSaleComic');
                Route::post('/edit', 'Admin\SettingSaleComicController@doEditSettingSaleComic');
                Route::get('/load', 'Admin\SettingSaleComicController@loadSettingSaleComic');
                Route::post('/delete', 'Admin\SettingSaleComicController@doDeleteSettingSaleComic');
            });
        });

        Route::group(['prefix' => 'article'], function () {
            Route::get('/', 'Admin\ArticleController@listArticle');
            Route::get('/add', 'Admin\ArticleController@addArticle');
            Route::post('/add', 'Admin\ArticleController@doAddArticle');
            Route::get('/tags-input', 'Admin\ArticleController@tagsInput');
            Route::get('/edit/{article_id}', 'Admin\ArticleController@editArticle');
            Route::post('/edit/{article_id}', 'Admin\ArticleController@doEditArticle');
            Route::post('/image-upload', 'Admin\ArticleController@doHandleImage');
            Route::post('/handle-content', 'Admin\ArticleController@doHandleContent');
            Route::post('/delete', 'Admin\ArticleController@doDeleteArticle');
            Route::group(['prefix' => 'category'], function () {
                Route::get('/', 'Admin\ArticleController@listCategory');
                Route::post('/add', 'Admin\ArticleController@doAddCategory');
                Route::get('/load', 'Admin\ArticleController@loadCategory');
                Route::post('/edit', 'Admin\ArticleController@doEditCategory');
                Route::post('/delete', 'Admin\ArticleController@doDeleteCategory');
            });
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'Admin\ProductController@listProduct');
            Route::get('/add', 'Admin\ProductController@addProduct');
            Route::post('/add', 'Admin\ProductController@doAddProduct');
            Route::get('/edit/{product_id}', 'Admin\ProductController@editProduct')->where(['product_id' => '[0-9]+']);
            Route::post('/edit/{product_id}', 'Admin\ProductController@doEditProduct')->where(['product_id' => '[0-9]+']);
            Route::post('/delete', 'Admin\ProductController@doDeleteProduct');
            Route::group(['prefix' => 'category'], function () {
                Route::get('/', 'Admin\ProductController@listCategory');
                Route::post('/add', 'Admin\ProductController@doAddCategory');
                Route::get('/load', 'Admin\ProductController@loadCategory');
                Route::post('/edit', 'Admin\ProductController@doEditCategory');
                Route::post('/delete', 'Admin\ProductController@doDeleteCategory');
            });
        });

        Route::group(['prefix' => 'order'], function () {
            Route::get('/', 'Admin\OrderController@listOrder');
            Route::get('/edit/{order_id}', 'Admin\OrderController@editOrder');
            Route::post('/edit/{order_id}', 'Admin\OrderController@doEditOrder');
            Route::post('/delete', 'Admin\OrderController@doDeleteOrder');
        });

        Route::group(['prefix' => 'permission', 'middleware' => 'function:permission'], function () {
            Route::group(['prefix' => 'group'], function () {
                Route::get('/', 'Admin\PermissionController@listGroup');
                Route::get('/add', 'Admin\PermissionController@addGroup');
                Route::post('/add', 'Admin\PermissionController@doAddGroup');
                Route::get('/edit/{group_id}', 'Admin\PermissionController@editGroup');
                Route::post('/edit/{group_id}', 'Admin\PermissionController@doEditGroup');
                Route::post('/delete', 'Admin\PermissionController@doDeleteGroup');
            });
            Route::group(['prefix' => 'function'], function () {
                Route::get('/', 'Admin\PermissionController@listFunction');
                Route::post('/add', 'Admin\PermissionController@doAddFunction');
                Route::get('/load', 'Admin\PermissionController@loadFunction');
                Route::post('/edit', 'Admin\PermissionController@doEditFunction');
                Route::post('/delete', 'Admin\PermissionController@doDeleteFunction');
            });
        });
        Route::get('/str-slug', 'Admin\HomeController@slug');
        Route::post('/image-upload', 'Admin\HomeController@uploadImage');
    });
    Route::get('/login', 'Admin\AccessController@login');
    Route::post('/login', 'Admin\AccessController@doLogin');
    Route::get('/logout', 'Admin\AccessController@logout');
});

Route::get('/', 'Frontend\HomeController@index');

Route::group(['prefix'=>'gio-hang'],function (){
    Route::get('/', 'Frontend\PageController@cart');
    Route::post('/save-order','Frontend\ActionBuyController@saveOrder');
});

Route::get('/lien-he','Frontend\PageController@contact')->name('contact');


Route::group(['prefix' => 'tin-tuc'], function () {
    Route::get('/search', 'Frontend\ArticleController@searchArticle');
    Route::get('/{type_article}', 'Frontend\ArticleController@listArticles');
    Route::get('/{article_slug}/{article_id}', 'Frontend\ArticleController@detailArticle')->where(['article_slug' => '[a-z0-9\-]+', 'article_id' => "[0-9]+"]);
});
Route::get('/dich-vu', 'Frontend\ArticleController@service');
Route::get('/ho-tro', 'Frontend\ArticleController@support');
Route::get('/hoi-dap', 'Frontend\ArticleController@QandA');

Route::group(['prefix' => 'san-pham'], function () {
    Route::get('/', 'Frontend\ProductController@listProducts');
    Route::get('/{product_slug}-{product_id}', 'Frontend\ProductController@detailProduct')->where(['product_slug' => '[a-z0-9\-]+', 'product_id' => "[0-9]+"]);
    Route::get('/buy-product-now/{product_id}', 'Frontend\ActionBuyController@buyProductNow')->where(['product_id' => "[0-9]+"]);

    //Action product
    Route::get('/fix-quantity-product/{product_sku}/{quantity}', 'Frontend\ActionBuyController@fixQuantityProduct')->where(['product_sku' => '[a-zA-Z0-9\-]+', 'quantity' => "[0-9]+"]);
    Route::get('/ajax-fix-quantity-product/{product_sku}/{quantity}','Frontend\ActionBuyController@ajaxFixQuantityProduct')->where(['product_sku' => '[a-zA-Z0-9\-]+', 'quantity' => "[0-9]+"]);
    Route::post('/delete-to-cart','Frontend\ActionBuyController@deleteProductToCart');

});
Route::group(['prefix' => 'truyen-tranh'], function () {
    Route::get('/', 'Frontend\ComicController@listComics');
    Route::get('/{comic_slug}-{comic_id}', 'Frontend\ComicController@detailComic')->where(['comic_slug' => '[a-z0-9\-]+', 'comic_id' => "[0-9]+"]);
    Route::get('/xem-truoc/{comic_slug}/{comic_id}/{product_sku}', 'Frontend\ComicController@previewComic')->name('previewComic');

    Route::post('/create-comic','Frontend\ComicController@createComic');
    Route::get('/sua-truyen/{comic_slug}/{comic_id}/{product_sku}','Frontend\ComicController@editComic')->name('editComic');
    Route::post('/sua-truyen','Frontend\ComicController@doEditComic')->name('doEditComic');

    Route::get('/ajax-change-story','Frontend\AjaxComicController@changeStory')->name('changeStory');

    Route::post('/buy-more-comic','Frontend\ActionBuyController@buyMoreComic')->name('buyMoreComic');

});









