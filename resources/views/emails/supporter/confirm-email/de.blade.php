<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body id="ihfhyu">
  <div class="gjs-grid-row" id="i1il">
    <div class="gjs-grid-column" id="iiy4"><img id="ier5" src="{{asset("images/email-header/de.png")}}"/>
      <div id="irta"><b id="i72w">Hallo {{$supporter->firstname}}</b></div>
      <div id="igrj">
        <span id="ipci"><b id="ijbhf">Herzlichen Danke, dass du dem Komitee für ein JA zum Bildungsgesetz beigetreten bist!</b></span>
      </div>
      <div id="idsbb">Du hast ausgewählt, dass du unsere Kampagne mit deinem Namen unterstützen möchtest. Bitte
        bestätige dazu hier kurz deine E-Mail Adresse:<br/></div><div class="gjs-link-box" id="im8bg">
            <a class="gjs-link" id="id2q3" href="{{ route('supporter.confirm-email', ['id' => $supporter->id, 'token' => $supporter->email_verification_token]) }}">
                <b id="i1kmw">E-Mail Adresse bestätigen</b>
            </a>
        </div>
      <div id="idfee">Danke vielmals für deine Hilfe!<br/><br/><b>Die Kampagne «Keine Wartefristen bei Stipendien»</b>
      </div>
    </div>
  </div>
</body>
<style>
* {
	box-sizing:border-box;
}
body {
	margin:0;
}
.gjs-grid-column.feature-item {
	padding-top:15px;
	padding-right:15px;
	padding-bottom:15px;
	padding-left:15px;
	display:flex;
	flex-direction:column;
	gap:15px;
	min-width:30%;
}
.gjs-grid-column.testimonial-item {
	padding-top:15px;
	padding-right:15px;
	padding-bottom:15px;
	padding-left:15px;
	display:flex;
	flex-direction:column;
	gap:15px;
	min-width:45%;
	background-color:rgba(247,247,247,0.23);
	border-top-left-radius:5px;
	border-top-right-radius:5px;
	border-bottom-right-radius:5px;
	border-bottom-left-radius:5px;
	align-items:flex-start;
	border-top-width:1px;
	border-right-width:1px;
	border-bottom-width:1px;
	border-left-width:1px;
	border-top-style:solid;
	border-right-style:solid;
	border-bottom-style:solid;
	border-left-style:solid;
	border-top-color:rgba(0,0,0,0.06);
	border-right-color:rgba(0,0,0,0.06);
	border-bottom-color:rgba(0,0,0,0.06);
	border-left-color:rgba(0,0,0,0.06);
}
.gjs-link:hover {
	color:rgb(36,99,235);
	text-decoration:underline;
}
#ihfhyu {
	background-color:rgba(231,231,231,1);
	font-family:Helvetica,sans-serif;
}
.gjs-grid-column {
	flex:1 1 0%;
	padding:5px 0;
}
.gjs-grid-row {
	display:flex;
	justify-content:flex-start;
	align-items:stretch;
	flex-direction:row;
	min-height:auto;
	padding:10px 0;
}
#i1il {
	padding-left:10px;
	padding-right:10px;
	justify-content:center;
}
#iiy4 {
	max-width:650px;
	display:block;
	justify-content:center;
	background-color:rgba(255,255,255,1);
	padding-top:0px;
	padding-bottom:30px;
}
#ier5 {
	color:black;
}
#irta {
	padding:10px;
	padding-top:0px;
	padding-right:20px;
	padding-bottom:0px;
	padding-left:20px;
	font-size:23px;
}
#igrj {
	padding:10px;
	padding-top:20px;
	padding-right:20px;
	padding-bottom:0px;
	padding-left:20px;
}
.gjs-link {
	vertical-align:top;
	max-width:100%;
	display:inline-block;
	text-decoration:none;
	color:inherit;
}
#id2q3 {
	color:#FFF06A;
	padding:10px;
	margin-top:auto;
	margin-right:auto;
	margin-bottom:auto;
	margin-left:auto;
	padding-top:12px;
	padding-right:20px;
	padding-bottom:12px;
	padding-left:20px;
	display:inline-block;
	justify-content:center;
	background-color:#1A2471;
}
.gjs-link-box {
	color:inherit;
	display:inline-block;
	vertical-align:top;
	padding:10px;
	max-width:100%;
	text-decoration:none;
}
#im8bg {
	width:100%;
	display:flex;
	padding-top:15px;
	padding-right:15px;
	padding-bottom:15px;
	padding-left:15px;
}
#idfee {
	padding:10px;
	padding-top:30px;
	padding-right:20px;
	padding-bottom:10px;
	padding-left:20px;
}
#idsbb {
	padding:10px;
	padding-top:15px;
	padding-right:20px;
	padding-bottom:0px;
	padding-left:20px;
}
@media (max-width:992px) {
	.gjs-grid-row {
	flex-direction:column;
}
}
</style>
</html>
