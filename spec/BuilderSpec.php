<?php

namespace spec\Devio\Pipedrive;

use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BuilderSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Devio\Pipedrive\Builder');
    }

    public function it_will_remove_the_options_used_in_the_uri()
    {
        $this->getQueryVars('foo/:id', ['id' => 1])->shouldReturn([]);
        $this->getQueryVars('foo/:id', ['id' => 1, 'name' => 'bar', 'country' => 'es'])
             ->shouldReturn(['name' => 'bar', 'country' => 'es']);
        $this->getQueryVars('foo', ['id' => 1])
             ->shouldReturn(['id' => 1]);
    }

    public function it_get_an_array_of_the_uri_parameters()
    {
        $this->getURIParameters('foo/:id')
             ->shouldReturn(['id']);
        $this->getURIParameters('foo/:id/:name')
             ->shouldReturn(['id', 'name']);
        $this->getURIParameters('foo')
             ->shouldReturn([]);
        $this->getURIParameters(':name/foo/:id')
             ->shouldReturn(['name', 'id']);
        $this->getURIParameters('foo/:id/bar/:name')
             ->shouldReturn(['id', 'name']);
    }

    public function it_replaces_uri_parameters_with_option_values()
    {
        $this->buildURI('foo/:id', ['id' => 1])
             ->shouldReturn('foo/1');
        $this->buildURI(':id/:name', ['id' => 1, 'name' => 'foo'])
             ->shouldReturn('1/foo');
        $this->shouldThrow(InvalidArgumentException::class)
             ->duringBuildURI(':id/foo', ['bar' => 'baz']);
    }
}
