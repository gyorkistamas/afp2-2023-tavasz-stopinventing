<h1>Greetings, {{$userName}}</h1>
<h3>You have received an invite on {{$siteName}} for a meeting.</h3>
<hr>
<h3><b>Name of the meeting: </b>{{$meetingName}}</h3>
<h3><b>Start time: </b>{{str_replace('T',', ',$startTime)}}</h3>
<h3><b>End time: </b>{{str_replace('T',', ',$endTime)}}</h3>
<h3><b>Organiser: </b>{{$organiser}}</h3>
<h3><b>Description: </b>{{$description}}</h3>
<hr>
<h3>To respond wether you can attend or not, please log in to the website.</h3>
<p></p>
<p>This is an automated email, please do not respond to this e-mail address!</p>