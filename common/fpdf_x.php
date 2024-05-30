<?php
require('fpdf.php');

class cPDFx extends cFPDF
{
	var $logo;				 // Logo to display in header
	function PDFx($orientation='P', $unit='mm', $size='A4')
	{
		$this->SetAutoPageBreak(true, 0);
		$this->FPDF($orientation, $unit, $size);
	}
	
	function SetLogo($logo)
	{
		if (isset($logo))
			$this->logo = $logo;
	}
	
	// Page header
	function Header()
	{
		// Logo
		if (isset($this->logo))
		$this->Image($this->logo,10,6,30);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(50,10,$this->title,1,0,'C');
		// Line break
		$this->Ln(20);
	}
	
	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	
	// Load data
	function LoadData($file)
	{
		// Read file lines
		$lines = file($file);
		$data = array();
		foreach($lines as $line)
		{
			$data[] = explode(';',trim($line));
			$data[] = explode(';',trim($line));
			$data[] = explode(';',trim($line));
			$data[] = explode(';',trim($line));
				
		}
		return $data;
	}

	// Simple table
	function BasicTable($header, $data)
	{
		// Header
		foreach($header as $col)
		$this->Cell(40,7,$col,1);
		$this->Ln();
		// Data
		foreach($data as $row)
		{
			foreach($row as $col)
			$this->Cell(40,6,$col,1);
			$this->Ln();
		}
	}

	// Better table
	function ImprovedTable($header, $data)
	{
		// Column widths
		$w = array(40, 35, 40, 45);
		// Header
		for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		// Data
		foreach($data as $row)
		{
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
		}
    // Closing line
		$this->Cell(array_sum($w),0,'','T');
	}

	// Colored table
	function FancyTable($header, $data)
	{
	// Colors, line width and bold font
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		// Header
		for($i=0;$i<count($header);$i++)
		{
			$this->Cell($header[$i]["width"],7,$header[$i]["txt"],1,0,'C',true);
		}
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = false;
		
		foreach($data as $row)
		{
			$c=0;
			foreach ($row as $cell)
			{
				$this->Cell($header[$c]["width"],6,$cell,'LR',0,'L',$fill);
				$c++;
			}
		$this->Ln();
		$fill = !$fill;
		}
		// Closing line
		if (isset($header[$c]["width"]))
			$this->Cell(array_sum($header[$c]["width"]),0,'','T');
		}
	}
