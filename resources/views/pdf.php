<?php

if(count($argv) != 3)
{
   echo "Please pass input file name and output file name.\n";
   return;
}
$inputFileName = realpath($argv[1]);
if(!file_exists(dirname($argv[2])))
{
   echo "Invalid output file name.\n";
	return;
}
$outputFileName = rtrim(realpath(dirname($argv[2])), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . basename($argv[2]);

$printer = new BCL\easyPDF\Printer\Printer();
try
{
   $printjob = $printer->getPrintJob();
   $printerSettings = $printer->getPrinterSetting();
   $printerSettings->setLayoutPaperSize(BCL\easyPDF\Printer\prnPaperSize::PRN_PAPER_A4);
   $printerSettings->setLayoutPaperOrientation(BCL\easyPDF\Printer\prnPaperOrientation::PRN_PAPER_ORIENT_PORTRAIT);
   $printerSettings->setLayoutGraphicResolution(600);
   $printerSettings->setLayoutScaling(100);
   $printerSettings->setLayoutPrintColorType(BCL\easyPDF\Printer\prnPrintColorType::PRN_PRINT_COLOR_COLOR);
   $printerSettings->Save();
   $pdfSettings = $printjob->getPDFSetting();
   $pdfSettings->setFontEmbedding(BCL\easyPDF\Printer\prnFontEmbedding::PRN_FONT_EMBED_NONE);
   $pdfSettings->setFontEmbedAsType0(false);
   $pdfSettings->setImageCompression(BCL\easyPDF\Printer\prnImageCompression::PRN_IMAGE_COMPRESS_JPEG);
   $pdfSettings->setImageJPEGQuality(85);
   $pdfSettings->setImageDownsizing(true);
   $pdfSettings->setImageDownsizeResolution(300);
   $pdfSettings->setStamp(0, false);
   $pdfSettings->setStamp(1, false);
   $pdfSettings->setStamp(2, false);
   $pdfSettings->setStamp(3, false);
   $pdfSettings->setWatermark(0, false);
   $pdfSettings->setWatermark(1, false);
   $pdfSettings->setWatermark(2, false);
   $pdfSettings->setWatermark(3, false);
   $pdfSettings->setViewerPanel(BCL\easyPDF\Printer\prnViewerPanel::PRN_VIEWER_PANEL_NONE);
   $pdfSettings->setViewerPageLayout(BCL\easyPDF\Printer\prnViewerPageLayout::PRN_VIEWER_PAGE_LAYOUT_DEFAULT);
   $pdfSettings->setViewerMagnification(BCL\easyPDF\Printer\prnViewerMagnification::PRN_VIEWER_MAGNIFICATION_DEFAULT);
   $pdfSettings->setViewerPrintScaling(BCL\easyPDF\Printer\prnViewerPrintScaling::PRN_VIEWER_PRINT_SCALING_DEFAULT);
   $pdfSettings->setViewerHideMenuBar(false);
   $pdfSettings->setViewerHideToolBar(false);
   $pdfSettings->setViewerHideWinControls(false);
   $pdfSettings->setSignature(false);
   $pdfSettings->setStandardPdfAConformance(BCL\easyPDF\Printer\prnPdfAConformance::PRN_PDFA_CONFORM_NONE);
   $pdfSettings->setStandardPdfXConformance(BCL\easyPDF\Printer\prnPdfXConformance::PRN_PDFX_CONFORM_NONE);
   $pdfSettings->setStandardCmykProfile("");
   $printjob->PrintOut($inputFileName, $outputFileName);
}
catch(BCL\easyPDF\Printer\PrinterException $ex)
{
   echo $ex->getMessage(), "\n";
}
finally
{
   $printer = null;
}
?>
