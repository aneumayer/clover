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
        $clover_url = "https://www.connectionsinc.org/clover";
        $clover_code = "";
        $this->layout = 'pdf';
        $mpdf = new \Mpdf\Mpdf(['tempDir' => TMP]);
        // Add the image of the clover
        $mpdf->WriteHTML('
            <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
                <img src="./img/print_clover.png" style="width: 8in; height: 8in; margin: 0;" />
            </div>
            <div style="position: absolute; left:0.75in; right: 0; top: 2.55in; bottom: 0;">
                <p style="font-size: 0.3in">
                    Please enter your code at:<br>
                    '.$clover_url.'
                </p>
            </div>
        ');
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