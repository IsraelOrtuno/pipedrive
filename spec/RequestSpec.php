<?php

namespace spec\Devio\Pipedrive;

use Devio\Pipedrive\Http\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RequestSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Devio\Pipedrive\Request');
    }
    
    public function let(Client $client)
    {
        $this->beConstructedWith($client);
    }

    public function it_makes_a_request(Client $client)
    {
        $client->get('foo/1', [])->shouldBeCalled();
        $client->put('foo/1', ['name' => 'bar'])->shouldBeCalled();
        $client->post('foo', [])->shouldBeCalled();

        $this->get('foo/:id', ['id' => 1]);
        $this->put('foo/:id', ['id' => 1, 'name' => 'bar']);
        $this->post('foo', []);
    }
}
