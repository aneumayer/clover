<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class CloverController extends AppController
{

    private $code_length = 4;
    private $code_options ='123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
    private $code_tries = 10;
    private $clover_url = "https://www.connectionsinc.org/clover";

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
        // Turn off the view for this action
        $this->autoRender = false;
        // Create a new unique code to use on the clover
        $clover_code = false;
        while ($clover_code === false) {
            $clover_code = $this->getCode();
        }
        // Add the new clover to the database
        $clovers = TableRegistry::getTableLocator()->get('clovers');
        $clover = $clovers->newEntity();
        $clover->public_id = $clover_code;
        $clover->created_at = Time::now();
        $clovers->save($clover);
        // Create the PDF content
        $this->layout = 'pdf';
        $mpdf = new \Mpdf\Mpdf(['tempDir' => TMP]);
        // Add the image of the clover
        $mpdf->SetTitle('Kindness Clover');
        $mpdf->WriteHTML('
            <div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
                <img src="./img/print_clover.png" style="width: 8in; height: 8in; margin: 0;" />
            </div>
            <div style="position: absolute; left:0.75in; right: 0; top: 2.55in; bottom: 0;">
                <p style="font-size: 0.3in">
                    Please enter your code at:<br>
                    '.$this->clover_url.'
                </p>
            </div>
            <div style="position: absolute; left: 2in; right: 0; top: 5in; bottom: 0;">
                <p style="font-size: 0.4in">
                    '.$clover_code.'
                </p>
            </div>
        ');
        $mpdf->Output();
    }

    /**
     * Add a new event to a clover
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

    /**
     * Create a new random 4-character
     *
     * @return string
     */
    private function newCode()
    {
        $code = '';
        for ($i = 0; $i < $this->code_length; $i++) {
            $code .= substr($this->code_options, mt_rand(0, strlen($this->code_options) - 1), 1);
        }
        return $code;
    }

    /**
     * Get a unique public string for the clover
     *
     * @return string
     */
    private function getCode()
    {
        // Generate x number of random codes
        $codes = [];
        for ($i = 0; $i < $this->code_tries; $i++) {
            $codes[] = $this->newCode();
        }
        // Get the codes that are already in use
        $clovers = TableRegistry::getTableLocator()->get('clovers');
        $clovers->find()
            ->select(['public_id'])
            ->where(['public_id IN' => $codes]);
        // Remove any of the codes that are already in use
        if ($clovers) {
            foreach ($clovers as $clover) {
                if (($key = array_search($clover->public_id, $codes)) !== false) {
                    unset($codes[$key]);
                }
            }
        }
        return reset($codes);
    }
}
