<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Handlers\UploadHandler;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use Auth;

class TopicsController extends Controller
{
    public function __construct()
    {
        //中间件auth:对除了 index() 和 show() 以外的方法使用 auth 中间件进行认证。
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request, Topic $topic)
	{
        $topics = $topic->withOrder($request->order)
            ->with('user', 'category')  // 预加载防止 N+1 问题
            ->paginate(20);
        return view('topics.index', compact('topics'));
	}

    public function show(Request $request,Topic $topic)
    {
        if ( ! empty($topic->slug) && $topic->slug != $request->slug) {

            return redirect($topic->link(), 301);
        }

        return view('topics.show', compact('topic'));
    }

	public function create(Topic $topic)
	{
	    $categories=Category::all();
		return view('topics.create_ueditor', compact('topic','categories'));
        //return view('topics.create_kindediter', compact('topic','categories'));
	}

	public function store(TopicRequest $request,Topic $topic)
	{
        //dd($request->all());
	    $topic->fill($request->all());


	    $topic->user_id=Auth::id();
	    //$topic->title=$request->title;
        //$topic->category_id=$request->category_id;
	    //$topic->body=$request->body;

        //dd($topic);
		$topic->save();

		return redirect()->to($topic->link())->with('success', '帖子创建成功！');
	}

	public function edit(Topic $topic)
	{
        $this->authorize('update', $topic);
        $categories=Category::all();
		return view('topics.create_ueditor', compact('topic','categories'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->to($topic->link())->with('success', '帖子更新成功！');
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('success', '帖子删除成功！');
	}


    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        //dd($request->files);
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }

    public function uploadVideo(Request $request,VideoUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($file, 'topics', \Auth::id());
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;

    }
    public function uploadKindeditorImage(Request $request, UploadHandler $uploader)
    {
        //dd($request->imgFile);
        // 初始化返回数据，默认是失败的
        $data = [
            'error'   => 1,
            //'message'       => '上传失败!',
            'url' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->imgFile) {

            // 保存图片到本地
            $result = $uploader->save($file, $request->dir, \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['error']   = 0;
                $data['url'] = $result['path'];
                //$data['message']       = "上传成功!";

            }
        }
        //dd($data);
        return $data;
    }
}
