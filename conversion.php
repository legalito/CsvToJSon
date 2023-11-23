<?php
class conversion{

    private $file;
    public $filename;
    private $json;
    private $dataArray = [];

    public function __construct($fileImport) {
        $this->getFile($fileImport);
    }

    public function getFile($fileImport){
        $extension = strstr(basename($fileImport['name'],".csv"),".");
        if($extension == ""){
            $this->filename = basename($fileImport['name'],".csv");
            $this->file = fopen($fileImport['tmp_name'], "r");
            $this->convertCSV();
        }else {
            $this->filename = basename($fileImport['name'],".xml");
            $this->convertXML($fileImport['tmp_name']);
        }
    }

    
    public function convertCSV(){
        $row = [];
        while (($row = fgetcsv($this->file)) !== false) {
            $rows[] = $row;
        }
        fclose($this->file);
        $headers = array_shift($rows);
        foreach ($rows as $row) {
            $this->dataArray[] = array_combine($headers, $row);
        }
        $this->createJSON();
    }  

    public function convertXML($filexml){
        $this->dataArray = simplexml_load_file($filexml);  
        $this->createJSON();      
    }

    public function createJSON(){
        $this->json = json_encode($this->dataArray, JSON_PRETTY_PRINT);
        file_put_contents('FileConvert/'.$this->filename . '.json', $this->json);
    }



}


?>