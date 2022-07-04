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
            throw new \Exception('File is not found!');
        }
        $this->file = $file;
        $this->openedFile = fopen($this->file, 'r');
    }

    public function __destruct()
    {
        fclose($this->openedFile);
    }

    public function current()
    {
        return $this->lineValue = fgets($this->openedFile);
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
        return !feof($this->openedFile);
    }

    public function rewind()
    {
        rewind($this->openedFile);
        $this->line = 1;
    }
}