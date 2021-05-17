<?php 
session_start();

if(isset($_SESSION['success']))
{ 
    $s = $_SESSION['success'];
?>
<script type="text/javascript">
        window.onload = function() {
            var audio = new Audio("sussecc.mp3"); 
        var context = 'success';
        var message = '<?php echo $s; ?>'
        var position = 'top-right';
        toastr.remove();
        toastr[context](message, '', {
            positionClass: 'toast-top-right'
        });
        audio.play(); 
    }
</script>
<?php 
unset($_SESSION['success']);
}


if(isset($_SESSION['info']))
{ 
    $s = $_SESSION['info'];
?>
<script type="text/javascript">
        window.onload = function() {
            var audio = new Audio("info_tone.mp3");
        var context = 'info';
        var message = '<?php echo $s; ?>'
        var position = 'top-right';
        toastr.remove();
        toastr[context](message, '', {
            positionClass: 'toast-top-right'
        });
        audio.play();
    }
</script>
<?php 
unset($_SESSION['info']);
}


if(isset($_SESSION['warning']))
{ 
    $s = $_SESSION['warning'];
?>
<script type="text/javascript">
        window.onload = function() {
            var audio = new Audio("warning.mp3");
        var context = 'warning';
        var message = '<?php echo $s; ?>'
        var position = 'top-right';
        toastr.remove();
        toastr[context](message, '', {
            positionClass: 'toast-top-right'
        });
        audio.play();
    }
</script>
<?php 
unset($_SESSION['warning']);
}



if(isset($_SESSION['error']))
{ 
    $s = $_SESSION['error'];
?>
<script type="text/javascript">
        window.onload = function() {
        var audio = new Audio("error.mp3");
        var context = 'error';
        var message = '<?php echo $s; ?>'
        var position = 'top-right';
        toastr.remove();
        toastr[context](message, '', {
            positionClass: 'toast-top-right'
        });
        audio.play();
    }
</script>
<?php 
unset($_SESSION['error']);
}
?>