<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Handlers\ImageUploadHandler;


class UsersController extends Controller
{
    public function __construct()
    {
        // Auth 中间件在过滤指定动作时，如该用户未通过身份验证（未登录用户），将会被重定向到登录页面
        $this->middleware('auth',['except'=>['show']]);
    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit',compact('user'));
    }

    public function update(UserRequest $request,User $user,ImageUploadHandler $uploader)
    {
        $this->authorize('update', $user);
        //dd($request->all());
        $data = $request->all();

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id,416);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);

        return redirect()->route('users.show',$user->id)->with('sucess','个人资料更新成功！');
    }
    //用户关注list
    public function followings(User $user)
    {
        $users = $user->followings()->paginate(6);
        $title = $user->name . ' 关注的人';
        return view('users.show_follow', compact('users', 'title'));
    }
    //用户粉丝list
    public function followers(User $user)
    {
        $users = $user->followers()->paginate(6);
        $title = $user->name . ' 的粉丝';
        return view('users.show_follow', compact('users', 'title'));
    }
}
