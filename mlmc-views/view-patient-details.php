<?php include 'admission-header.php'; $id = $_GET['id']; ?>
<style>
    .selected {
        color: #800000;
        background-color: #F5F5F5;
        font-weight: bold;
    }
</style>

<ol class="breadcrumb">
    <li><a href="index.php">Home</a>
    </li>
    <li class="active"> <a href="#">View Patient Details</a>
    </li>
</ol>

<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">

    
    <br>
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>View Patient Details</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                                    <form class="grid-form" action="javascript:void(0)">
                                        <fieldset>
                                            <legend>Personal Details</legend>
                                            <div data-row-span="3">
                                                <div data-field-span="1">
                                                    <label>Firstname</label>
                                                    <input type="text" ng-model="temp">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Middlename</label>
                                                    <input type="text" ng-model="temp">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>lastname</label>
                                                    <input type="text" ng-model="temp">
                                                </div>
                                            </div>
                                            <div data-row-span="4">
                                                <div data-field-span="1">
                                                    <label>Gender</label>
                                                    <input type="text" ng-model="bp">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Civil Status</label>
                                                    <input type="text" ng-model="pr">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Birthdate</label>
                                                    <input type="text" ng-model="rr">
                                                </div>
                                                <div data-field-span="1">
                                                    <label>Contact No.</label>
                                                    <input type="text" ng-model="temp">
                                                </div>
                                            </div>
                                            <div data-row-span="3"> 
                                                    <div data-field-span="1">
                                                        <label>Province</label>
                                                        <input type="text" ng-model="temp">
                                                    </div>
                                                 
                                                    <div data-field-span="1">
                                                        <label>Citizenship</label>
                                                        <input type="text" ng-model="height">
                                                    </div>
                                                    <div data-field-span="1">
                                                        <label>Religion</label>
                                                        <input type="text" ng-model="height">
                                                    </div>
                                            </div>
                                            <div data-row-span="3"> 
                                                    <div data-field-span="1">
                                                        <label>City</label>
                                                        <input type="text" ng-model="weight">
                                                    </div>
                                                    <div data-field-span="2">
                                                        <label>Complete Address</label>
                                                        <input type="text" ng-model="weight">
                                                    </div>

                                            </div>
                                        </fieldset>
                                    </form>
                        </div>
                    <div class="panel-footer"></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Action Panel</h2>

                    </div>
                    <div class="panel-body">
                        <a href="#" ng-click="Add()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-info-alt"></i><span>&nbsp;&nbsp;Edit Details</span></a>
                        <a href="#" ng-click="Edit()" class="btn btn-default-alt btn-lg btn-block"><i class="fa fa-list-alt fa-fw"></i><span>&nbsp;&nbsp;Medical History</span></a>
                    </div>
                </div>
            </div>
          
            <!-- Error modal -->
            <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="alert alert-danger">
                        Select Bed record that you would like to apply an <a href="#" class="alert-link">Action.</a>
                    </div>
                </div>
            </div>
            <!--/ Error modal -->
            <!-- Edit Error modal -->
            <div class="modal fade" id="EditErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="alert alert-danger">
                        <a href="#" class="alert-link">Occupied</a> records are unable to edit.
                    </div>
                </div>
            </div>
            <!--/ Edit Error modal -->
        </div>
    </div>

    <script>
        var fetch = angular.module('myApp', []);


        fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {

            $scope.admissionid = "<?php echo $id; ?>";

        }]);
    </script>
</div>
<?php include 'footer.php'?>