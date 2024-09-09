

<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

if (!function_exists('addImageToExcel')) {
    function addImageToExcel($filePath, $imagePath, $cellCoordinates)
    {
        // Mevcut XLSM dosyasını yükleyin
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Resmi ekleyin
        $drawing = new Drawing();
        $drawing->setName('Image');
        $drawing->setDescription('Image Description');
        $drawing->setPath($imagePath);
        $drawing->setCoordinates($cellCoordinates); // Resmin eklenmesi istediğiniz hücrenin koordinatlarını belirtin
        $drawing->setWorksheet($sheet);

        // Dosyayı kaydedin
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filePath);
    }
}
