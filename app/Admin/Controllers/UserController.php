<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('avatar', __('Avatar'))->image('', 45,45);
        $grid->column('name', __('Name'));
        $grid->column('phone', __('Phone'))->copyable();
        $grid->column('email', __('Email'))->copyable();
        $grid->column('introduction', __('Introduction'));
        //$grid->column('email_verified_at', __('Email verified at'));
        //$grid->column('password', __('Password'));
        //$grid->column('weixin_openid', __('Weixin openid'));
        $grid->column('weixin_unionid', __('Weixin unionid'));
        //$grid->column('remember_token', __('Remember token'));

        $grid->column('updated_at', __('Updated at'));
        $grid->column('created_at', __('Created at'));

        //$grid->column('notification_count', __('Notification count'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('weixin_openid', __('Weixin openid'));
        $show->field('weixin_unionid', __('Weixin unionid'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('avatar', __('Avatar'));
        $show->field('introduction', __('Introduction'));
        $show->field('notification_count', __('Notification count'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->mobile('phone', __('Phone'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('weixin_openid', __('Weixin openid'));
        $form->text('weixin_unionid', __('Weixin unionid'));
        $form->text('remember_token', __('Remember token'));
        $form->image('avatar', __('Avatar'));
        $form->text('introduction', __('Introduction'));
        $form->number('notification_count', __('Notification count'));

        return $form;
    }
}
