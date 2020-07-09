<?php

namespace App\Admin\Controllers;

use Illuminate\Support\Str;

use App\ItemAddress;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ItemAddressController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Direccion de una sub-categoria';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ItemAddress());

        $grid->column('item_address_id', __('Item address id'));
        $grid->column('address_1', __('Dirección o Calle 1'));
        $grid->column('address_2', __('Dirección o Calle 2'));
        $grid->column('house_number', __('Número de casa'));
        $grid->column('neighborhood', __('Barrio'));
        $grid->column('city', __('Ciudad'));
        $grid->column('postal_code', __('Código postal'));
        $grid->column('coordinate_latitude', __('Coordenada - latitud'));
        $grid->column('coordinate_longitude', __('Coordenada - longitud'));
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
        $show = new Show(ItemAddress::findOrFail($id));

        $show->field('item_address_id', __('Item address id'));
        $show->field('address_1', __('Dirección o Calle 1'));
        $show->field('address_2', __('Dirección o Calle 2'));
        $show->field('house_number', __('Número de casa'));
        $show->field('neighborhood', __('Barrio'));
        $show->field('city', __('Ciudad'));
        $show->field('postal_code', __('Código postal'));
        $show->field('coordinate_latitude', __('Coordenada - latitud'));
        $show->field('coordinate_longitude', __('Coordenada - longitud'));
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
        $form = new Form(new ItemAddress());

        $form->hidden('item_address_id');
        $form->text('address_1', __('Dirección o Calle 1'))->required();
        $form->text('address_2', __('Dirección o Calle 2'));
        $form->text('house_number', __('Número de casa'));
        $form->text('neighborhood', __('Barrio'));
        $form->text('city', __('Ciudad'))->required();
        $form->text('postal_code', __('Código postal'));
        $form->text('coordinate_latitude', __('Coordenada - latitud'))->required();
        $form->text('coordinate_longitude', __('Coordenada - longitud'))->required();

        //TODO add map
        
        $form->saving(function (Form $form) {
            $form->item_address_id = 'address-'.Str::lower(str_replace(" ", "-", $form->address_1));
        });

        return $form;
    }
}
