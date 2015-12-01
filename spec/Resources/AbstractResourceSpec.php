<?php

namespace spec\Devio\Pipedrive\Resources;

use Devio\Pipedrive\Exceptions\PipedriveException;
use Devio\Pipedrive\Request;
use Devio\Pipedrive\Resources\AbstractResource;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AbstractResourceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Devio\Pipedrive\Resources\AbstractResource');
    }

    public function let(Request $request)
    {
        $this->beAnInstanceOf(ResourceClass::class);
        $this->beConstructedWith($request);
    }
    
    public function it_identifies_a_disabled_method()
    {
        $this->setEnabled('all', 'find');

        $this->isEnabled('all')->shouldBe(true);
        $this->isEnabled('find')->shouldBe(true);
        $this->isEnabled('update')->shouldBe(false);
        $this->isEnabled('delete')->shouldBe(false);


        $this->shouldThrow(PipedriveException::class)->during('__call', ['update']);
        $this->shouldThrow(PipedriveException::class)->during('__call', ['delete']);
    }
}

class ResourceClass extends AbstractResource
{
}
