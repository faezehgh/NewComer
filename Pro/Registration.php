<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <title>Register</title>
</head>
<body class="registration">
<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>

<div class="form_wrapper">
	<div class="form_container">
		<div class="title_container">
			<h2>Create a New Account</h2>
		</div>
		<div class="row clearfix">
			<div class="">
				<form action="userAccount.php" method="post" id='register-form' autocomplete="off">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text h-100" id="basic-addon1" ><i aria-hidden="true" class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="nom" placeholder="Nom" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text h-100" id="basic-addon1" ><i aria-hidden="true" class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="prénom" placeholder="Prénom" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text h-100" id="basic-addon1" ><i aria-hidden="true" class="fa fa-envelope"></i></span>
                </div>
                <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text h-100" id="basic-addon1" ><i aria-hidden="true" class="fas fa-briefcase"></i></span>
                </div>
                <input type="text" class="form-control" name="domaine" placeholder="Domaine" aria-label="Domaine" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text h-100" id="basic-addon1" ><i aria-hidden="true" class="fas fa-sitemap"></i></span>
                </div>
                <input type="text" class="form-control" name="hiérarchique" placeholder="Hiérarchique" aria-label="Hiérarchique" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text h-100" id="basic-addon1" ><i aria-hidden="true" class="fas fa-paste"></i></span>
                </div>
                <input type="text" class="form-control" name="poste" placeholder="Poste" aria-label="Poste" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text h-100" id="basic-addon1" ><i aria-hidden="true" class="fas fa-calendar-times"></i></span>
                </div>
                <input type="date" class="form-control" name="dateArrivée" placeholder="Date Arrivée" aria-label="Date Arrivée" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text h-100" id="basic-addon1" ><i aria-hidden="true" class="fas fa-calendar-times"></i></span>
                </div>
                <input type="date" class="form-control" name="dateSortie" placeholder="Date Sortie" aria-label="Date Sortie" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text h-100" id="basic-addon1" ><i aria-hidden="true" class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" name="matricule" placeholder="Matricule" aria-label="Matricule" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text h-100" id="basic-addon1" ><i aria-hidden="true" class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" name="confirm_matricule" placeholder="confirm_matricule" aria-label="confirm_matricule" aria-describedby="basic-addon1">
                </div>
                <div>           
                    <input id='submit-data' class="btn btn-Warning text-white" type="submit" name="signupSubmit" value="REGISTER" />
                </div>
                <div class="send-button">           
                    <input  type="submit" value="LOGIN" />

                </div>
                </form>
			</div>
		</div>
	</div>
</div>
        
</body>
</html>