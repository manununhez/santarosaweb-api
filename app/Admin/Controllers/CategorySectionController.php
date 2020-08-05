<?php

namespace App\Admin\Controllers;

use App\CategorySection;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use App\Category;
use App\Section;

class CategorySectionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Secciones y sus categorias';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CategorySection());

        $grid->column('id', __('Id'));
        $grid->column('section_id', __('Section id'));
        $grid->column('category_id', __('Category id'));
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
        $show = new Show(CategorySection::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('section_id', __('Section id'));
        $show->field('category_id', __('Category id'));
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
        $form = new Form(new CategorySection());

        //$form->text('section_id', __('Section id'));
        //$form->text('category_id', __('Category id'));
	
	$form->select('section_id',__('Seleccionar la seccion'))->options(Section::all()->pluck('name', 'section_id'));
	$form->select('category_id', __('Seleccionar la categoria'))->options(Category::all()->pluck('name', 'category_id'));	
	
	return $form;
    }
}
