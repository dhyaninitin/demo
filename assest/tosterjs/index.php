<!DOCTYPE html>
<html>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="toster.min.css">
<script type="text/javascript" src="toster.min.js"></script>
<script type="text/javascript" src="tosterjquery.js"></script>

<body>

<h2>Text input fields</h2>
<button type="button" class="btn btn-success" onclick="success()"> success</button>
<button type="button" class="btn btn-info" onclick="info()"> info</button>
<button type="button" class="btn btn-warning" onclick="warning()"> warning</button>
<button type="button" class="btn btn-danger" onclick="danger()"> danger</button>

<!-- <div id="sound"></div>  -->

<script>
	 function info(){
        // alert('dsadd');
        var audio = new Audio("info_tone.mp3");      
        var context = 'info';
        var message = 'info';
        var position = 'top-right';
        toastr.remove();
        toastr[context](message, '', {
            positionClass: 'toast-top-right'
        });
        audio.play(); 
       
    }
	 function success(){
        // alert('dsadd');
        var audio = new Audio("sussecc.mp3");      
        var context = 'success';
        var message = 'success';
        var position = 'top-right';
        toastr.remove();
        toastr[context](message, '', {
            positionClass: 'toast-top-right'
        });
        audio.play(); 
       
    }
     function danger(){
        // alert('dsadd');
        var audio = new Audio("error.mp3");      
        var context = 'error';
        var message = 'error';
        var position = 'top-right';
        toastr.remove();
        toastr[context](message, '', {
            positionClass: 'toast-top-right'
        });
        audio.play(); 
       
    }
     function warning(){
        // alert('dsadd');
        var audio = new Audio("warning.mp3");      
        var context = 'warning';
        var message = 'warning';
        var position = 'top-right';
        toastr.remove();
        toastr[context](message, '', {
            positionClass: 'toast-top-right'
        });
        audio.play(); 
       
    }
</script>
</body>
</html>
