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
        $grid->column('address_1', __('Dirección o Calle 1'));
        $grid->column('address_2', __('Dirección o Calle 2'));
        $grid->column('house_number', __('Número de casa'));
        $grid->column('neighborhood', __('Barrio'));
        $grid->column('city', __('Ciudad'));
        $grid->column('postal_code', __('Código postal'));
        $grid->column('coordinate_latitude', __('Coordenada - latitud'));
        $grid->column('coordinate_longitude', __('Coordenada - longitud'));
        $grid->column('website', __('Página web'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Teléfono'));
        $grid->column('whatsapp', __('Whatsapp'));
        $grid->column('image_url_icon', __('Icono (URL)'));
        $grid->column('image_url_logo', __('Logo (URL)'));
        $grid->column('image_url_slider_1', __('Slider 1 (URL)'));
        $grid->column('title_slider_1', __('Titulo slider 1'));
        $grid->column('description_slider_1', __('Descripcion slider 1'));
        $grid->column('btn_text_slider_1', __('Texto boton slider 1'));
        $grid->column('btn_link_slider_1', __('Link boton slider 1'));
        $grid->column('image_url_slider_2', __('Slider 2 (URL)'));
        $grid->column('title_slider_2', __('Titulo slider 2'));
        $grid->column('description_slider_2', __('Descripcion slider 2'));
        $grid->column('btn_text_slider_2', __('Texto boton slider 2'));
        $grid->column('btn_link_slider_2', __('Link boton slider 2'));
        $grid->column('image_url_slider_3', __('Slider 3 (URL)'));
        $grid->column('title_slider_3', __('Titulo slider 3'));
        $grid->column('description_slider_3', __('Descripcion slider 3'));
        $grid->column('btn_text_slider_3', __('Texto boton slider 3'));
        $grid->column('btn_link_slider_3', __('Link boton slider 3'));
        $grid->column('delivery_available', __('Delivery disponible'))->display(function ($released) {
            return $released ? 'Sí' : 'No';
        });
        $grid->column('info_hours_id', __('Info hours id'));
        $grid->column('info_hours_opening', __('Horas de apertura'));
        $grid->column('info_hours_closing', __('Horas de cierre'));
        $grid->column('footer_title', __('Titulo footer'));
        $grid->column('footer_description', __('Titulo descripcion'));
        $grid->column('product_type', __('Tipo de negocio'));
        $grid->column('twitter', __('Twitter'));
        $grid->column('instagram', __('Instagram'));
        $grid->column('facebook', __('Facebook'));
        $grid->column('linkedin', __('Linkedin'));
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
        $show->field('address_1', __('Dirección o Calle 1'));
        $show->field('address_2', __('Dirección o Calle 2'));
        $show->field('house_number', __('Número de casa'));
        $show->field('neighborhood', __('Barrio'));
        $show->field('city', __('Ciudad'));
        $show->field('postal_code', __('Código postal'));
        $show->field('coordinate_latitude', __('Coordenada - latitud'));
        $show->field('coordinate_longitude', __('Coordenada - longitud'));
        $show->field('website', __('Website'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Teléfono móvil'));
        $show->field('whatsapp', __('Whatsapp'));
        $show->field('image_url_icon', __('Icono (URL)'));
        $show->field('image_url_logo', __('Logo (URL)'));
        $show->field('image_url_slider_1', __('Slider 1 (URL)'));
        $show->field('title_slider_1', __('Titulo slider 1'));
        $show->field('description_slider_1', __('Descripcion slider 1'));
        $show->field('btn_text_slider_1', __('Texto boton slider 1'));
        $show->field('btn_link_slider_1', __('Link boton slider 1'));
        $show->field('image_url_slider_2', __('Slider 2 (URL)'));
        $show->field('title_slider_2', __('Titulo slider 2'));
        $show->field('description_slider_2', __('Descripcion slider 2'));
        $show->field('btn_text_slider_2', __('Texto boton slider 2'));
        $show->field('btn_link_slider_2', __('Link boton slider 2'));
        $show->field('image_url_slider_3', __('Slider 3 (URL)'));
        $show->field('title_slider_3', __('Titulo slider 3'));
        $show->field('description_slider_3', __('Descripcion slider 3'));
        $show->field('btn_text_slider_3', __('Texto boton slider 3'));
        $show->field('btn_link_slider_3', __('Link boton slider 3'));
        $show->field('delivery_available', __('Delivery disponible'));
        $show->field('info_hours_id', __('Info hours id'));
        $show->field('info_hours_opening', __('Horas de apertura'));
        $show->field('info_hours_closing', __('Horas de cierre'));
        $show->field('footer_title', __('Titulo footer'));
        $show->field('footer_description', __('Titulo descripcion'));
        $show->field('product_type', __('Tipo de negocio'));
        $show->field('twitter', __('Twitter'));
        $show->field('instagram', __('Instagram'));
        $show->field('facebook', __('Facebook'));
        $show->field('linkedin', __('Linkedin'));
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

        // The first column occupies 1/2 of the page width
        $form->column(1/2, function ($form) {
            $form->text('name', __('Nombre'))->placeholder('Nombre de la subcategoría')->required();
            $form->text('description', __('Descripción'))->placeholder('Breve descripción');
            $form->text('address_1', __('Dirección o Calle 1'))->required();
            $form->text('address_2', __('Dirección o Calle 2'));
            $form->text('house_number', __('Número de casa'));
            $form->text('neighborhood', __('Barrio'));
            $form->text('city', __('Ciudad'))->required();
            $form->text('postal_code', __('Código postal'));
            $form->text('coordinate_latitude', __('Coordenada - latitud'))->required();
            $form->text('coordinate_longitude', __('Coordenada - longitud'))->required();
            $form->url('website', __('Website'));
            $form->text('email', __('Email'));
            $form->mobile('phone', __('Teléfono móvil'))->options(['mask' => '(9999) 999 999']);
            $form->mobile('whatsapp', __('Whatsapp'))->options(['mask' => '(+999) 999 999 999']);
            $states = [
                'on'  => ['value' => 1, 'text' => 'sí', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'no', 'color' => 'danger'],
            ];
            $form->switch('delivery_available', __('Delivery disponible'))->states($states);
            $form->select('info_hours_id', __('Seleccionar los días de trabajo'))->options(ItemInfoHours::all()->pluck('work_days_description', 'info_hours_id'))->required();
            $form->text('info_hours_opening', __('Horario de apertura'))->required();
            $form->text('info_hours_closing', __('Horario de cierre'))->required();
            $form->select('product_type', __('Seleccionar tipo de negocio'))->options(["menu" => "Menu", "servicios" => "Servicios", "productos" => "Productos"]);
        });

        $form->column(1/2, function ($form) {
            $form->image('image_url_icon', 'Icono de la subcategoría')->placeholder('Seleccionar imagen icono');
            $form->image('image_url_logo', 'Logo de la subcategoría')->placeholder('Seleccionar imagen logo');
            $form->image('image_url_slider_1', 'Slider de la subcategoría #1')->placeholder('Seleccionar imagen #1');
            $form->text('title_slider_1', 'Titulo slider #1')->placeholder('Titulo slider #1');
            $form->text('description_slider_1', 'Descripcion slider #1')->placeholder('Descripcion slider #1');
            $form->text('btn_text_slider_1', 'Texto boton slider #1')->placeholder('Texto boton slider #1');
            $form->text('btn_link_slider_1', 'Link boton slider #1')->placeholder('Link boton slider #1');

            $form->image('image_url_slider_2', 'Slider de la subcategoría #2')->placeholder('Seleccionar imagen #2');
            $form->text('title_slider_2', 'Titulo slider #2')->placeholder('Titulo slider #2');
            $form->text('description_slider_2', 'Descripcion slider #2')->placeholder('Descripcion slider #2');
            $form->text('btn_text_slider_2', 'Texto boton slider #2')->placeholder('Texto boton slider #2');
            $form->text('btn_link_slider_2', 'Link boton slider #2')->placeholder('Link boton slider #2');

            $form->image('image_url_slider_3', 'Slider de la subcategoría #3')->placeholder('Seleccionar imagen #3');
            $form->text('title_slider_3', 'Titulo slider #3')->placeholder('Titulo slider #3');
            $form->text('description_slider_3', 'Descripcion slider #3')->placeholder('Descripcion slider #3');
            $form->text('btn_text_slider_3', 'Texto boton slider #3')->placeholder('Texto boton slider #3');
            $form->text('btn_link_slider_3', 'Link boton slider #3')->placeholder('Link boton slider #3');

            $form->url('twitter', 'Twitter')->placeholder('Twitter url');
            $form->url('facebook', 'Facebook')->placeholder('Facebook url');
            $form->url('instagram', 'Instagram')->placeholder('Instagram url');
            $form->url('linkedin', 'Linkedin')->placeholder('Linkedin url');
            $form->text('footer_title', 'Titulo footer')->placeholder('titulo');
            $form->text('footer_description', 'Descripcion footer')->placeholder('descripcion');
        });

        $form->saving(function (Form $form) {
            $form->item_category_id = Str::lower(str_replace(" ", "-", $form->name));
        });

        return $form;
    }
}
