<?php
/**
* phpScan
*
* This is a PHP class for interacting with NAPS2 (Not Another PDF Scanner 2) console functionality.
* @package phpScan
* @category Library
* @version 1.0.0
* @link https://github.com/kuasarx/php-scan
* @license     MIT License
*
* 
* -----------------------------------------------------------------------
* 
* Developer: Juan Camacho
* Email: kuasarx@gmail.com
* 
* -----------------------------------------------------------------------
* 
* Usage:
* 
* // Create an instance of the phpScan class
* $naps2 = new PhpScan\phpScan();
*
* // Set the output file path
* $naps2->setOutput('/path/to/output.pdf');
*
* // Set other options as needed
* // $naps2->setEmail('filename.pdf');
* // $naps2->setImport('file1.pdf;file2.pdf');
* // $naps2->setCombineFiles('file1.pdf;file2.pdf', 'combined.pdf');
* // $naps2->setConvertFile('input.jpg', 'output.pdf');
* // $naps2->setTo('recipient@example.com');
* // $naps2->setCc('cc@example.com');
* // $naps2->setBcc('bcc@example.com');
* // $naps2->setSubject('Scanned Document');
* // $naps2->setBody('Please find the attached scanned document.');
* // $naps2->setAutoSend(true);
* // $naps2->setSilentSend(true);
* // $naps2->setOcrLanguage('eng');
* // $naps2->enableOcr();
* // $naps2->disableOcr();
* // $naps2->setProfile('Scanner Profile');
* // $naps2->setVerbose(true);
* // $naps2->setNumberOfScans(5);
* // $naps2->setDelay(5000);
* // $naps2->setForce(true);
* // $naps2->setSlice('1-3');
* // $naps2->setPdfTitle('My Document');
* // $naps2->setPdfAuthor('John Doe');
* // $naps2->setPdfSubject('Subject');
* // $naps2->setPdfKeywords('keyword1;keyword2');
* // $naps2->setPdfCompatibility('1.5');
* // $naps2->setJpegQuality(90);
* // $naps2->setTiffCompression('lzw');
* // $naps2->setInterleave('odd');
* // $naps2->setAltInterleave('even');
* // $naps2->setDeinterleave('odd');
* // $naps2->setAltDeinterleave('even');
* // $naps2->setReverse(true);
* // $naps2->setPlaceholders('n/a');
*
* // Build the command
* $command = $naps2->buildCommand();
* // Run the command
* $output = $naps2->scan();
* // Process the output as needed
*
* -----------------------------------------------------------------------
* 
* This library requires PHP 5.6 or above and Gammu installed and configured.
* 
* @package     SMS
* @category    Library
* @version     1.0.0
* @link        @link https://github.com/kuasarx/php-scan
* @license     MIT License
*/

namespace PhpScan;

class phpScan {
    private $options;
    private $commandRunner;

    public function __construct() {
        $this->options = [];
        $this->commandRunner = 'exec';
    }

    public function setOutput($path) {
        $this->options['output'] = $path;
    }

    public function setEmail($filename) {
        $this->options['email'] = $filename;
    }

    public function setImport($filenames) {
        $this->options['import'] = $filenames;
    }

    public function setCombineFiles($inputFiles, $outputFile) {
        $this->options['import'] = $inputFiles;
        $this->options['number'] = 0;
        $this->options['output'] = $outputFile;
    }

    public function setConvertFile($inputFile, $outputFile) {
        $this->options['import'] = $inputFile;
        $this->options['number'] = 0;
        $this->options['output'] = $outputFile;
    }

    public function setTo($addresses) {
        $this->options['to'] = $addresses;
    }

    public function setCc($addresses) {
        $this->options['cc'] = $addresses;
    }

    public function setBcc($addresses) {
        $this->options['bcc'] = $addresses;
    }

    public function setSubject($subject) {
        $this->options['subject'] = $subject;
    }

    public function setBody($body) {
        $this->options['body'] = $body;
    }

    public function setAutoSend($autoSend = true) {
        $this->options['autosend'] = $autoSend;
    }

    public function setSilentSend($silentSend = true) {
        $this->options['silentsend'] = $silentSend;
    }

    public function setOcrLanguage($languageCode) {
        $this->options['ocrlang'] = $languageCode;
        $this->options['enableocr'] = true;
    }

    public function enableOcr() {
        $this->options['enableocr'] = true;
    }

    public function disableOcr() {
        $this->options['disableocr'] = true;
    }

    public function setProfile($name) {
        $this->options['profile'] = $name;
    }

    public function setVerbose($verbose = true) {
        $this->options['verbose'] = $verbose;
    }

    public function setNumberOfScans($number) {
        $this->options['number'] = $number;
    }

    public function setDelay($delay) {
        $this->options['delay'] = $delay;
    }

    public function setForce($force = true) {
        $this->options['force'] = $force;
    }

    public function setSlice($slice) {
        $this->options['slice'] = $slice;
    }

    public function setPdfTitle($title) {
        $this->options['pdftitle'] = $title;
    }

    public function setPdfAuthor($author) {
        $this->options['pdfauthor'] = $author;
    }

    public function setPdfSubject($subject) {
        $this->options['pdfsubject'] = $subject;
    }

    public function setPdfKeywords($keywords) {
        $this->options['pdfkeywords'] = $keywords;
    }

    public function setPdfCompatibility($compatibility) {
        $this->options['pdfcompat'] = $compatibility;
    }

    public function setJpegQuality($quality) {
        $this->options['jpegquality'] = $quality;
    }

    public function setTiffCompression($compression) {
        $this->options['tiffcomp'] = $compression;
    }

    public function setInterleave($interleave) {
        $this->options['interleave'] = $interleave;
    }

    public function setAltInterleave($altInterleave) {
        $this->options['altinterleave'] = $altInterleave;
    }

    public function setDeinterleave($deinterleave) {
        $this->options['deinterleave'] = $deinterleave;
    }

    public function setAltDeinterleave($altDeinterleave) {
        $this->options['altdeinterleave'] = $altDeinterleave;
    }

    public function setReverse($reverse = true) {
        $this->options['reverse'] = $reverse;
    }

    public function setPlaceholders($placeholders) {
        $this->options['placeholders'] = $placeholders;
    }

    public function setCommandRunner($runner) {
        $allowedRunners = ['exec', 'shell_exec'];
        if (in_array($runner, $allowedRunners)) {
            $this->commandRunner = $runner;
        }
    }

    public function buildCommand() {
        $command = 'naps2.console';

        foreach ($this->options as $option => $value) {
            if (is_bool($value)) {
                if ($value) {
                    $command .= ' --' . $option;
                }
            } elseif (is_array($value)) {
                $command .= ' --' . $option . ' ' . implode(';', $value);
            } else {
                $command .= ' -' . substr($option, 0, 1);
                $command .= ' ' . escapeshellarg($value);
            }
        }

        return $command;
    }

    public function scan() {
        $command = $this->buildCommand();

        if ($this->commandRunner === 'exec') {
            exec($command, $output, $returnVar);
        } elseif ($this->commandRunner === 'shell_exec') {
            $output = shell_exec($command);
        }

        // Return the output or any other desired result
        return $output;
    }
}
