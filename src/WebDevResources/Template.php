<?php
namespace WebDevResources;

//This Template class contains the methods to render the various website views.
class Template
{
    protected $base_template;
    protected $page;

    //The base template (header and footer elements) is passed through on construction.
    public function __construct($base_template)
    {
        $this->base_template = $base_template;
    }

    //The render function accepts a page view and an array of needed variables to render that page along with the
    //base template.
    public function render($page, $data = array())
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        $this->page = $page;
        require $this->base_template;
    }

    //This method is called within the base html file to render the correct page.
    public function content()
    {
        require $this->page;
    }
}