<?php

namespace App\Admin\Controllers;

use App\Models\BlogReply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class BlogRepliesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BlogReply';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BlogReply());

        $grid->column('id', __('Id'));
        //$grid->column('blog.title', __('Blog title'));
        $grid->column('blog.title', 'blog')->modal('用户信息', function ($model) {

            $user = $model->blog()->get()->map(function ($user) {
                return $user->only(['id', 'title', 'created_at']);
            });

            return new Table(['ID', 'title', '创建时间'], $user->toArray());
        });
        //$grid->column('user.name', __('回复用户'));
        $grid->column('user.name', '回复用户')->modal('用户信息', function ($model) {

            $user = $model->user()->get()->map(function ($user) {
                return $user->only(['id', 'name','email', 'created_at']);
            });

            return new Table(['ID', 'name','email', '注册时间'], $user->toArray());
        });
        $grid->column('content', __('Content'));
        //$grid->column('last_id', __('Last id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(BlogReply::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('blog_id', __('Blog id'));
        $show->field('user_id', __('User id'));
        $show->field('content', __('Content'));
        $show->field('last_id', __('Last id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BlogReply());

        //$form->number('blog_id', __('Blog id'));
        //$form->number('user_id', __('User id'));
        $form->textarea('content', __('Content'))->rows(3);
        //$form->number('last_id', __('Last id'));

        return $form;
    }
}
