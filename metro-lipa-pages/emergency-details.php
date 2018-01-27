<?php include 'admin-header.php'; 

$_SESSION['id'] = $_GET['id'];
include '../assets/getData/get-patient-details.php';

?>

<div ng-app="myApp" ng-controller="myCtrl">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Emergency Details</h3>
            </div>
        </div>  
    </div>
    <div class="col-lg-3">
                                        <div class="panel-body">
                                        <?php 
                                        $id = $qrr . '.png';
                                        $dir = "qr-generator/temp/";//the path to your folder
                                        
                                        
                                        // Open a directory, and read its contents
                                        if (is_dir($dir)){
                                            if ($dh = opendir($dir)){
                                                while (($file = readdir($dh)) !== false){
                                                    if($id == $file){
                                                        echo "&emsp;&emsp;&emsp;<img src='$dir/$id' alt='QRcpde'>";
                                                    }

                                                }
                                                closedir($dh);
                                            }
                                        }         
                                        ?>
                                        </div>
                                    </div>
    <script>
        var app = angular.module('myApp', ['ui.mask']);
            app.controller('myCtrl', function($scope, $window, $http) {
            
            $scope.firstname = "<?php echo $firstname; ?>"
            $scope.middlename = "<?php echo $middlename; ?>" 
            $scope.lastname = "<?php echo $lastname; ?>"
            $scope.birthdate = "<?php echo $birthdate; ?>"
            $scope.contact = "<?php echo $contact; ?>" 
            $scope.province = "<?php echo $province; ?>"
            $scope.city = "<?php echo $city; ?>"
            $scope.civilstatus = "<?php echo $civilstatus; ?>" 
            $scope.gender = "<?php echo $gender; ?>"
            $scope.age = "<?php echo $age; ?>"

            });
                function goBack() {
                    window.history.back();
            }
    </script>
</div>
<?php include 'admin-footer.php' ?>