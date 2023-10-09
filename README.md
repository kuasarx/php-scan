# php-scan
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/kuasarx/php-scan/blob/main/LICENSE)

php-scan is a PHP class that provides a convenient wrapper for interacting with [NAPS2](https://www.naps2.com/) (Not Another PDF Scanner 2) console functionality.

Aditional info: [Command line usage](https://www.naps2.com/doc/command-line)

  
## [PHP Classes Innovation award Winner August 2023](https://www.phpclasses.org/browse/author/1482245.html)
<p align="center">

 <img width="200px" src="https://github.com/kuasarx/php-scan/assets/34275535/866802dd-1ac6-4f98-9d31-e907b3df6e8c" />  

</p>


## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Requirements](#requirements)

## Features

- Simplified PHP wrapper for NAPS2 console functionality.
- Set output file path and format for scanned documents.
- Specify email options to send scans as attachments.
- Import one or more PDF/image files to include in the output.
- Combine multiple files together into a single output file.
- Convert files between different formats.
- Set recipient(s), subject, and body for email sending.
- Enable or disable OCR (Optical Character Recognition) for PDF generation.
- Set scanning profile and verbosity level.
- Control the number of scans to perform and the delay between each scan.
- Force overwrite of existing files.
- Slice and select specific pages to scan.
- Set PDF metadata options such as title, author, subject, and keywords.
- Adjust JPEG quality for image conversion.
- Specify TIFF compression options.
- Control interleave and deinterleave options for scanning.
- Reverse the order of pages in the output.
- Set placeholders for missing metadata.
- Compatible with PHP 5.6 or above and NAPS2 installation.

## Installation

Install the package using [Composer](https://getcomposer.org/):

```shell
composer require kuasarx/php-scan
```
## Usage
```php
<?php

use PhpScan\phpScan;

// Create an instance of the phpScan class
$naps2 = new phpScan();

// Set the output file path
$naps2->setOutput('/path/to/output.pdf');

// Set other options as needed

// Set the email option to specify an email with the scan attached
$naps2->setEmail('filename.pdf');

// Set the import option to specify one or more PDF/image files to import
$naps2->setImport('file1.pdf;file2.pdf');

// Combine multiple files together into a single output file
$naps2->setCombineFiles('file1.pdf;file2.pdf', 'combined.pdf');

// Convert a file from one format to another
$naps2->setConvertFile('input.jpg', 'output.pdf');

// Set the email recipient(s)
$naps2->setTo('recipient@example.com');
$naps2->setCc('cc@example.com');
$naps2->setBcc('bcc@example.com');

// Set the email subject and body
$naps2->setSubject('Scanned Document');
$naps2->setBody('Please find the attached scanned document.');

// Set options for automatic email sending
$naps2->setAutoSend(true);
$naps2->setSilentSend(true);

// Set OCR language for PDF generation
$naps2->setOcrLanguage('eng');
$naps2->enableOcr();
$naps2->disableOcr();

// Set the scanning profile
$naps2->setProfile('Scanner Profile');

// Set verbosity to display progress information
$naps2->setVerbose(true);

// Set the number of scans to perform
$naps2->setNumberOfScans(5);

// Set the delay between each scan (in milliseconds)
$naps2->setDelay(5000);

// Set the force option to overwrite existing files
$naps2->setForce(true);

// Set the slice option to specify a range of pages to scan
$naps2->setSlice('1-3');

// Set PDF metadata options
$naps2->setPdfTitle('My Document');
$naps2->setPdfAuthor('John Doe');
$naps2->setPdfSubject('Subject');
$naps2->setPdfKeywords('keyword1, keyword2');
$naps2->setPdfCompatibility('1.5');

// Set JPEG quality for image conversion
$naps2->setJpegQuality(90);

// Set TIFF compression option
$naps2->setTiffCompression('lzw');

// Set interleave and deinterleave options
$naps2->setInterleave('odd');
$naps2->setAltInterleave('even');
$naps2->setDeinterleave('odd');
$naps2->setAltDeinterleave('even');

// Set the reverse option to reverse the order of pages
$naps2->setReverse(true);

// Set placeholders for missing metadata
$naps2->setPlaceholders('n/a');

// Build the command
$command = $naps2->buildCommand();

// Run the command
$output = $naps2->scan();

// Process the output as needed
```
## Requirements
- PHP 5.6 or above
- NAPS2 installed and configured

  
