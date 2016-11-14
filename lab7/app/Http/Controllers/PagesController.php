<?php

namespace App\Http\Controllers;



class PagesController extends Controller

{

    function home ()
{
    $people =['Tylor', 'Matt', 'Geffery'];
    return view('welcome', compact ('people'));

}


    function about ()
    {

        return 'About page';

    }


}
