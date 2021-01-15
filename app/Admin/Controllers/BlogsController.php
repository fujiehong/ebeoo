<?php

namespace App\Admin\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogReply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class BlogsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Blog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Blog());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'))->width(200);

        //$grid->column('adminer', __('Admin id'));

        $grid->column('category_id', __('商品分类'))->editable('select', BlogCategory::all()->pluck('name', 'id'));

        $grid->column('reply_count', '回复')->expand(function ($blog) {

            $comments = $blog->replies()->take(10)->get()->map(function ($comment) {
                return $comment->only(['id', 'content', 'created_at']);
            });

            return new Table(['回复ID', '回复内容', '回复时间'], $comments->toArray());
        });
        $grid->column('settings')->table();
        //$grid->column('reply_count', __('Reply count'));
        $grid->column('view_count', __('View count'));
        //$grid->column('last_reply_user_id', __('Last reply user id'));
        $grid->column('order', __('Order'));
        $grid->column('excerpt', __('Excerpt'));
        $grid->column('slug', __('Slug'));
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
        $show = new Show(Blog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        //$show->field('body', __('Body'));

        $show->field('body', __('Body'))->unescape()->as(function ($body) {

        return "{$body}";

    });
        $show->field('admin_id', __('Admin id'));
        $show->field('category.name', __('分类名称'));
        $show->field('reply_count', __('Reply count'));
        $show->field('view_count', __('View count'));
        $show->field('last_reply_user_id', __('Last reply user id'));
        $show->field('order', __('Order'));
        $show->field('excerpt', __('Excerpt'));
        $show->field('slug', __('Slug'));
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
        $form = new Form(new Blog());
        $form->text('title', __('Title'));
        $form->select('category_id','分类')->options(BlogCategory::all()->pluck('name','id'));
        //$form->textarea('body', __('Body'));
        $form->hidden('admin_id', __('Admin id'))->value(Admin::user()->id);


        $form->divider('Title');

        $form->UEditor('body');
        $form->hasMany('replies', function (Form\NestedForm $form) {
            $form->text('id');
            $form->text('content');
            $form->datetime('completed_at');
        });


        //$form->number('reply_count', __('Reply count'));
        //$form->number('view_count', __('View count'));
        //$form->number('last_reply_user_id', __('Last reply user id'));
        //$form->number('order', __('Order'));
        $form->textarea('excerpt', __('Excerpt'));
        $form->text('slug', __('Slug'));
        $form->display('created_at', '创建时间');
        $form->display('updated_at', '修改时间');
        $form->confirm('确定提交吗？');

        return $form;
    }
}
