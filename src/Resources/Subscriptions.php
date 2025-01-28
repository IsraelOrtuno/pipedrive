<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Http\Response;
use Devio\Pipedrive\Resources\Basics\Resource;

class Subscriptions extends Resource
{
    protected $enabled = ['find', 'delete'];

    /**
     * Find subscription by deal.
     *
     * @param int   $deal_id
     * @return Response
     */
    public function findByDealId($deal_id)
    {
        return $this->request->get('find/:deal_id', compact('deal_id'));
    }

    /**
     * Find an element by name.
     *
     * @param int   $id
     * @return Response
     */
    public function payments($id)
    {
        return $this->request->get(':id/payments', compact('id'));
    }

    /**
     * Add a recurring subscription.
     *
     * @param int    $deal_id
     * @param string $currency
     * @param string $description
     * @param string $cadence_type
     * @param int    $cycle_amount
     * @param string $start_date
     * @param array  $options
     * @return Response
     */
    public function addRecurring($deal_id, $currency, $description, $cadence_type, $cycle_amount, $start_date, $options = [])
    {
        $options = array_merge(
            compact('deal_id', 'currency', 'description', 'cadence_type', 'cycle_amount', 'start_date'),
            $options
        );

        return $this->request->post('recurring', $options);
    }

    /**
     * Update a recurring subscription.
     *
     * @param int    $id
     * @param string $effective_date
     * @param array  $options
     * @return Response
     */
    public function updateRecurring($id, $effective_date, $options = [])
    {
        $options = array_merge(
            compact('id','effective_date'),
            $options
        );

        return $this->request->put('recurring/:id', $options);
    }

    /**
     * Cancel a recurring subscription.
     *
     * @param int    $id
     * @param array  $options
     * @return Response
     */
    public function cancelRecurring($id, $options = [])
    {
        $options = array_merge(
            compact('id'),
            $options
        );

        return $this->request->put('recurring/:id/cancel', $options);
    }

    /**
     * Add an installment subscription.
     *
     * @param int    $deal_id
     * @param string $currency
     * @param array  $payments
     * @param array  $options
     * @return Response
     */
    public function addInstallment($deal_id, $currency, $payments, $options = [])
    {
        $options = array_merge(
            compact('deal_id', 'currency', 'payments'),
            $options
        );

        return $this->request->post('installment', $options);
    }

    /**
     * Update an installment subscription.
     *
     * @param int    $id
     * @param array  $payments
     * @param array  $options
     * @return Response
     */
    public function updateInstallment($id, $payments, $options = [])
    {
        $options = array_merge(
            compact('id', 'payments'),
            $options
        );

        return $this->request->put('installment/:id', $options);
    }

}
