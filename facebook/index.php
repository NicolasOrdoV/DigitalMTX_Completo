<!DOCTYPE html>
<html>
<head>
	<title>Facebook Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
	<div class="row">
		<div class="col s6 offset-s3" style="margin-top: 40px;">
			<div class="row">
				<div class="col s12 center">
					<span style="color: white;font-size: 3em;text-shadow: 2px 2px 20px #00aaff;text-transform: uppercase;">Mi Logo</span>
				</div>
			</div>
			<form>
				<div class="row">
						<div class="col s6">
							<div class="input-field col s12">
					          <input id="usuario" type="text" class="validate" required>
					          <label for="usuario">Usuario</label>
					        </div>
						</div>
						<div class="col s6">
							<div class="input-field col s12">
					          <input id="contrasena" type="password" class="validate" required>
					          <label for="contrasena">Contraseña</label>
					        </div>
						</div>
					</div>
					<div class="row">
						<div class="col s12 center">
							<button class="btn waves-effect waves-light" type="submit">Entrar</button>
						</div>
					</div>
			</form>
			<div class="row">
				<div class="col s12 center">
					<a href="https://www.facebook.com/v5.0/dialog/oauth?client_id=2366498093664997&redirect_uri=https://app-1539892747.000webhostapp.com/login_social/facebook/pass.php&state={st=state123abc,ds=123456789}" class="btn waves-effect waves-light">Entrar con Facebook</a>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>            
</body>
</html>