<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入模型类
use App\Admin\Goods;
use App\Admin\Type;
use DB;
// 表单校验
// use

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取搜索字符
        $k = $request->input('keywords');
        //展示全部商品
        $data = Goods::where('gname','like','%',$k,'%')->paginate(5);
        // dd($data);
        return view('Admin.Goods.goodsList',['data'=>$data,'request'=>$request->all()]);
    }

    
         //调整类别顺序 加分割符
    public static function getCates(){
        $cate=DB::table("home_type")->select(DB::raw('*,concat(path,id)as paths'))->orderBy('paths')->get();
        //添加分隔符
        foreach($cate as $key=>$value){
            //获取path
            $path=$value->path;
            // echo $path."<br>";
            //转换为数组
            $arr=explode(",",$path);
            //获取逗号个数
            $len=count($arr)-1;
            //加分隔符 str_repeat 重复字符串函数
            $cate[$key]->name=str_repeat("--|",$len).$value->name;
        }

        return $cate;
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $cate=self::getCates();
        //加载分类添加页面
        return view('Admin.Goods.goodsAdd',['type'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('POST')){
            // 判断是否有文件上传
            if($request->hasFile('gpic')){
            //初始化名字
            $n=time()+rand(1,10000);
            //获取上传文件后缀
            $ext = $request->file('gpic')->getClientOriginalExtension();
            $name = $n.".".$ext;
            $data['gpic'] = $name;
            // dd($ext);
            // 移动文件
            $request->file('gpic')->move('./uploads',$name);
            }
        }
        $data = $request->except('_token');
        $data['display'] = 0;
        $data['salenum'] = 0;
        // dd($data);
        if(Goods::create($data)){
            return redirect('/goodsList')->with('success','添加成功');
        }else{
            return redirect('/goodsList/create')->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取原内容
        $info = Goods::find($id);
        $cate = self::getCates();
        // dd($info);
        return view('Admin.Goods.goodsEdit',['info'=>$info,'type'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token','_method');
        $data['display'] = 0;
        $data['gpic'] = $data['ogpic'];
        unset($data['ogpic']);
        // 判断是否有文件上传
        if($request->hasFile('gpic')){
        //初始化名字
        $n=time()+rand(1,10000);
        //获取上传文件后缀
        $ext = $request->file('gpic')->getClientOriginalExtension();
        $name = $n.".".$ext;
        $data['gpic'] = $name;
        // dd($ext);
        // 移动文件
        $request->file('gpic')->move('./uploads',$name);
        }
        // dd($data);
        if(Goods::where('id','=',$id)->update($data)){
            return redirect('/goodsList')->with('success','修改成功');
        }else{
            return redirect('/goodsList/create')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
