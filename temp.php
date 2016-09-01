<div class="course-details">
                <?php 
                $nums = 1; $addStyles = '';
                foreach ($settingObj->fetchRaw("*", " name LIKE 'THE_PROGRAM_MENU%' ", " name ASC ") as $setting) {
                        $settingData = array('name' => 'name', 'value' => 'value');
                        foreach ($settingData as $key => $value){
                            switch ($key) {  default     :  $settingObj->$key = $setting[$value]; break; }
                        }
                        $secondPart = @explode(" ", trim(stripcslashes(strtolower(strip_tags($settingObj->value)))))[1] ? explode(" ", trim(stripcslashes(strtolower(strip_tags($settingObj->value)))))[1] : trim(stripcslashes(strtolower(strip_tags($settingObj->value))));
                        $newValue = $nums==1 ? StringManipulator::slugify(strip_tags($settingObj->value)) : $secondPart."-of-courses";
                ?>
                <div class="container <?php echo $newValue; ?>">
                        <div class="row">
                            <?php echo Setting::getValue($dbObj, str_replace("MENU", "CONTENT", $settingObj->name)) ? Setting::getValue($dbObj, str_replace("MENU", "CONTENT", $settingObj->name)) : ''; ?>
                        </div>
                  <!-- /.row -->
                </div><?php $nums++; } ?>
            </div>