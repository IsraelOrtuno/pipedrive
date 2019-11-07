<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Http\Response;
use Devio\Pipedrive\Resources\Basics\Resource;

class Mailbox extends Resource
{
    /**
     * Get the Mail threads details by ID.
     *
     * @param $id   Mail threads ID to find.
	 * @return Response
     */
    public function find($id)
    {
        return $this->request->get('mailThreads/:id', compact('id'));
    }

    /**
     * Get list of mail threads
     *
     * @param       $folder
     * @param array $options
	 * @return Response 
     */
    public function mailThreads($folder, $options = [])
    {
        $options['folder'] = $folder;

        return $this->request->get('mailThreads', $options);
    }
    
    /**
     * Get mail messages inside specified mail thread by ID.
     *
     * @param $id   Mail threads ID to find messages.
	 * @return Response
     */
    public function mailMessages($id)
    {
        return $this->request->get('mailThreads/:id/mailMessages', compact('id'));
    }
}