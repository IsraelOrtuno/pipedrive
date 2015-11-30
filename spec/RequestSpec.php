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
        $this->setToken('foobarbaz');
    }

    public function it_makes_a_request(Client $client)
    {
        $client->get('https://api.pipedrive.com/v1/foo/1?token=foobarbaz', [])->shouldBeCalled();
        $client->put('https://api.pipedrive.com/v1/foo/1?token=foobarbaz', ['name' => 'bar'])->shouldBeCalled();
        $client->post('https://api.pipedrive.com/v1/foo?token=foobarbaz', [])->shouldBeCalled();

        $this->get('foo/:id', ['id' => 1]);
        $this->put('foo/:id', ['id' => 1, 'name' => 'bar']);
        $this->post('foo', []);
    }
}
