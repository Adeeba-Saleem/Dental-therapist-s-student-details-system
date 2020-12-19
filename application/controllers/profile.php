<?php 

class profile extends framework {

    public function __construct()
    {
      if(!$this->getSession('userId')){

        $this->redirect("accountController/loginForm");

      }
       $this->helper("link");
       $this->profileModel = $this->model("profileModel"); 
    }
    public function index(){
     $userId = $this->getSession('userId');
      $data = $this->profileModel->getData($userId);
 
      $this->view("profile", $data);

    }
    public function studentprofile(){
      $userId = $this->getSession('userId');
      $data = $this->profileModel->getStudentData($userId);
      $this->view("studentprofile",$data);
    }

    public function fruitForm(){
      $this->view("addFruit");
    }

    public function detailsForm(){
      $this->view("addDetails");
    }
    public function detailsStore(){

      $detailsData = [

        'name'              => $this->input('name'),
        'grade'             => $this->input('grade'),
        'schoolName'        => $this->input('schoolName'),
        'month'             => $this->input('month'),
        'disease'           => $this->input('disease'),
        'nameError'         =>'',
        'gradeError'        =>'',
        'schoolNameError'   =>'',
        'monthError'        =>'',
        'diseaseError'      =>''
      ];

      if (empty($detailsData['name'])) {
         $detailsData['nameError'] = "Name is required";
      }
      if (empty($detailsData['grade'])) {
          $detailsData['gradeError'] = "Grade is required";
      }
      if (empty($detailsData['schoolName'])) {
          $detailsData['schoolNameError'] = "School name is required";
      }
      if (empty($detailsData['month'])) {
          $detailsData['monthError'] = "Month is required";
      }
      if (empty($detailsData['disease'])) {
          $detailsData['diseaseError'] = "Disease is required";
      }

      if (empty($detailsData['nameError']) && empty($detailsData['gradeError']) && empty($detailsData['schoolNameError']) && empty($detailsData['monthError']) && empty($detailsData['diseaseError'])) {
         
         $data = [$detailsData['name'], $detailsData['grade'],$detailsData['schoolName'],$detailsData['month'],$detailsData['disease'],$this->getSession('userId')];
        if($this->profileModel->addDetails($data)){
                $this->setFlash("StudentAdded", "Your student details has been added successfuly");
                $this->redirect("profile/studentprofile");
        }

      }else{
        $this->view("addDetails",$detailsData);
      }

    }


    public function fruitStore(){
      
      $fruitData = [

       'name'           => $this->input('name'),
       'price'          => $this->input('price'),
       'quality'        => $this->input('quality'),
       'nameError'      => '',
       'priceError'     => '',
       'qualityError'   => ''

      ];

      if(empty($fruitData['name'])){
        $fruitData['nameError'] = "Name is required";
      }
      if(empty($fruitData['price'])){
        $fruitData['priceError'] = "Price is required";
      }
      if(empty($fruitData['quality'])){
        $fruitData['qualityError'] = "Quality is required";
      }

      if(empty($fruitData['nameError']) && empty($fruitData['priceError']) && empty($fruitData['qualityError'])){

        $data = [$fruitData['name'], $fruitData['price'], $fruitData['quality'], $this->getSESSION('userId')];
         if($this->profileModel->addFruit($data)){
                $this->setFlash("fruitAdded", "Your fruit has been added successfuly");
                $this->redirect("profile/index");
         }


      } else {
        $this->view("addFruit", $fruitData);
      }

    }

    public function edit_fruit($id){
      
      $userId = $this->getSession('userId');
      $fruitEdit = $this->profileModel->edit_data($id, $userId);
      $data = [

        'data'    => $fruitEdit,
        'nameError' => '',
        'priceError' => '',
        'qualityError' => ''

      ];
      $this->view("edit_fruit", $data);

    }

    public function edit_details($id){

      $userId = $this->getSession('userId');
      $detailsEdit = $this->profileModel->edit_student_data($id,$userId);  
      $data = [
        'data'              =>$detailsEdit,
        'nameError'         =>'',
        'gradeError'        =>'',
        'schoolNameError'   =>'',
        'monthError'        =>'',
        'diseaseError'      => ''
      ];
      $this->view("edit_details",$data);
    }

