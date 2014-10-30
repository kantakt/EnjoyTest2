<?

class Model_Main extends Model
{
    public function check_pass($pass)
    {
        try {
            $ret =  $this->dbh->query("SELECT id from pass WHERE password='".$pass."'");
            if($ret === false) {
                echo "\nPDO::errorInfo():\n";
                print_r($this->dbh->errorInfo());
                die();
            }


            if($ret->rowCount()===0) {
                // Нет такого пароля - добавляем его в db

                $stmt = $this->dbh->prepare("INSERT INTO pass (password) VALUES (:pass)");
                $stmt->bindParam(':pass', $pass);

                 $stmt->execute();

                return true;
            }
            else return false;

        }
                catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }

    }
}

?>