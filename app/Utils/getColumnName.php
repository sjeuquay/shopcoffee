<?php

namespace App\Utils;

use Illuminate\Support\Facades\Schema;

class getColumnName
{
    /**
     * @param string $table table name (such as 'products')
     * @return array array of column names
     */
    public static function getColumnName($table)
    {
        $column_name = Schema::getColumnListing($table);
        return $column_name;
    }
    public static function getColumnNameWithoutId($table)
    {
        $column_name = Schema::getColumnListing($table);
        $id_position_search = array_search('id', $column_name);
        $column_name_withoutId = array_splice($column_name, $id_position_search + 1);
        return $column_name_withoutId;
    }
}
