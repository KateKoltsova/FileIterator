<?php

namespace Koltsova\FileIterator;

class FileIterator implements \Iterator
{
    private $file;
    private $openedFile;
    private $line;
    private $lineValue;

    public function __construct($file)
    {
        if (!file_exists($file)) {
            throw new \Exception('File ' . $this->file . ' is not found');
            die();
        } else {
            $this->file = $file;
        }
    }

    public function current()
    {
        $this->lineValue = fgets($this->openedFile);
        if (mb_strlen($this->lineValue) > 1) {
            $result = 'Line ' . $this->line . ' consist ' . $this->lineValue;
        } else {
            $result = 'Line ' . $this->line . " is empty!\r\n";
        }
        return $result;
    }

    public function next()
    {
        return $this->line++;
    }

    public function key()
    {
        return $this->line;
    }

    public function valid()
    {
        if (feof($this->openedFile)) {
            fclose($this->openedFile);
            return false;
        } else {
            return true;
        }
    }

    public function rewind()
    {
        $this->openedFile = fopen($this->file, 'r');
        $this->line = 1;
    }
}