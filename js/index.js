$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});

var app = angular.module('myApp', ['ui.mask']);
app.controller('userCtrl', function($scope, $http) {

  //   $scope.user = '';
  //   $scope.pass = '';

  //   $scope.Submit = function(){
  //       if($scope.user === '' && $scope.pass === ''){
  // $('#errorModal').modal('show');
  //       }else{
  //         $http({
  //               method: 'GET',
  //               url: 'mlmc-views/validations/validate-login.php',
  //               params: {id: $scope.user,
  //                        pass: $scope.pass}
  //            }).then(function(response) {
  //               $scope.param = response.data;
  //   if($scope.param == 0){
  //   alert('Oh snap! Change a few things up and try submitting again.');
  //   }else{
  //     var isMobile = {
  //         Android: function() {
  //             return navigator.userAgent.match(/Android/i);
  //         },
  //         BlackBerry: function() {
  //             return navigator.userAgent.match(/BlackBerry/i);
  //         },
  //       iOS: function() {
  //             return navigator.userAgent.match(/iPhone|iPad|iPod/i);
  //         },
  //         Opera: function() {
  //             return navigator.userAgent.match(/Opera Mini/i);
  //         },
  //         Windows: function() {
  //             return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
  //         },
  //         any: function() {
  //             return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
  //         }
  //       };
  //       if( isMobile.any() )
  //       {
  //       if($scope.param.charAt(1) == '3')
  //         window.location.href = 'mlmc-views/tablet-view/nurse-patient-tablet.php?at=' + $scope.user;
  //       else
  //         alert("You are not authorized to access this tablet");
  //       }
  //     else {
  //       window.location.href = 'mlmc-views/index.php?at=' + $scope.user;
  //     }	
  //   }
  //       });
  //       }
  //   }     
});
