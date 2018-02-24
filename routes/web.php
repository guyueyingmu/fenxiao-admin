<?php
//登录
$this->get('login', 'AuthController@showLoginForm')->name("login");
$this->post('login', 'AuthController@doLogin');

//后台管理
Route::group(['middleware' => ['auth'], 'as'=>"admin."], function(){
    $this->get('logout', 'AuthController@logout');
    //首页
    Route::get('/', ['as'=>'dashboard', 'uses'=>'HomeController@dashboard']);

    /*
     * ========================
     *  用户管理
     * ========================
     */
    //用户管理
    Route::get('/user', ['as'=>'user', 'uses'=>"UserController@show"]);
    //用户列表
    Route::get('/user/list', "UserController@getList");
    //用户详情
    Route::get('/user/detail', "UserController@detail");
    //保存用户信息
    Route::post('/user/save', "UserController@save");
    //用户关系
    Route::get('/user/tree', "UserController@tree");




    /*
     * ========================
     *  订单管理
     * ========================
     */
    //订单管理
    Route::get('/order', ['as'=>'orderlist', 'uses'=>"AlimamaOrderController@show"]);
    //订单列表
    Route::get('/order/list', ['as'=>'orderlist.list', 'uses'=>"AlimamaOrderController@getList"]);
    //订单详情
    Route::get('/order/detail',"AlimamaOrderController@detail");


    /*
     * ========================
     *  PID管理
     * ========================
     */
    //PID管理
    Route::get('/pid', ['as'=>'pid', 'uses'=>"PidController@show"]);
    //PID列表
    Route::get('/pid/list', ['as'=>'pid.list', 'uses'=>"PidController@getList"]);

    /*
     * ========================
     *  意见反馈
     * ========================
     */
    //意见反馈管理
    Route::get('/feedback', ['as'=>'feedback', 'uses'=>"FeedbackController@show"]);
    //意见反馈列表
    Route::get('/feedback/list', ['as'=>'feedback.list', 'uses'=>"FeedbackController@getList"]);


    /*
     * ========================
     *  系统授权管理
     * ========================
     */
    //系统授权管理
    Route::get('/taobaotoken', ['as'=>'taobaotoken', 'uses'=>"TaobaoTokenController@show"]);
    //系统授权列表
    Route::get('/taobaotoken/list', ['as'=>'taobaotoken.list', 'uses'=>"TaobaoTokenController@getList"]);
    //刷新授权
    Route::post('/taobaotoken/refresh', ['as'=>'taobaotoken.refresh', 'uses'=>"TaobaoTokenController@refreshToken"]);

    /*
     * ========================
     *  banner管理
     * ========================
     */
    //banner管理
    Route::get('/banner', ['as'=>'banner', 'uses'=>"BannerController@show"]);
    //banner列表
    Route::get('/banner/list', ['as'=>'banner.list', 'uses'=>"BannerController@getList"]);
    //banner保存
    Route::post('/banner/save', ['as'=>'banner.save', 'uses'=>"BannerController@save"]);
    //banner删除
    Route::post('/banner/del', ['as'=>'banner.del', 'uses'=>"BannerController@del"]);


    /*
     * ========================
     *  账单管理
     * ========================
     */
    //账单管理
    Route::get('/user_bill', ['as'=>'user_bill', 'uses'=>"UserBillController@show"]);
    //账单列表
    Route::get('/user_bill/list', ['as'=>'user_bill.list', 'uses'=>"UserBillController@getList"]);

    /*
     * ========================
     *  系统配置
     * ========================
     */
    //系统配置
    Route::get('/system_config', ['as'=>'system_config', 'uses'=>"SystemConfigController@show"]);
    //保存系统配置
    Route::post('/system_config/save', "SystemConfigController@saveConfig");

    /*
     * ========================
     *  域名管理
     * ========================
     */
    //域名管理
    Route::get('/wechat_domain', ['as'=>'wechat_domain', 'uses'=>"WechatDomainController@show"]);
    //域名列表
    Route::get('/wechat_domain/list', ['as'=>'wechat_domain.list', 'uses'=>"WechatDomainController@getList"]);
    //域名保存
    Route::post('/wechat_domain/save', ['as'=>'wechat_domain.save', 'uses'=>"WechatDomainController@save"]);
    //域名删除
    Route::post('/wechat_domain/del', ['as'=>'wechat_domain.del', 'uses'=>"WechatDomainController@del"]);


    /*
     * ========================
     *  其他
     * ========================
     */
    //文件上传
    Route::post("/file/upload", ['as'=>'upload', 'uses'=>'FileController@upload']);




    //页面管理
    Route::get('/page', ['as'=>'page', 'uses'=>"PageController@index"]);

    Route::get('/page/agreement', ['as'=>'agreement.get', 'uses'=>"PageController@getAgreement"]);
    Route::get('/page/list', ['as'=>'page.list', 'uses'=>"PageController@getList"]);
    Route::get('/page/edit', ['as'=>'page.edit', 'uses'=>"PageController@edit"]);
    Route::post('/page/save', ['as'=>'page.save', 'uses'=>"PageController@save"]);
    Route::post('/page/del', ['as'=>'page.del', 'uses'=>"PageController@del"]);

    //编辑器文件上传
    Route::post("/file/umeditorUpload", ['as'=>'umeditorUpload', 'uses'=>'FileController@umeditorUpload']);

    //标签管理
    Route::get('/tag', ['as'=>'tag', 'uses'=>"TagController@show"]);
    Route::get('/tag/list', ['as'=>'tag.list', 'uses'=>"TagController@getList"]);
    Route::post('/tag/save', ['as'=>'tag.save', 'uses'=>"TagController@save"]);
    Route::post('/tag/del', ['as'=>'tag.del', 'uses'=>"TagController@del"]);
    Route::post('/tag/allTagPic', ['as'=>'tag.allTagPic', 'uses'=>"TagController@saveAllTagPic"]);


    //产品管理
    Route::get('/production', ['as'=>'production', 'uses'=>"ProductionController@show"]);
    Route::get('/production/list', ['as'=>'production.list', 'uses'=>"ProductionController@getList"]);
    Route::get('/production/edit', ['as'=>'production.edit', 'uses'=>"ProductionController@edit"]);
    Route::post('/production/save', ['as'=>'production.save', 'uses'=>"ProductionController@save"]);
    Route::post('/production/del', ['as'=>'production.del', 'uses'=>"ProductionController@del"]);
    Route::get('/production/getPrice', ['as'=>'production.getPrice', 'uses'=>"ProductionController@getPrice"]);
    Route::get('/production/getPriceInfo', ['as'=>'production.getPriceInfo', 'uses'=>"ProductionController@getPriceInfo"]);
    Route::post('/production/savePriceInfo', ['as'=>'production.savePriceInfo', 'uses'=>"ProductionController@savePriceInfo"]);
    Route::post('/production/delPriceInfo', ['as'=>'production.delPriceInfo', 'uses'=>"ProductionController@delPriceInfo"]);


    //户外文化管理
    Route::get('/article', ['as'=>'article', 'uses'=>"ArticleController@index"]);
    Route::get('/article/list', ['as'=>'article.list', 'uses'=>"ArticleController@getList"]);
    Route::get('/article/edit', ['as'=>'article.edit', 'uses'=>"ArticleController@edit"]);
    Route::post('/article/save', ['as'=>'article.save', 'uses'=>"ArticleController@save"]);
    Route::post('/article/del', ['as'=>'article.del', 'uses'=>"ArticleController@del"]);
    //户外文化主题管理
    Route::get('/articleCategory', ['as'=>'articleCategory', 'uses'=>"ArticleCategoryController@show"]);
    Route::get('/articleCategory/list', ['as'=>'articleCategory.list', 'uses'=>"ArticleCategoryController@getList"]);
    Route::post('/articleCategory/save', ['as'=>'articleCategory.save', 'uses'=>"ArticleCategoryController@save"]);
    Route::post('/articleCategory/del', ['as'=>'articleCategory.del', 'uses'=>"ArticleCategoryController@del"]);


    //菜单管理
    Route::get('/menu/{menu_name}', ['as'=>'menu', 'uses'=>"MenuController@edit"]);
    Route::post('/menu/save', ['as'=>'menu.save', 'uses'=>"MenuController@save"]);
    Route::post('/menu/saveAboutPageLink', ['as'=>'menu.saveAboutPageLink', 'uses'=>"MenuController@saveAboutPageLink"]);

    //修改密码
    Route::get('/system/updatepwd', ['as'=>'system.updatepwd', 'uses'=>"SystemController@updatepwd"]);
    Route::post('/system/updatepwd', ['as'=>'system.updatepwd', 'uses'=>"SystemController@updatepwdSave"]);

});
