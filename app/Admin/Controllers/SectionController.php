<?php

namespace App\Admin\Controllers;

use App\Section;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SectionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Secciones';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Section());

        $grid->column('section_id', __('Section id'));
        $grid->column('name', __('Nombre'));
        $grid->column('description', __('Descripción'));
        $grid->column('image_url', __('Image (URL)'));
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
        $show = new Show(Section::findOrFail($id));

        $show->field('section_id', __('Section id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('image_url', __('Image url'));
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
        $form = new Form(new Section());

        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->text('image_url', __('Image url'));

        return $form;
    }
}
