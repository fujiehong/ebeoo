<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class PostsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Post';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post());
        $grid->quickSearch('title');

        $grid->column('id', __('Id'));
        $grid->column('title', __('标题'))->editable()->width(100);
        $grid->column('status', __('启用'))->switch();
        $grid->column('imgurl', __('图片地址'))->image('', 80,50);
        $grid->column('label', __('Label'))->editable()->label('info');
        $grid->column('note', __('Note'))->editable();
        $grid->column('description', __('Description'))->limit(20)->width(200);
        //$grid->column('description', __('描述'))->display(function($description) {
            //return Str::limit($description, 20, '...');
        //});
        $grid->column('opentype', __('Opentype'))->editable();
        $grid->column('openurl', __('Openurl'))->editable()->width(100);
        $grid->column('rank', __('排序'))->editable()->help('排序显示倒序')->sortable();
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'))->sortable();

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
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('imgurl', __('Imgurl'))->image();
        $show->field('label', __('Label'));
        $show->field('title', __('Title'));
        $show->field('note', __('Note'));
        $show->field('description', __('Description'));
        $show->field('opentype', __('Opentype'));
        $show->field('openurl', __('Openurl'));
        $show->field('status', __('Status'));
        $show->field('rank', __('Rank'));
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
        $form = new Form(new Post());

        $form->text('title', __('Title'));
        $form->text('label', __('Label'));
        $form->image('imgurl', __('Imgurl'));
        $form->text('note', __('Note'));

        $form->textarea('description', __('Description'));
        $form->text('opentype', __('Opentype'));
        $form->text('openurl', __('Openurl'));
        $form->switch('status', __('Status'))->default(1);
        $form->number('rank', __('Rank'));
        $form->display('created_at', '创建时间');
        $form->display('updated_at', '修改时间');

        $form->confirm('确定提交吗？');

        return $form;
    }
}
