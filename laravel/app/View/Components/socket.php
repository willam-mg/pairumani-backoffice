<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Socket extends Component
{
    const url_socket = 'http://localhost:3000/refrescame-esta';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    static public function emmit() {
        $crl = curl_init();
        curl_setopt($crl, CURLOPT_URL, self::url_socket);
        curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($crl);
        curl_close($crl);
        return $response;
    }

    // /**
    //  * Get the view / contents that represent the component.
    //  *
    //  * @return \Illuminate\Contracts\View\View|\Closure|string
    //  */
    public function render()
    {
        // return view('components.socket');
    }
}