    public function updateDetails(){

      $id = $this->input('hiddenId');
      $userId = $this->getSession('userId');
      $detailsEdit = $this->profileModel->edit_student_data($id,$userId);  
       $detailsData = [

        'name'              => $this->input('name'),
        'grade'             => $this->input('grade'),
        'schoolName'        => $this->input('schoolName'),
        'month'             => $this->input('month'),
        'disease'           => $this->input('disease'),
        'data'              => $detailsEdit,
        'hiddenId'          => $this->input('hiddenId'),
        'nameError'         =>'',
        'gradeError'        =>'',
        'schoolNameError'   =>'',
        'monthError'        =>'',
        'diseaseError'      =>''
      ];

      if (empty($detailsData['name'])) {
         $detailsData['nameError'] = "Name is required";
      }
      if (empty($detailsData['grade'])) {
          $detailsData['gradeError'] = "Grade is required";
      }
      if (empty($detailsData['schoolName'])) {
          $detailsData['schoolNameError'] = "School name is required";
      }
      if (empty($detailsData['month'])) {
          $detailsData['monthError'] = "Month is required";
      }
      if (empty($detailsData['disease'])) {
          $detailsData['diseaseError'] = "Disease is required";
      }

      if (empty($detailsData['nameError']) && empty($detailsData['gradeError']) && empty($detailsData['schoolNameError']) && empty($detailsData['monthError']) && empty($detailsData['diseaseError'])){

        $updateData = [$detailsData['name'], $detailsData['grade'], $detailsData['schoolName'],$detailsData['month'], $detailsData['disease'], $detailsData['hiddenId'], $userId];

        if($this->profileModel->updateDetails($updateData)){

          $this->setFlash('detailsUpdated', 'Your student details has been updated successfully');
          $this->redirect("profile/studentprofile");

        }

      }else{
        $this->view("edit_details",$detailsData);
      }

    }

   

    public function updateFruit(){

      $id = $this->input('hiddenId');
      $userId = $this->getSession('userId');
      $fruitEdit = $this->profileModel->edit_data($id, $userId);
      $fruitData = [

        'name'           => $this->input('name'),
        'price'          => $this->input('price'),
        'quality'        => $this->input('quality'),
        'data'           => $fruitEdit,
        'hiddenId'       => $this->input('hiddenId'),
        'nameError'      => '',
        'priceError'     => '',
        'qualityError'   => ''
        
 
       ];
 
       if(empty($fruitData['name'])){
         $fruitData['nameError'] = "Name is required";
       }
       if(empty($fruitData['price'])){
         $fruitData['priceError'] = "Price is required";
       }
       if(empty($fruitData['quality'])){
         $fruitData['qualityError'] = "Quality is required";
       }

       if(empty($fruitData['nameError']) && empty($fruitData['priceError']) && empty($fruitData['qualityError'])){
       
        $updateData = [$fruitData['name'], $fruitData['price'], $fruitData['quality'], $fruitData['hiddenId'], $userId];

        if($this->profileModel->updateFruit($updateData)){

          $this->setFlash('fruitUpdated', 'Your fruit record has been updated successfully');
          $this->redirect("profile/index");

        }

       } else {
        $this->view("edit_fruit", $fruitData);
       }

    }

    public function delete($id){

      $userId = $this->getSession('userId');
      if($this->profileModel->deleteFruit($id, $userId)){
        $this->setFlash('deleted', 'Your fruit has been deleted successfully');
        $this->redirect('profile/index');
      }

    }

    public function delete_details($id){
      $userId = $this->getSession('userId');
      if($this->profileModel->deleteDetails($id,$userId)){
        $this->setFlash('deleteData',"Your student data has been deleted successfully");
        $this->redirect('profile/studentprofile');
      }
    }



    public function logout(){

        $this->destroy();
        $this->redirect("accountController/loginForm");

    }

}


?>