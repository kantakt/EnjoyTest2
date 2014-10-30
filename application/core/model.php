<?


class Model
{
       var $dbh;
        var $db_name;
        var $db_pass;
      var $db_user;

        function __construct(){
            include_once('config.php');
            $this->db_name = $db_name;
            $this->db_user = $db_user;
            $this->db_pass = $db_pass;

            echo $this->db_name;
        }

        public function db_init()
        {
            try {
                $this->dbh = new PDO('mysql:host=127.0.0.1;dbname='.$this->db_name  , $this->db_user, $this->db_pass);
                return $dbh;
                }
            catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function get_data()
        {

        }
}

?>