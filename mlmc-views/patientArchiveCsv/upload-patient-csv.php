 <?php

 class csv extends mysqli
 {
    private $state_csv = false;

    public function __construct()
    {
        parent::__construct("localhost","root","","metro_lipa_db");
        if($this->connect_error){
            echo "Fail to connect to Database : ". $this->connect_error;
        }
    }

    public function import($file)
    {
        $flag = true;
        $file = fopen($file,'r');
        while($row = fgetcsv($file)){
            if($flag) { $flag = false; continue; }
            $value = "'" . implode("','", $row) ."'";
           
            $query = "INSERT INTO patients_archive(ArchiveID,AdmissionDate,AdmissionTime,FirstName,MiddleName,LastName,Province,City,Brgy,CompleteAddress,latcoor,longcoor,Gender,Age,CivilStatus,Birthdate,Contact,Occupation,Citizenship,MedicalID)
            VALUES(". $value . ")";

            if($this->query($query)){
                $this->state_csv = true;
            }else{
                $this->state_csv = false;
            }
            
        }
    }
 }

 ?>