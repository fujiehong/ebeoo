<?php

namespace App\Admin\Controllers;

use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use Illuminate\Support\Str;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';



    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());
        $grid->paginate(10);
        $grid->quickSearch('title');

        $grid->selector(function (Grid\Tools\Selector $selector) {
            $selector->select('category_id', '分类', ProductCategory::all()->pluck('name', 'id'));
        });
        //$grid->fixColumns(0, -1);


        $grid->column('id', __('Id'));

        $grid->column('title', __('title'))->editable('textarea')->ucfirst()->help('这一列是title');

        $grid->column('status', __('启用'))->switch();
        $grid->column('image', __('Image'))->image('', 80,50);
        $grid->column('category_id', __('分类'))->editable('select', ProductCategory::all()->pluck('name', 'id'));
        //$grid->column('stock', __('Stock'));
        //$grid->column('sales', __('Sales'));
        $grid->column('rank', __('Rank'))->editable();



        //$grid->column('note', __('Note'))->editable('textarea');

        $grid->column('brand', __('Brand'))->editable();
        $grid->column('summary', __('Summary'))->editable('textarea');;
        //$grid->column('description', __('Description'));
        $grid->column('description')->limit(20)->width(200);
        //$grid->column('specification', __('Specification'));
        $grid->column('dimension', __('Dimension'))->editable();
        //$grid->column('shipment', __('Shipment'));

        //$grid->column('subject', __('Subject'));
        //$grid->column('interest', __('Interest'));
        //$grid->column('region', __('Region'));
        //$grid->column('code', __('Code'));
        $grid->column('label', __('Label'))->label('primary');
        //$grid->column('ageRange', __('AgeRange'));
        $grid->column('original_price', __('原价'));
        $grid->column('special_price', __('特价'));
        //$grid->column('link', __('Link'));
        //$grid->column('created_at', __('Created at'));
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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('status', __('Status'));
        $show->field('stock', __('Stock'));
        $show->field('sales', __('Sales'));
        $show->field('rank', __('Rank'));
        $show->field('title', __('Title'));
        $show->field('note', __('Note'));
        $show->field('image', __('Image'));
        $show->field('brand', __('Brand'));
        $show->field('summary', __('Summary'));
        $show->field('description', __('Description'));
        $show->field('specification', __('Specification'));
        $show->field('dimension', __('Dimension'));
        $show->field('shipment', __('Shipment'));
        $show->field('category_id', __('Category id'));
        $show->field('subject', __('Subject'));
        $show->field('interest', __('Interest'));
        $show->field('region', __('Region'));
        $show->field('code', __('Code'));
        $show->field('label', __('Label'));
        $show->field('ageRange', __('AgeRange'));
        $show->field('original_price', __('Original price'));
        $show->field('special_price', __('Special price'));
        $show->field('link', __('Link'));
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
        $form = new Form(new Product());

        $form->switch('status', __('启用'))->default(1);
        $form->select('category_id', '分类')->options(ProductCategory::all()->pluck('name', 'id'));
        $form->number('stock', __('Stock'));
        $form->number('sales', __('Sales'));
        $form->number('rank', __('Rank'));
        $form->text('title', __('标题'))->default(' ');
        $form->text('note', __('Note'))->default(' ');
        $form->image('image', __('商品图片'));
        $form->text('brand', __('品牌'));
        $form->text('summary', __('Summary'));
        $form->textarea('description', __('Description'));
        $form->textarea('specification', __('Specification'));
        $form->text('dimension', __('Dimension'));
        $form->text('shipment', __('Shipment'));
        $form->text('subject', __('Subject'))->default(' ');
        $form->text('interest', __('Interest'));
        $form->text('region', __('Region'));
        $form->text('code', __('Code'));
        $form->text('label', __('Label'));
        $form->text('ageRange', __('AgeRange'));
        $form->decimal('original_price', __('原价'))->default(0.00);
        $form->decimal('special_price', __('特价'))->default(0.00);
        $form->textarea('link', __('Link'));
        $form->display('created_at', '创建时间');
        $form->display('updated_at', '修改时间');
        $form->confirm('确定提交吗？');


        return $form;
    }
}
