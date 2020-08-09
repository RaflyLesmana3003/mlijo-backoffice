<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateViewProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW v_product 
        AS
        SELECT
            `product`.`id` AS `id`,
            `product`.`name` AS `name`,
            `product`.`img` AS `img`,
            `product`.`price` AS `price`,
            `product`.`stock` AS `stock`,
            `product`.`categori_product` AS `categori_product`,
            group_concat( `category_product`.`kategori` SEPARATOR ',' ) AS `category_product`,
            `product`.`id_mlijo` AS `id_mlijo`,
            `product`.`create_at` AS `create_at`,
            `product`.`update_at` AS `update_at`,
            `mlijos`.`nama` AS `nama_mlijo`,
            `mlijos`.`id_user` AS `id_user` 
        FROM
            ((
                    `product`
                    JOIN `mlijos` ON ((
                            `mlijos`.`id` = `product`.`id_mlijo` 
                        )))
                LEFT JOIN `category_product` ON ((
                    0 <> find_in_set( `category_product`.`id`, `product`.`categori_product` )))) 
        GROUP BY
	    `product`.`id`
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_product');
    }
}
