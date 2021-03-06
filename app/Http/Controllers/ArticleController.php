<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
// use Illuminate\Routing\Router;
use App\Models\ArticleCategory,App\Models\Article,App\Models\AdsPosition,App\Models\AdsImage,App\Models\Region;
class ArticleController extends Controller
{
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
     * 文章分类
     *
     * @return \Illuminate\Http\Response
     */
    public function article_category(Request $request){
        $url = Route::currentRouteName();
        $cate_info = ArticleCategory::with(['MoreImageMany'])->where('url',$url)->first();
        // $cate_info = ArticleCategory::with(['MoreImageMany'])->where('id',$cate_id)->first();
        if (!$cate_info||empty($cate_info['template'])) {
            abort(404);
        }
        $top_category = top_category($cate_info,ArticleCategory::class,'parent_id');//获取顶级分类
        $sub_category = ArticleCategory::orderBy('order',"ASC")->where('parent_id',$top_category['id'])->get();//获取一级分类
        // $province = Region::regionList([
        //     'paginate'=>0,
        //     'region_type'=>1,
        // ]);
        // $class = ArticleCategory::orderBy('order',"ASC")->where('parent_id',46)->get();//获取意向班级
        $location = [
            0=>[
                'url'=>'',
                'title'=>$cate_info['title'],
                // 'en_title'=>$cate_info['en_title'],
            ],
        ];
        //获取萌货新闻推荐
        $new_recommend_list = Article::ArticleList([
            'cate_id_in'=>sub_cate_in(40),
            'order'=>'is_top',
            'sort'=>'DESC',
            'take'=>12,
        ]);
        $assign = [
            'url'              =>$url,
            // 'url'              => [
            //     "list-".$top_category['id']."-1.html",
            //     "list-".$cate_info['id']."-1.html",
            // ],
            // 'class'            =>$class,
            // 'province'         =>$province,
            'new_recommend_list' => $new_recommend_list,
            'top_category'       => $top_category,
            'sub_category'       => $sub_category,
            'cate_info'          => $cate_info,
            'head_title'         => !empty($cate_info['seo_title'])?$cate_info['seo_title']:$cate_info['title'],
            'head_keywords'      => !empty($cate_info['seo_keywords'])?$cate_info['seo_keywords']:$cate_info['title'],
            'head_description'   => !empty($cate_info['seo_description'])?$cate_info['seo_description']:$cate_info['title'],
            'location'           => $location,
        ];
        // $AdsPosition = AdsPosition::where('title',$cate_info['title'])->first();//获取广告位
        // if($AdsPosition){
        //     $AdsImage = AdsImage::AdsImageList([
        //         'cate_id'=>$AdsPosition['id'],
        //         'paginate'=>0,
        //     ]);
        //     $assign['AdsImage'] = $AdsImage;
        // }

        //根据模板获取相应数据
        // $recommend_cate = $cate_info['id'];
        // $take = 20;
        // switch ($cate_info['template']) {
        //     case 'news':
        //         $recommend_cate = $cate_info['id'];
        //         $take = 20;
        //         break;
        // }
        switch ($cate_info['template']) {
            case 'index2'://普通主页
                $cate_list = ArticleCategory::orderBy('order',"ASC")->where('parent_id',$cate_info['id'])->get();//获取一级分类
                foreach($cate_list as $k=>$v){
                    $v['article'] = Article::ArticleList([
                        'cate_id'=>$v['id'],
                        'paginate'=>0,
                    ]);
                }
                $assign['cate_list'] = $cate_list;

                //获取通用
                $universal_cate_list = ArticleCategory::orderBy('order',"ASC")->where('parent_id',318)->get();//获取一级分类
                foreach($universal_cate_list as $k=>$v){
                    $v['article'] = Article::ArticleList([
                        'cate_id'=>$v['id'],
                        'paginate'=>0,
                    ]);
                }
                $assign['universal_cate_list'] = $universal_cate_list;
                break;
            case 'love3':
                $cate_list = ArticleCategory::orderBy('order',"ASC")->where('parent_id',$cate_info['id'])->get();//获取一级分类
                foreach($cate_list as $k=>$v){
                    $v['article'] = Article::ArticleList([
                        'cate_id'=>$v['id'],
                        'paginate'=>0,
                    ]);
                }
                $assign['cate_list'] = $cate_list;
                break;
            case 'news'://动态
                //获取列表数据
                $article_list = Article::ArticleList([
                    'cate_id_in'=>sub_cate_in($cate_info['id']),
                    'paginate'=>8,
                ]);
                $assign['article_list'] = $article_list;
                if($request->ajax()){
                    $html = view('home.article.news-list',$assign)->render();
                    $return = array(
                        'html' => $html,
                        'isLastPage' => false,
                        'sub_category_slug'  => '',
                    );
                    return response()->json($return);
                }
                // sub_category_slug
                // isLastPage
                // html
                break;
            case 'video'://视频
                $cate_list = ArticleCategory::orderBy('order',"ASC")->where('parent_id',$cate_info['id'])->get();//获取一级分类
                foreach($cate_list as $k=>$v){
                    $v['article'] = Article::ArticleList([
                        'cate_id'=>$v['id'],
                        'paginate'=>0,
                    ]);
                }
                $assign['cate_list'] = $cate_list;
                break;
            case 'master'://导师中心
                $cate_list = ArticleCategory::orderBy('order',"ASC")->where('parent_id',$cate_info['id'])->get();//获取一级分类
                foreach($cate_list as $k=>$v){
                    $v['article'] = Article::ArticleList([
                        'cate_id'=>$v['id'],
                        'paginate'=>0,
                    ]);
                }
                $assign['cate_list'] = $cate_list;
                break;
            case 'introduce'://介绍
                $cate_list = ArticleCategory::with(['MoreImageMany'])->orderBy('order',"ASC")->where('parent_id',$cate_info['id'])->get();//获取一级分类
                $assign['cate_list'] = $cate_list;
                $daoshi = Article::ArticleList([
                    'cate_id'=>'353',
                    'order'=>'is_top',
                    'sort'=>'DESC',
                    'take'=>8,
                ]);
                $daoshi_cate = ArticleCategory::find('353');
                $assign['daoshi'] = $daoshi;
                $assign['daoshi_cate'] = $daoshi_cate;
                break;
            // case 'course'://全部课程
            //     foreach($sub_category as $k=>$v){
            //         $v['article'] = Article::ArticleList([
            //             'cate_id'=>$v['id'],
            //             'sort'=>'DESC',
            //             'paginate'=>0,
            //         ]);
            //     }
            //     $assign['sub_category'] = $sub_category;
            //     break;
            // case 'contact-us'://萌货故事
            // case 'single-detail'://萌货故事
            //     $cate_list = ArticleCategory::orderBy('order',"ASC")->where('parent_id',$cate_info['id'])->get();//获取一级分类
            //     foreach($cate_list as $k=>$v){
            //         $v['article'] = Article::ArticleList([
            //             'cate_id'=>$v['id'],
            //             'sort'=>'DESC',
            //             'paginate'=>0,
            //         ]);
            //     }
            //     $assign['cate_list'] = $cate_list;
            //     $assign['banner'] = ads_image_name($top_category['title']);
            //     break;
            // case 'news'://新闻列表
            // case 'school'://新闻列表
            // case 'works'://作品
            // case 'cases'://案例
            // case 'teacher'://师资
            //     //获取列表数据
            //     $article_list = Article::ArticleList([
            //         'cate_id'=>$cate_info['id'],
            //         'paginate'=>12,
            //     ]);
            //     $assign['article_list'] = $article_list;
            //     //获取推荐
            //     $article_recommend_list = Article::ArticleList([
            //         'cate_id'=>$recommend_cate,
            //         'order'=>'is_top',
            //         'sort'=>'DESC',
            //         'take'=>$take,
            //     ]);
            //     $assign['article_recommend_list'] = $article_recommend_list;
            //     $assign['banner'] = ads_image_name($top_category['title']);
            //     break;
            // case 'single-detail'://单页
            //     //获取全部列表数据
            //     $article_list = Article::ArticleList([
            //         'cate_id'=>$cate_info['id'],
            //         'paginate'=>0,
            //     ]);
            //     $assign['article_list'] = $article_list;
            //     break;
        }
        if(isMobile()){
            return view('mobile.article.'.$cate_info['template'],$assign);
        }else{
            return view('home.article.'.$cate_info['template'],$assign);
        }
    }
    /**
     * 文章详情
     */
    public function article_info(Request $request,$id){
        Article::where("id",$id)->increment('click',1);
        $info = Article::with(['ArticleCategoryTo','MoreImageMany','MoreVideoMany'])->find($id);
        if (!$info) {
            abort(404);
        }
        $cate_info = $info['ArticleCategoryTo'];
        if (!$cate_info||empty($cate_info['template'])) {
            abort(404);
        }
        $top_category = top_category($cate_info,ArticleCategory::class,'parent_id');//获取顶级分类
        $sub_category = ArticleCategory::orderBy('order',"ASC")->where('parent_id',$top_category['id'])->get();//获取一级分类
        $location = [
            0=>[
                'url'=>url($cate_info['url']),
                'title'=>$cate_info['title'],
                // 'en_title'=>$cate_info['en_title'],
            ],
            1=>[
                'title'=>$info['title'],
            ]
        ];
        // $url = $cate_info['url'];
        
        //获取新闻推荐
        // $new_recommend_list = Article::ArticleList([
        //     'cate_id_in'=>sub_cate_in(40),
        //     'order'=>'is_top',
        //     'sort'=>'DESC',
        //     'take'=>12,
        // ]);
        $assign = [
            // 'url'                => [
            //     "list-".$top_category['id']."-1.html",
            //     "list-".$cate_info['id']."-1.html",
            // ],
            // 'new_recommend_list' =>$new_recommend_list,
            'top_category'       =>$top_category,
            'sub_category'       =>$sub_category,
            'cate_info'          =>$cate_info,
            'head_title'         => !empty($info['seo_title'])?$info['seo_title']:$info['title'],
            'head_keywords'      => !empty($info['seo_keywords'])?$info['seo_keywords']:$info['title'],
            'head_description'   => !empty($info['seo_description'])?$info['seo_description']:$info['title'],
            'location'           =>$location,
            'info'               =>$info,
        ];
        //根据模板获取相应数据
        // $recommend_cate = 7;
        // $take = 8;
        // switch ($cate_info['template']) {
        //     case 'personnel':
        //     case 'news':
        //         $recommend_cate = $cate_info['id'];
        //         $take = 6;
        //         break;
        // }
        
        switch ($cate_info['template']) {
            case 'guimi-group':
            case 'master-group':
                $location = [
                    0=>[
                        'url'=>url($top_category['url']),
                        'title'=>$top_category['title'],
                        // 'en_title'=>$cate_info['en_title'],
                    ],
                    1=>[
                        'title'=>$info['title'],
                    ]
                ];
                $assign['location'] = $location;
                break;
        }
        switch ($cate_info['template']) {
            case 'news'://新闻列表
            case 'guimi-group'://新闻列表
            // case 'cases'://案例
            // case 'teacher'://师资
                //获取列表
                $article_recommend_list = Article::ArticleList([
                    'cate_id'=>$cate_info['id'],
                    'order'=>'is_top',
                    'sort'=>'DESC',
                    'take'=>6,
                    'no_id'=>$info['id'],
                ]);
                $assign['article_recommend_list'] = $article_recommend_list;

                //获取上下篇
                $article_all = Article::select('id')->where('cate_id',$info['cate_id'])->orderBy("add_time","DESC")->orderBy("id","DESC")->get();
                $prev_id = 0;
                $next_id = 0;
                foreach($article_all as $k=>$v){
                    if($v['id']==$info['id']){
                        $prev_id = $article_all[$k+1]['id'];
                        $next_id = $article_all[$k-1]['id'];
                        break;
                    }
                }
                $prev_article = Article::find($prev_id);
                $assign['prev_article'] = $prev_article;
                $next_article = Article::find($next_id);
                $assign['next_article'] = $next_article;

                //获取右侧推荐
                $cat_1 = ArticleCategory::find('347');
                $art_1 = Article::ArticleList([
                    'cate_id'=>'347',
                    'order'=>'is_top',
                    'sort'=>'DESC',
                    'take'=>8,
                ]);
                $assign['cat_1'] = $cat_1;
                $assign['art_1'] = $art_1;
                $cat_2 = ArticleCategory::find('348');
                $art_2 = Article::ArticleList([
                    'cate_id'=>'348',
                    'order'=>'is_top',
                    'sort'=>'DESC',
                    'take'=>8,
                ]);
                $assign['cat_2'] = $cat_2;
                $assign['art_2'] = $art_2;
                $cat_3 = ArticleCategory::find('349');
                $art_3 = Article::ArticleList([
                    'cate_id'=>'349',
                    'order'=>'is_top',
                    'sort'=>'DESC',
                    'take'=>8,
                ]);
                $assign['cat_3'] = $cat_3;
                $assign['art_3'] = $art_3;
                $cat_4 = ArticleCategory::find('353');
                $art_4 = Article::ArticleList([
                    'cate_id'=>'353',
                    'order'=>'is_top',
                    'sort'=>'DESC',
                    'take'=>8,
                ]);
                $assign['cat_4'] = $cat_4;
                $assign['art_4'] = $art_4;
                break;
        }
        if(isMobile()){
            return view('mobile.article.'.$cate_info['template']."-info",$assign);
        }else{
            return view('home.article.'.$cate_info['template']."-info",$assign);
        }
    }

    public function contact_us(Request $request){
        $location = [
            0=>[
                'url'=>'',
                'title'=>"联系我们",
                // 'en_title'=>$cate_info['en_title'],
            ],
        ];
        $assign = [
            'location' => $location,
        ];
        return view('home.article.contact-us',$assign);
    }
}
