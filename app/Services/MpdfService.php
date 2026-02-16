<?php

namespace App\Services;

use Mpdf\Mpdf;

class MpdfService
{
    protected $mpdf;

    public function __construct()
    {
        $this->mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L', // Landscape A4
            'orientation' => 'L',
            'tempDir' => storage_path('temp'),
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
        ]);
    }

    /**
     * Set HTML content for the PDF
     *
     * @param string $html
     * @return self
     */
    public function setHtml($html)
    {
        $this->mpdf->WriteHTML($html);
        return $this;
    }

    /**
     * Set custom configuration options
     *
     * @param array $config
     * @return self
     */
    public function setConfig($config)
    {
        $this->mpdf = new Mpdf(array_merge([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'L',
            'tempDir' => storage_path('temp'),
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
        ], $config));
        
        return $this;
    }

    /**
     * Output the PDF as a string
     *
     * @return string
     */
    public function output()
    {
        return $this->mpdf->Output('', 'S');
    }

    /**
     * Stream the PDF to browser
     *
     * @param string $filename
     * @return void
     */
    public function stream($filename = 'document.pdf')
    {
        $this->mpdf->Output($filename, 'I');
    }

    /**
     * Download the PDF
     *
     * @param string $filename
     * @return void
     */
    public function download($filename = 'document.pdf')
    {
        $this->mpdf->Output($filename, 'D');
    }
}