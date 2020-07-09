<?php

namespace App\Admin\Controllers;

use Illuminate\Support\Str;

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
        $grid->column('image_url', __('Imagen (URL)'));
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        // The filter($callback) method is used to set up a simple search box for the table
        $grid->filter(function ($filter) {

            // Sets the range query for the created_at field
            $filter->between('created_at', 'Created Time')->datetime();
        });

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
        $show->field('name', __('Nombre'));
        $show->field('description', __('Descripción'));
        $show->field('image_url', __('Imagen (URL)'));
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

        $form->hidden('section_id');
        $form->text('name', __('Nombre'))->placeholder('Nombre de la sección')->required();
        $form->textarea('description', __('Descripción'))->placeholder('Breve descripción');
        $form->image('image_url', 'Imagen de la sección')->placeholder('Seleccionar imagen');

        $form->saving(function (Form $form) {
            $form->section_id = Str::lower(str_replace(" ", "-", $form->name));
        });

        return $form;
    }
}
