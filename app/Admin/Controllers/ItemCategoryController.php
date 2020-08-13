<?php

namespace App\Admin\Controllers;

use Illuminate\Support\Str;

use App\ItemCategory;
use App\ItemInfoHours;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ItemCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Sub-categorias';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ItemCategory());

        $grid->column('item_category_id', __('Item category id'));
        $grid->column('name', __('Nombre'));
        $grid->column('description', __('Descripción'));
        $grid->column('address_item_id', __('Address item id'));
        $grid->column('website', __('Página web'));
        $grid->column('phone', __('Teléfono'));
        $grid->column('image_url', __('Image (URL)'));
        $grid->column('image_url_2', __('Imagen 2 (URL)'));
        $grid->column('image_url_3', __('Imagen 3 (URL)'));
        $grid->column('delivery_available', __('Delivery disponible'))->display(function ($released) {
            return $released ? 'Sí' : 'No';
        });
        $grid->column('info_hours_id', __('Info hours id'));
        $grid->column('info_hours_opening', __('Horas de apertura'));
        $grid->column('info_hours_closing', __('Horas de cierre'));
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
        $show = new Show(ItemCategory::findOrFail($id));

        $show->field('item_category_id', __('Item category id'));
        $show->field('name', __('Nombre'));
        $show->field('description', __('Descripción'));
        $show->field('address_item_id', __('Address item id'));
        $show->field('website', __('Website'));
        $show->field('phone', __('Teléfono móvil'));
        $show->field('image_url', __('Imagen (URL)'));
        $show->field('image_url_2', __('Imagen 2 (URL)'));
        $show->field('image_url_3', __('Imagen 3 (URL)'));
        $show->field('delivery_available', __('Delivery disponible'));
        $show->field('info_hours_id', __('Info hours id'));
        $show->field('info_hours_opening', __('Horas de apertura'));
        $show->field('info_hours_closing', __('Horas de cierre'));
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
        $form = new Form(new ItemCategory());

        $form->hidden('item_category_id');
        $form->text('name', __('Nombre'))->placeholder('Nombre de la subcategoría')->required();
        $form->text('description', __('Descripción'))->placeholder('Breve descripción');
        $form->text('address_item_id', __('Address item id'))->required();
        $form->url('website', __('Website'));
        $form->mobile('phone', __('Teléfono móvil'))->options(['mask' => '(9999) 999 999']);
        $form->image('image_url', 'Imagen de la subcategoría')->placeholder('Seleccionar imagen');
        $form->image('image_url_2', 'Imagen de la subcategoría #2')->placeholder('Seleccionar imagen');
        $form->image('image_url_3', 'Imagen de la subcategoría #3')->placeholder('Seleccionar imagen');
        $states = [
            'on'  => ['value' => 1, 'text' => 'sí', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'no', 'color' => 'danger'],
        ];
        $form->switch('delivery_available', __('Delivery disponible'))->states($states);
        $form->select('info_hours_id', __('Seleccionar los días de trabajo'))->options(ItemInfoHours::all()->pluck('work_days_description', 'info_hours_id'));
        $form->text('info_hours_opening', __('Horario de apertura'))->required();
        $form->text('info_hours_closing', __('Horario de cierre'))->required();

        $form->saving(function (Form $form) {
            $form->item_category_id = Str::lower(str_replace(" ", "-", $form->name));
        });

        return $form;
    }
}
