<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Entity;
use Devio\Pipedrive\Resources\Traits\ListsProducts;

class Deals extends Entity
{
    use ListsProducts;

    /**
     * Add a product to the deal.
     *
     * @param       $id
     * @param       $product_id
     * @param       $item_price
     * @param       $quantity
     * @param array $options
     * @return mixed
     */
    public function addProduct($id, $product_id, $item_price, $quantity, $options = [])
    {
        $options = array_merge(
            compact('id', 'product_id', 'item_price', 'quantity'), $options
        );

        return $this->request->post(':id/products', $options);
    }

    /**
     * Update the deatils of an attached product.
     *
     * @param       $id
     * @param       $deal_product_id
     * @param       $item_price
     * @param       $quantity
     * @param array $options
     * @return mixed
     */
    public function updateProduct($id, $deal_product_id, $item_price, $quantity, $options = [])
    {
        $options = array_merge(
            compact('id', 'deal_product_id', 'item_price', 'quantity'), $options
        );

        return $this->request->put(':id/products/:deal_product_id', $options);
    }

    /**
     * Delete an attached product from a deal.
     *
     * @param $id
     * @param $product_attachment_id
     * @return mixed
     */
    public function deleteProduct($id, $product_attachment_id)
    {
        return $this->request->delete(
            ':id/products', compact('id', 'product_attachment_id')
        );
    }

    /**
     * Duplicate a deal.
     *
     * @param $id The deal id
     * @return mixed
     */
    public function duplicate($id)
    {
        return $this->request->get(':id/duplicate', compact('id'));
    }
}