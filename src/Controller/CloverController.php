<?php

namespace App\Controller;

use Cake\Core\Configure;

class CloverController extends AppController
{

    /**
     * View the clover patch
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

    }
    
    /**
     * Print a new clover
     *
     * @return \Cake\Http\Response|null
     */
    public function generate()
    {
        $this->layout = 'pdf';
        $mpdf = new \Mpdf\Mpdf(['tempDir' => TMP]);
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }

    /**
     * Add a new clover to the patch
     *
     * @return \Cake\Http\Response|null
     */
    public function event()
    {

    }

    /**
     * View the history of a clover
     *
     * @return \Cake\Http\Response|null
     */
    public function history()
    {

    }

}