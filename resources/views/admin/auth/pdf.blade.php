<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body {
			background-color: #5ed1ff;
			font-family: calibri;
			color: #fff;
		}
		a 
        {
			text-decoration: none;
			color: #000;
		}
		.container {
			margin: 0 auto;
		}
		.logo {
			cursor: pointer;
			border: 3px solid #fff;
			background-color: #fff;
			color: #5ed1ff;
			font-size: 2.2rem;
			text-transform: uppercase;
			font-weight: bold;
			letter-spacing: 2.5px;
			transition: all 0.2s;
		}
		.intro {
			width: 100%;
			overflow: hidden;
			font-size: 1rem;
			font-weight: bold;
		}
		.intro p{
			width: 100%;
			font-size: 18px;
		}
		.intro-title {
			color: #fff;
			font-size: 3rem;
			margin-top: 10vmin;
		}
		.btn {
			display: inline-block;
			color: #fff;
			padding: 10px 20px;
			text-align: center;
			border: 2px solid #fff;
			cursor: pointer;
			transition: all 300ms ease-in-out;
		}
	</style>
</head>
<body>
	<header class="container">
		<a href="" class="logo">Envelope</a>
	</header>
	<div class="container">
		<div class="intro">
			<h1 class="intro-title">Terima kasih<br>{{ $user->name }}</h1>
			<p>Envelope adalah platform penyampayan pengajuan atau aspirasi masyarakat terhadap apa yang terjadi dimasyarakat. Dikelola oleh masyarakat dan disuarakan oleh masyarakat.</p>
			<br>
			<a class="btn">Zulfikar Augusta</a>
		</div>
	</div>

</body>
</html>