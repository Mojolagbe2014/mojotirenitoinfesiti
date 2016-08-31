<?php
/**
 * Description of CourseCategory
 *
 * @author Kaiste
 */
class CourseCategory implements ContentManipulator{
    private $id;
    private $name;
    private $description;
    private $image;
    private $dbObj;
    
    
    //Class constructor
    public function CourseCategory($dbObj) {
        $this->dbObj = $dbObj;
    }
    
    //Using Magic__set and __get
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
    
    /**  
     * Method that adds a course category into the database
     * @return JSON JSON encoded string/result
     */
    function add(){
        $sql = "INSERT INTO course_category (name, description, image) "
                ."VALUES ('{$this->name}','{$this->description}','{$this->image}')";
        if($this->notEmpty($this->name,$this->description,$this->image)){
            $result = $this->dbObj->query($sql);
            if($result !== false){ $json = array("status" => 1, "msg" => "Done, course category successfully added!"); }
            else{ $json = array("status" => 2, "msg" => "Error adding course category! ".  mysqli_error($this->dbObj->connection)); }
        }
        else{ $json = array("status" => 3, "msg" => "Request method not accepted. All fields must be filled."); }
        
        $this->dbObj->close();//Close Database Connection
        header('Content-type: application/json');
        return json_encode($json);
    }

    /** 
     * Method for deleting a course category
     * @return JSON JSON encoded result
     */
    public function delete(){
        $sql = "DELETE FROM course_category WHERE id = $this->id ";
        if($this->notEmpty($this->id)){
            $result = $this->dbObj->query($sql);
            if($result !== false){ $json = array("status" => 1, "msg" => "Done, course category successfully deleted!"); }
            else{ $json = array("status" => 2, "msg" => "Error deleting course category! ".  mysqli_error($this->dbObj->connection));  }
        }
        else{ $json = array("status" => 3, "msg" => "Request method not accepted."); }
        $this->dbObj->close();//Close Database Connection
        header('Content-type: application/json');
        return json_encode($json);
    }

    /** Method that fetches course categories from database for JQuery Data Table
     * @param string $column Column name of the data to be fetched
     * @param string $condition Additional condition e.g category_id > 9
     * @param string $sort column name to be used as sort parameter
     * @return JSON JSON encoded coursecategory details
     */
    public function fetchForJQDT($draw, $totalData, $totalFiltered, $customSql="", $column="*", $condition="", $sort="id"){
        $sql = "SELECT $column FROM course_category ORDER BY $sort";
        if(!empty($condition)){$sql = "SELECT $column FROM course_category WHERE $condition ORDER BY $sort";}
        if($customSql !=""){ $sql = $customSql; }
        $data = $this->dbObj->fetchAssoc($sql);
        $result =array(); 
        if(count($data)>0){
            foreach($data as $r){ 
                $multiActionBox = '<input type="checkbox" class="multi-action-box" data-id="'.$r['id'].'" data-name="'.$r['name'].'" data-image="'.$r['image'].'" />';
                $result[] = array(utf8_encode($multiActionBox), $r['id'], utf8_encode($r['name']), utf8_encode($r['description']), utf8_encode('<img src="../media/category/'.utf8_encode($r['image']).'" width="60" height="50" alt="Pix">'), utf8_encode(' <button data-name="'.$r['name'].'" data-id="'.$r['id'].'"  data-description="'.$r['description'].'"  data-image="'.$r['image'].'" class="btn btn-info btn-small edit-category"  title="Edit"><i class="btn-icon-only icon-pencil"> </i></button> <button data-name="'.$r['name'].'"   data-image="'.$r['image'].'" data-id="'.$r['id'].'" class="btn btn-danger btn-small delete-category" title="Delete"><i class="btn-icon-only icon-trash"> </i></button>'));
            }
            $json = array("status" => 1,"draw" => intval($draw), "recordsTotal"    => intval($totalData), "recordsFiltered" => intval($totalFiltered), "data" => $result);
        } 
        else{ $json = array("status" => 2, "msg" => "Necessary parameters not set. Or empty result. ".mysqli_error($this->dbObj->connection), "draw" => intval($draw),  "recordsTotal"    => intval($totalData), "recordsFiltered" => intval($totalFiltered), "data" => false); }
        $this->dbObj->close();
        header('Content-type: application/json');
        return json_encode($json);
    }
    
