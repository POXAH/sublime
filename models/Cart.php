<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Product;


class Cart extends ActiveRecord
{
    public static function tableName()
    {
        return 'admin_orders';
    }

    public function addToCart($product, $qty)
    {
        if (isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['productQuantity'] += $qty;
        } else {
            $_SESSION['cart'][$product->id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'img' => $product['img'],
                'productQuantity' => $qty,
                'discount' => $product['discount'],
                'link_name' => $product['link_name'],
            ];
        }

        $_SESSION['cart.totalQuantity'] = isset($_SESSION['cart.totalQuantity']) ? $_SESSION['cart.totalQuantity']+ $qty : $qty;
        $_SESSION['cart.totalSum'] = isset($_SESSION['cart.totalSum']) ? $_SESSION['cart.totalSum']+ ($product->price-$product->price*$product->discount/100)*$qty : ($product->price-$product->price*$product->discount/100)*$qty ;
        if (empty($_SESSION['cart.deliveryId'])) {
            $_SESSION['cart.deliveryId'] = 3;
            $_SESSION['cart.deliveryPrice'] = 0;
            $_SESSION['cart.totalSubSum'] = $_SESSION['cart.totalSum'];
        } else {
            $_SESSION['cart.totalSubSum'] = $_SESSION['cart.totalSum'] - $_SESSION['cart.deliveryPrice'];
        }
}


    public function recalcCart($id)
    {
        $priceWithDiscount = ($_SESSION['cart'][$id]['price'] -$_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['discount']/100 );
        $quantity = $_SESSION['cart'][$id]['productQuantity'];
        $price = $priceWithDiscount* $quantity;
        $_SESSION['cart.totalQuantity'] -= $quantity;
        $_SESSION['cart.totalSum'] -= $price;
        unset($_SESSION['cart'][$id]);
        if(!$_SESSION['cart']) {
            unset($_SESSION['cart.totalSum']);
            unset($_SESSION['cart.totalQuantity']);
            unset($_SESSION['cart.deliveryPrice']);
            unset($_SESSION['cart.deliveryId']);
            unset($_SESSION['cart.totalSubSum']);
        }
    }

    public function updateCart($qty, $id)
    {
            $priceWithDiscount = ($_SESSION['cart'][$id]['price'] -$_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['discount']/100 );
            $quantityOld = $_SESSION['cart'][$id]['productQuantity'];
            $priceOld = $priceWithDiscount * $quantityOld;
            $_SESSION['cart.totalQuantity'] -= $quantityOld;
            $_SESSION['cart.totalSum'] -=$priceOld;

            $_SESSION['cart'][$id]['productQuantity'] = $qty;
            $price = $priceWithDiscount * $qty;
            $_SESSION['cart.totalQuantity'] += $qty;
            $_SESSION['cart.totalSum'] +=$price;
            $_SESSION['cart.totalSubSum'] = $_SESSION['cart.totalSum']- $_SESSION['cart.deliveryPrice'];
    }

    public function addDeliveryToCart($id)
    {
        $delivery = Delivery::findOne($id);
        $_SESSION['cart.totalSum'] = $_SESSION['cart.totalSum'] + $delivery->price - $_SESSION['cart.deliveryPrice'];
        $_SESSION['cart.deliveryPrice'] = $delivery->price;
        $_SESSION['cart.deliveryId'] = $id;
        $_SESSION['cart.totalSubSum'] = $_SESSION['cart.totalSum']- $_SESSION['cart.deliveryPrice'];
    }
}