<?php

namespace App\Admin\Controllers;

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
        $show = new Show(ItemAddress::findOrFail($id));

        $show->field('item_address_id', __('Item address id'));
        $show->field('address_1', __('Address 1'));
        $show->field('address_2', __('Address 2'));
        $show->field('house_number', __('House number'));
        $show->field('neighborhood', __('Neighborhood'));
        $show->field('city', __('City'));
        $show->field('postal_code', __('Postal code'));
        $show->field('coordinate_latitude', __('Coordinate latitude'));
        $show->field('coordinate_longitude', __('Coordinate longitude'));
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

        $form->text('address_1', __('Address 1'));
        $form->text('address_2', __('Address 2'));
        $form->text('house_number', __('House number'));
        $form->text('neighborhood', __('Neighborhood'));
        $form->text('city', __('City'));
        $form->text('postal_code', __('Postal code'));
        $form->text('coordinate_latitude', __('Coordinate latitude'));
        $form->text('coordinate_longitude', __('Coordinate longitude'));

        return $form;
    }
}
