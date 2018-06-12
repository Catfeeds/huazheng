<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article,App\Models\ArticleCategory;

class HomeController extends Controller
{
    // Illuminate\Validation\Concerns\ValidatesAttributes//验证规则文件
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        
        parent::__construct();
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // sitemap();
        // $index_1 = ArticleCategory::orderBy('order',"ASC")->where('parent_id',6)->get();//获取一级分类
        // foreach($index_1 as $k=>$v){
        //     $v['article'] = Article::ArticleList([
        //         'cate_id'=>$v['id'],
        //         'order'=>'is_top',
        //         'sort'=>'DESC',
        //         'paginate'=>7,
        //     ]);
        // }
        // $index_1_cate = ArticleCategory::find(6);

        // $index_2 = ArticleCategory::orderBy('order',"ASC")->where('parent_id',8)->get();//获取一级分类
        // foreach($index_2 as $k=>$v){
        //     $v['article'] = Article::ArticleList([
        //         'cate_id'=>$v['id'],
        //         'order'=>'is_top',
        //         'sort'=>'DESC',
        //         'paginate'=>9,
        //     ]);
        // }
        // $index_2_cate = ArticleCategory::find(6);

        // $index_3 = Article::ArticleList([
        //     'cate_id'=>63,
        //     'order'=>'is_top',
        //     'sort'=>'DESC',
        //     'take'=>18,
        // ]);
        // $index_3_cate = ArticleCategory::find(63);

        // $index_4 = Article::ArticleList([
        //     'cate_id'=>22,
        //     'order'=>'is_top',
        //     'sort'=>'DESC',
        //     'take'=>9,
        // ]);
        // $index_4_cate = ArticleCategory::find(22);


        // $index_5_cate = ArticleCategory::find(64);
        // $index_6_cate = ArticleCategory::find(65);

        // $index_7 = Article::ArticleList([
        //     'cate_id'=>7,
        //     'order'=>'is_top',
        //     'sort'=>'DESC',
        //     'take'=>9,
        // ]);
        // $index_7_cate = ArticleCategory::find(7);

        // $index_8 = Article::ArticleList([
        //     'cate_id'=>27,
        //     'order'=>'is_top',
        //     'sort'=>'DESC',
        //     'take'=>9,
        // ]);
        // $index_8_cate = ArticleCategory::find(27);
        // $index_9 = Article::ArticleList([
        //     'cate_id'=>42,
        //     'order'=>'is_top',
        //     'sort'=>'DESC',
        //     'take'=>9,
        // ]);
        // $index_9_cate = ArticleCategory::find(42);
        $index_1 = Article::ArticleList([
            'cate_id'=>356,
            'order'=>'is_top',
            'sort'=>'DESC',
            'take'=>4,
        ]);
        $index_1_cate = ArticleCategory::find(356);

        $index_2 = Article::ArticleList([
            'cate_id'=>357,
            'order'=>'is_top',
            'sort'=>'DESC',
            'take'=>5,
        ]);
        $index_2_cate = ArticleCategory::find(357);

        $index_3 = Article::ArticleList([
            'cate_id'=>358,
            'order'=>'is_top',
            'sort'=>'DESC',
            'take'=>8,
        ]);
        $index_3_cate = ArticleCategory::find(358);

        $index_4_cate = ArticleCategory::find(359);

        $index_5_cate = ArticleCategory::find(353);
        $index_5 = Article::ArticleList([
            'cate_id'=>353,
            'order'=>'is_top',
            'sort'=>'DESC',
            'take'=>8,
        ]);
        $index_6_cate = ArticleCategory::find(354);
        $index_6 = Article::ArticleList([
            'cate_id'=>354,
            'order'=>'is_top',
            'sort'=>'DESC',
            'take'=>8,
        ]);

        // $index_7 = ArticleCategory::orderBy('order',"ASC")->where('parent_id',342)->get();//获取一级分类
        // foreach($index_7 as $k=>$v){
        //     $v['article'] = Article::ArticleList([
        //         'cate_id'=>$v['id'],
        //         'order'=>'is_top',
        //         'sort'=>'DESC',
        //         'paginate'=>8,
        //     ]);
        // }
        $index_7 = Article::ArticleList([
            'cate_id_in'=>sub_cate_in(342),
            'order'=>'is_top',
            'sort'=>'DESC',
            'paginate'=>8,
        ]);
        $index_7_cate = ArticleCategory::find(342);
        
        $banner = ads_image(12);
        $assign = [
            'banner'       => $banner,
            'index_1'      => $index_1,
            'index_1_cate' => $index_1_cate,
            'index_2'      => $index_2,
            'index_2_cate' => $index_2_cate,
            'index_3'      => $index_3,
            'index_3_cate' => $index_3_cate,
            'index_4_cate' => $index_4_cate,
            'index_5_cate' => $index_5_cate,
            'index_5'      => $index_5,
            'index_6_cate' => $index_6_cate,
            'index_6'      => $index_6,
            'index_7_cate' => $index_7_cate,
            'index_7'      => $index_7,
            
            'nav_index'=>true,
        ];
        return view('home.home',$assign);
    }
}
