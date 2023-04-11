<h1>Greetings, {{$userName}}</h1>
<h3>A meeting you have been invited to has been deleted. Below you can see the meeting's past details</h3>
<hr>
<h3><b>Name of the meeting: </b>{{$meetingName}}</h3>
<h3><b>Start time: </b>{{str_replace('T',', ',$startTime)}}</h3>
<h3><b>End time: </b>{{str_replace('T',', ',$endTime)}}</h3>
<h3><b>Organiser: </b>{{$organiser}}</h3>
<h3><b>Description: </b>{{$description}}</h3>
<hr>
<h3>We are sorry for any inconviences.</h3>
<p></p>
<p>This is an automated email, please do not respond to this e-mail address!</p>
