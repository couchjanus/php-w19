<?php
/**
 * Модель для работы с заказами
 */

require_once CORE.'/Model.php';

class Order extends Model
{
    protected static $table = 'orders';
    protected static $pk = 'id';

}
