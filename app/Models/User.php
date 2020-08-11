<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,\Illuminate\Auth\MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone', 'email', 'password','avatar','introduction'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //判断是不是业务类用户身份是不是登录用户
    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function topicNotify($instance)
    {
        // 如果要通知的人是当前用户，就不必通知了！
        if ($this->id == Auth::id()) {
            return;
        }
        $this->increment('notification_count');
        $this->notify($instance);
    }
    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }
    //粉丝关联
    public function followers()
    {
        return $this->belongsToMany(User::Class, 'followers', 'user_id', 'follower_id')->withTimestamps();
    }
    //用户关注人关联
    public function followings()
    {
        return $this->belongsToMany(User::Class, 'followers', 'follower_id', 'user_id')->withTimestamps();
    }
    //关注方法
    public function follow($user_ids)
    {
        if ( ! is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        //sync 方法会接收两个参数，第一个参数为要进行添加的 id，
        //第二个参数则指明是否要移除其它不包含在关联的 id 数组中的 id，
        //true 表示移除，false 表示不移除，默认值为 true
        $this->followings()->sync($user_ids, false);
    }
    //取消关注方法
    public function unfollow($user_ids)
    {
        if ( ! is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        //detach 方法在中间表上移除一个记录
        $this->followings()->detach($user_ids);
    }
    //判读A是否关注B
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }


}
