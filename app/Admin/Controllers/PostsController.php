<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

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

        $grid->column('id', __('Id'));
        $grid->column('imgurl', __('Imgurl'))->image('', 100,50);
        $grid->column('label', __('Label'));
        $grid->column('title', __('Title'));
        $grid->column('note', __('Note'));
        $grid->column('description', __('Description'));
        $grid->column('opentype', __('Opentype'));
        $grid->column('openurl', __('Openurl'));
        $grid->column('status', __('Status'));
        $grid->column('rank', __('Rank'));
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
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('imgurl', __('Imgurl'));
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

        return $form;
    }
}