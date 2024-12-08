<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*========== MY_MODEL - Controller extending CI_Model for common purposes ==========*/
/**
 * @property CI_Benchmark $benchmark
 * @property CI_Cache $cache
 * @property CI_Calendar $calendar
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_DB $db
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Input $input
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Output $output
 * @property CI_Session $session
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Form_validation $form_validation
 * @property CI_FTP $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Encryption $encryption
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Unit_test $unit_test
 * @property CI_Zip $zip
 * @property CI_Security $security
 * @property CI_Cart $cart
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Upload $upload
 */
class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
}

/*========== ELOQUENT_MODEL - Abstract model implementing core database operations in ORM style ==========*/
/**
 * @property string $tableName
 * @property string $primaryKey
 */
class ELOQUENT_Model extends MY_Model
{
    protected $tableName = "";
    protected $primaryKey = "";
    private $requiredProperties = ["tableName", "primaryKey"];

    public function __construct()
    {
        $missingProperties = array_filter(
            $this->requiredProperties,
            fn($property) => empty ($this->{$property})
        );

        if ($missingProperties)
            throw new LogicException(
                "Configuration error in "
                . get_class($this)
                . ": Missing required properties: "
                . implode(
                    ", ",
                    array_map(fn($property) => "\"$property\"", $missingProperties)
                )
                . "."
            );
    }

    public function all()
    {
        return $this->db
            ->get($this->tableName)
            ->result_array();
    }

    public function find($id)
    {
        return $this->db
            ->get_where($this->tableName, [$this->primaryKey => $id])
            ->row_array();
    }

    public function create($data)
    {
        return $this->db
            ->insert($this->tableName, $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->update($this->tableName, $data, [$this->primaryKey => $id]);
    }

    public function delete($id)
    {
        return $this->db
            ->delete($this->tableName, [$this->primaryKey => $id]);
    }

    public function count()
    {
        return $this->db
            ->count_all($this->tableName);
    }

    public function truncate()
    {
        return $this->db
            ->truncate($this->tableName);
    }
}