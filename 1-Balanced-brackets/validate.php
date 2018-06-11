<?php

class Brackets {

    private function __construct()
    {
        //
    }

    public static function Validate($brackets)
    {
        return (boolean) preg_match('~(\((?1)*+\)|\[(?1)*+]|{(?1)*+})*+\z~A',$brackets);
    }
}

class Log {

    protected $filedata, $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->filedata = file($this->filename);
    }

    public function add($line)
    {
        $date = '['.date('y:m:d h:i:s').']';
        $line = $date . ': '. $line. PHP_EOL;
        array_push($this->filedata, $line);
        return $this;
    }

    public function save()
    {
        file_put_contents($this->filename, $this->filedata);
        return $this;
    }
}

if (!isset($_GET['brackets']))
    die('invalid parameters!');

$b = $_GET['brackets'];

$isValid = Brackets::Validate($b);

$log = new Log('entries.log');
$line = $b . ($isValid ? ' is valid' : ' is not valid');
$log->add($line)->save();

header('Location: index.php');