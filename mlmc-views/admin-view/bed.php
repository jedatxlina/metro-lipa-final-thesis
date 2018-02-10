<?php include 'admin-header.php' ?>
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
    <li class="active"> <a href="bed.php">Bed Specifications</a>
    </li>
</ol>

<div class="container-fluid" ng-app="myApp" ng-controller="userCtrl">

    <div class="row">

    </div>
    <br>
    <div data-widget-group="group1">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>BED</h2>
                        <div class="panel-ctrls"></div>
                    </div>
                    <div class="panel-body">
                        <table id="table_info" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Bed No.</th>
                                    <th>Room Type</th>
                                    <th>Rate</th>
                                    <th>Floor</th>
                                    <th>Room</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="bed in beds" ng-class="{'selected': bed.BedID == selectedRow}" ng-click="setClickedRow(bed.BedID,bed.Status)">
                                    <td>{{bed.BedID}}</td>
                                    <td>{{bed.RoomType}}</td>
                                    <td>{{bed.Rate}}</td>
                                    <td>{{bed.Floor}}</td>
                                    <td>{{bed.Room}}</td>
                                    <td>{{bed.Status}}</td>
                                </tr>
                            </tbody>
                        </table>
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
                        <a href="#" ng-click="Add()" class="btn btn-default-alt btn-lg btn-block"><i class="fa fa-list-alt fa-fw"></i><span>&nbsp;&nbsp;Add Bed</span></a>
                        <a href="#" ng-click="Edit()" class="btn btn-default-alt btn-lg btn-block"><i class="ti ti-info-alt"></i><span>&nbsp;&nbsp;Edit Bed</span></a>
                    </div>
                </div>
            </div>
          
            <!--/ Edit modal -->
            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Edit Bed</h4>
                        </div>
                        <div class="modal-body">
                            <form ng-repeat="getbed in getbedid">
                                <div class="form-group">
                                    <label>Bed ID </label>
                                    <input type="text" ng-model="bedid" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Room Type </label>
                                    <select ng-model="$parent.BType" class="form-control" ng-init="$parent.BType=getbed.RoomType" disabled>
                                        <option value="" disabled selected>Select</option>
                                        <option value="Single Deluxe">Single Deluxe</option>
                                        <option value="Two-Bedded">Two-Bedded</option>
                                        <option value="Four-Bedded">Four-Bedded</option>
                                        <option value="Ward">Ward</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rate </label>
                                    <input type="text" ng-model="$parent.Rate" class="form-control" ng-init="$parent.Rate=getbed.Rate" >
                                </div>
                                <div class="form-group">
                                    <label>Floor </label>
                                    <select ng-model="$parent.Floor" class="form-control" ng-init="$parent.Floor=getbed.Floor" ng-click="EditMask()" disabled>

                                        <option value="" disabled selected>Select Floor</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                        <option value="5th">5th</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Room Number </label>
                                    <input type="text" ng-model="$parent.Room" placeholder="" class="form-control" ng-init="$parent.Room=getbed.Room" ui-mask="{{editrmask}}" ui-mask-placeholder ui-mask-placeholder-char="_" disabled/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button ng-click='Update()' class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Edit modal -->
            <!-- / Add Modal -->
            <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Add Bed</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Room Type </label>
                                    <select ng-model="RoomType" class="form-control">
                                        <option value="" disabled selected>Select Room Type</option>
                                        <option value="Single Deluxe">Single Deluxe</option>
                                        <option value="Two-Bedded">Two-Bedded</option>
                                        <option value="Four-Bedded">Four-Bedded</option>
                                        <option value="Ward">Ward</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rate </label>
                                    <input type="text" ng-model="rate" placeholder="100" class="form-control" ng-disabled="RoomType == disabled">
                                </div>
                                <div class="form-group">
                                    <label>Floor </label>
                                    <select ng-model="floor" class="form-control" ng-click='UpdateMask()' ng-disabled="RoomType == disabled">
                                        <option value="" disabled selected>Select Floor</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                        <option value="5th">5th</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Room Number </label>
                                    <input type="text" ng-model="room" class="form-control" ui-mask="{{addrmask}}" ui-mask-placeholder ui-mask-placeholder-char="_" ng-disabled="floor == disabled">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button ng-click='ConfirmAdd()' class="btn btn-primary">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Add Modal -->
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
        var fetch = angular.module('myApp', ['ui.mask']);


        fetch.controller('userCtrl', ['$scope', '$http', function($scope, $http) {

            $scope.selectedRow = null;
            $scope.selectedStatus = null;
            $scope.clickedRow = 0;
            $scope.new = {};

            $http({
                method: 'get',
                url: 'getData/get-bed-details.php'
            }).then(function(response) {
                $scope.beds = response.data;
                angular.element(document).ready(function() {
                    dTable = $('#table_info')
                    dTable.DataTable();
                });
            });

            $scope.UpdateMask = function() {
                if ($scope.floor == '1st') {
                    $scope.addrmask = 199;
                } else if ($scope.floor == '2nd') {
                    $scope.addrmask = 299;
                } else if ($scope.floor == '3rd') {
                    $scope.addrmask = 399;
                } else if ($scope.floor == '4th') {
                    $scope.addrmask = 499;
                } else if ($scope.floor == '5th') {
                    $scope.addrmask = 599;
                }
            }

            $scope.EditMask = function() {
                if ($scope.Floor == '1st') {
                    $scope.editrmask = 199;
                } else if ($scope.Floor == '2nd') {
                    $scope.editrmask = 299;
                } else if ($scope.Floor == '3rd') {
                    $scope.editrmask = 399;
                } else if ($scope.Floor == '4th') {
                    $scope.editrmask = 499;
                } else if ($scope.Floor == '5th') {
                    $scope.editrmask = 599;
                }
            }

         

            $scope.setClickedRow = function(bed,stat) {
                $scope.selectedRow = ($scope.selectedRow == null) ? bed : ($scope.selectedRow == bed) ? null : bed;
                $scope.selectedStatus= ($scope.selectedStatus == null) ? stat : ($scope.selectedStatus == stat) ? null : stat;
                $scope.clickedRow = ($scope.selectedRow == null) ? 0 : 1;
                
            }


            $scope.Add = function() {
                $('#AddModal').modal('show');
            }

            $scope.Update = function() {

                $http({
                    method: 'GET',
                    url: 'updateData/update-bed-details.php',
                    params: {
                        id: $scope.bedid,
                        RoomType: $scope.BType,
                        rate: $scope.Rate,
                        floor: $scope.Floor,
                        room: $scope.Room
                    }
                }).then(function(response) {
                    window.location.href = 'bed.php'
                });
            }

            $scope.ConfirmAdd = function() {

                if ($scope.floor == '1st')
                    $scope.room = '1' + $scope.room
                else if ($scope.floor == '2nd')
                    $scope.room = '2' + $scope.room
                else if ($scope.floor == '3rd')
                    $scope.room = '3' + $scope.room
                else if ($scope.floor == '4th')
                    $scope.room = '4' + $scope.room
                else if ($scope.floor == '5th')
                    $scope.room = '5' + $scope.room

                $http({
                    method: 'GET',
                    url: 'insertData/insert-bed.php',
                    params: {
                        RoomType: $scope.RoomType,
                        rate: $scope.rate,
                        floor: $scope.floor,
                        room: $scope.room
                    }
                }).then(function(response) {
                    window.location.href = 'bed.php'
                });
            }


            $scope.Edit = function() {
                if ($scope.selectedRow != null) 
                {
                    if ($scope.selectedStatus == 'Occupied')
                     $('#EditErrorModal').modal('show');
                     else
                     {
                    $('#EditModal').modal('show');
                    $scope.bedid = $scope.selectedRow;
                    $http({
                        method: 'GET',
                        params: {
                            id: $scope.selectedRow
                        },
                        url: 'getData/get-bed-id.php'
                    }).then(function(response) {
                        $scope.getbedid = response.data;
                    });
                    } 
                }
                else {
                    $('#ErrorModal').modal('show');
                }
            };


        }]);
    </script>
</div>
<?php include 'footer.php'?>