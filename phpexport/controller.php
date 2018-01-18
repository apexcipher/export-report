<?php

include_once 'modal.php';

/**
 *
 */
class GenerateFormat
{

    /**
     * @param $format
     */
    public function __construct($format = "", $data)
    {
        $this->informat($format, $data);
    }

    /**
     * @param $format
     */
    public function informat($ExportType = '', $data)
    {
        if (isset($ExportType)) {

            switch ($ExportType) {
                case "export-to-csv":
                    // Submission from
                    $filename = $ExportType . ".csv";
                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                    header("Content-type: text/csv");
                    header("Content-Disposition: attachment; filename=\"$filename\"");
                    $this->ExportCSVFile($data);
                    // $ExportType = '';
                    exit();
                case "export-to-excel":
                    // Submission from
                    $filename = $_POST["ExportType"] . ".xls";
                    header("Content-Type: application/vnd.ms-excel");
                    header("Content-Disposition: attachment; filename=\"$filename\"");
                    $this->ExportFile($data);
                    // $_POST["ExportType"] = '';
                    exit();
                default:
                    die("Unknown action : " . $ExportType);
                    break;
            }
        }

    }
    /**
     * @param $records
     */
    /**
     * @param $records
     */
    public function ExportCSVFile($records)
    {
        // create a file pointer connected to the output stream
        $fh      = fopen('php://output', 'w');
        $heading = false;
        if (!empty($records)) {
            foreach ($records as $row) {
                if (!$heading) {
                    // output the column headings
                    fputcsv($fh, array_keys($row));
                    $heading = true;
                }
                // loop over the rows, outputting them
                fputcsv($fh, array_values($row));

            }
        }

        fclose($fh);
    }

    public function ExportFile($records)
    {
        $heading = false;
        if (!empty($records)) {
            foreach ($records as $row) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                }
                echo implode("\t", array_values($row)) . "\n";
            }
        }

        exit;
    }

}

echo $_POST['ExportType'];
$res = new GenerateFormat($_POST['ExportType'],$data);