    /** Method that fetches course categories from database
     * @param string $column Column name of the data to be fetched
     * @param string $condition Additional condition e.g category_id > 9
     * @param string $sort column name to be used as sort parameter
     * @return JSON JSON encoded coursecategory details
     */
    public function fetch($column="*", $condition="", $sort="id"){
        $sql = "SELECT $column FROM course_category ORDER BY $sort";
        if(!empty($condition)){$sql = "SELECT $column FROM course_category WHERE $condition ORDER BY $sort";}
        $data = $this->dbObj->fetchAssoc($sql);
        $result =array(); 
        if(count($data)>0){
            foreach($data as $r){
                $result[] = array("id" => $r['id'], "name" =>  utf8_encode($r['name']), "description" =>  utf8_encode($r['description']), "image" =>  utf8_encode($r['image']));
            }
            $json = array("status" => 1, "info" => $result);
        } 
        else{ $json = array("status" => 2, "msg" => "Necessary parameters not set. Or empty result. ".mysqli_error($this->dbObj->connection)); }
        $this->dbObj->close();
        header('Content-type: application/json');
        return json_encode($json);
    }
    
    /** Method that fetches course categories from database
     * @param string $column Column name of the data to be fetched
     * @param string $condition Additional condition e.g category_id > 9
     * @param string $sort column name to be used as sort parameter
     * @return Array Category list
     */
    public function fetchRaw($column="*", $condition="", $sort="id"){
        $sql = "SELECT $column FROM course_category ORDER BY $sort";
        if(!empty($condition)){$sql = "SELECT $column FROM course_category WHERE $condition ORDER BY $sort";}
        $result = $this->dbObj->fetchAssoc($sql);
        return $result;
    }

    /**
     * fetchChildren() fetches each of the categories with their corresponding children
     * @return JSON Object Array of Courses, categories and lessons
     */
    public function fetchChildren() {
        $result = array(); 
        $data = $this->dbObj->fetchAssoc("SELECT * FROM course_category ");
        foreach ($data as $r) {  
            if(count(Course::fetchAsChildren($this->dbObj, $r['id']))>0) $result[] = array('title'=> $r['name'], "folder" => true, "extraClasses" => "category", "children" => Course::fetchAsChildren($this->dbObj, $r['id']));
            else $result[] = array('title'=> $r['name'], "folder" => true, "extraClasses" => "category");
        }
        $json = $result;
        $this->dbObj->close();
        header('Content-type: application/json');
        return json_encode($json);
    }
    
    /** Empty string checker  
     * @return Booloean True|False
     */
    public function notEmpty() {
        foreach (func_get_args() as $arg) {
            if (empty($arg)) { return false; } 
            else {continue; }
        }
        return true;
    }
    
    /** Method that update single field detail of a course category
     * @param string $field Column to be updated 
     * @param string $value New value of $field (Column to be updated)
     * @param int $id Id of the post to be updated
     * @return JSON JSON encoded success or failure message
     */
    public static function updateSingle($dbObj, $field, $value, $id){
        $sql = "UPDATE course_category SET $field = '{$value}' WHERE id = $id ";
        if(!empty($id)){
            $result = $dbObj->query($sql);
            if($result !== false){ $json = array("status" => 1, "msg" => "Done, course category successfully update!"); }
            else{ $json = array("status" => 2, "msg" => "Error updating course category! ".  mysqli_error($dbObj->connection));   }
        }
        else{ $json = array("status" => 3, "msg" => "Request method not accepted."); }
        $dbObj->close();
        header('Content-type: application/json');
        return json_encode($json);
    }

    /** Method that update details of a course category
     * @return JSON JSON encoded success or failure message
     */
    public function update() {
        $sql = "UPDATE course_category SET name = '{$this->name}', description = '{$this->description}', image = '{$this->image}' WHERE id = $this->id ";
        if(!empty($this->id)){
            $result = $this->dbObj->query($sql);
            if($result !== false){ $json = array("status" => 1, "msg" => "Done, course category successfully update!"); }
            else{ $json = array("status" => 2, "msg" => "Error updating course category! ".  mysqli_error($this->dbObj->connection));   }
        }
        else{ $json = array("status" => 3, "msg" => "Request method not accepted."); }
        $this->dbObj->close();
        header('Content-type: application/json');
        return json_encode($json); 
    }

    /** getName() fetches the name of a course_category using the course_category $id
     * @param object $dbObj Database connectivity and manipulation object
     * @param int $id Category id of the category whose name is to be fetched
     * @return string Name of the category
     */
    public static function getName($dbObj, $id) {
        $thisCatName = '';
        $thisCatNames = $dbObj->fetchNum("SELECT name FROM course_category WHERE id = '{$id}' LIMIT 1");
        foreach ($thisCatNames as $thisCatNames) { $thisCatName = $thisCatNames[0]; }
        return $thisCatName;
    }
    
    /**
     * Method that returns count/total number of a particular course
     * @param Object $dbObj Datatbase connectivity object
     * @return int Number of courses
     */
    public static function getRawCount($dbObj, $dbPrefix){
        $tableName = $dbPrefix.'course_category';
        $sql = "SELECT * FROM $tableName ";
        $count = "";
        $result = $dbObj->query($sql);
        $totalData = mysqli_num_rows($result);
        if($result !== false){ $count = $totalData; }
        return $count;
    }
}
