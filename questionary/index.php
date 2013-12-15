<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<title>BEe a Supplier</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/external/mootools-core-1.4.5-minified.js"></script>
<!--script type="text/javascript" src="js/dg-count-down.js"></script-->
<script type="text/javascript" src="js/dg-quiz-maker.js"></script>
<!--Get jQuery & validate plug-in--> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script> 
<!--script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js"></script--> 
<script type="text/javascript" src="http://www.johnboy.com/scripts/simple-jquery-form-without-page-refresh/jquery.validate.js"></script> 

</head>
<body>



<div align="center" >
<h2>BEe a Supplier</h2>

	<div id="introduction">
	<p>Welcome to APIVITA survey for potential suppliers!</p>
	<p>This survey should only take about 5 minutes of your time and by filling out the survey you will be considered as our future potential supplier for specific ingredient needed for production of APIVITA products.</p>
	<p>In addition, this survey will help improve you knowledge so that, in the end,
	 you, the company and consumers will all benefit from our cooperation!</p>
	<input type="button" onclick="hideIntro();" value="BEGIN!">
	</div>

	<div id="questions"></div>
	<div id="error"></div>
	<div id="result"></div>

	<div id="message">See you next time.<br /><br /></div> 
	<div id="contact">
	<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	     Name (required):<br /> 
	     <input name="name" type="text" class="required" id="name" style="width:200px" />
	     <br /> 
	     <br /> 
	     Email (required):<br /> 
	     <input name="email" type="text" class="required email" size="30" style="width:200px" /> 
	     <br /> 
	     <br /> 
	     Phone:<br /> 
	     <input name="phone" type="text" class="" id="phone" style="width:200px" />
	     <br /> 
	     <br /> 
	     Company name:<br /> 
	     <input name="company" type="text" class="" id="company" style="width:200px" />
	     <br /> 
	     <br /> 
	     <input name="tab_questions" id="tab_questions" type="hidden" value="" />
	     <input name="Submit" id="submit" type="submit" class="submit_go" value="Submit" /> 
	</form>
	</div>
</div>

<script type="text/javascript">
function showWrongAnswer(){
    document.id('error').set('html', 'Wrong answer, Please try again');
}

// carlos: EDITED BEGIN //
function hideIntro() {
	$("#introduction").hide();
	$("#questions").show();

}
function showScore() {
	
	var score = quizMaker.getScore();
	console.log(score);

	var el = new Element('div');
	el.set('html', '<p>Thank you for using BEe a Supplier! Your contact information are now forwarded to APIVITA team!</p><p>In order to improve your knowledge and your production process and to make our cooperation successful please consider examining topics suggested bellow</p>');
    document.id('result').adopt(el);

	//el = new Element('h4');
	//el.set('html', 'Score: ' + score.numCorrectAnswers + ' of ' + score.numQuestions);
    //document.id('result').adopt(el);

	if(score.suggestedKeywords.length > 0) {
		el = new Element('h4');
		el.set('html', 'Recommended topics of knowledge:');
        document.id('result').adopt(el);

		for(var i=0;i<score.suggestedKeywords.length;i++) {
			var suggestedKeywords = score.suggestedKeywords[i];
			
			/*el = new Element('div');
			if(suggestedKeywords.keywords)
				link = '<a href="http://localhost/apivita/gfsp/finder/search.html?sqr='+suggestedKeywords.keywords.join("+")+'"> Click Here</a>';
			else
				link = "";
			el.set('html', '<b>For question ' +  suggestedKeywords.questionNumber + ' (' + suggestedKeywords.label + ')<br></b>');
			document.id('result').adopt(el);*/

			/*el = new Element('div');
			el.set('html', 'Correct answer : ' + incorrectAnswer.correctAnswer);
            document.id('result').adopt(el);
			el = new Element('div');
			el.set('html', 'Your answer : ' + incorrectAnswer.userAnswer);
            document.id('result').adopt(el);*/
            
            if(suggestedKeywords.keywords)
				//provide links to the finder:

				for(var j=0;j<suggestedKeywords.keywords.length;j++) {
					el = new Element('div');
					kw = suggestedKeywords.keywords[j];
					link = '<a href="http://<?php echo $_SERVER['REMOTE_ADDR']?>/apivita/gfsp/finder/search.html?sqr='+kw+'">'+kw+'</a>';
					el.set('html', link);		
					document.id('result').adopt(el);
				}
		}
	}

	//display contact form
	$("#contact").show();
	//save contact information
	$("#tab_questions").val(JSON.stringify(score));
}

var questions = [
	{
		label : 'In what are you interested to supply?',
		options : ['Honey', 'Beans', 'Rice', 'Tomatoes'],
		answer : ['Honey'],
		forceAnswer : true,
    },
	{
		label : 'Is your honey organic?',
		options : ['Yes', 'No'],
		answer : ['Yes'],
		forceAnswer : true,
		keywords: ['Organic', 'organic production', 'organic food production']
    },
	{
		label : 'What region are you from?',
		options : ['Central Greece','Attica','Peloponnese','North Aegean','South Aegean','Crete','East Macedonia and Thrace','Central Macedonia','Western Macedonia','Epirus','Thessaly','Ionian islands','Western Greece'],
		answer : [1,2], // refers to the second and third option
		forceAnswer : true,
		keywords: ['Honey production in Greece']
    }
    ,
	{
		label : 'On what crop your honey is based on?',
		options : ['Pine','Fir','Chestnut','Citrus fruit','Thyme','Heather'],
		answer : ['Pine'],
		forceAnswer : true,
		keywords: ['Thyme', 'Orange Blossom', 'Sunflower', 'Heather', 'Chestnut', 'Pine', 'Cotton', 'Vanilla-Fir', 'Polyfloral honey in Greece']
    },
	{
		label : 'How many honey hives do you have?',
		options : ['1-100','100-1,000','1,000-10,000', '10,000-100,000','100,000-more'],
		answer : [4],
		forceAnswer : true
    },
    {
        label: 'How many tons of honey are you producing?',
        options : ['1-10','10-100','100-1,000'],
        answer :[3],
        forceAnswer : true
    },
	{
        label: 'How do you feed your bees during the winter?',
        options : ['Dry sugar','Real pollen','Substitute of pollen','Syrup'],
        answer :[2],
        keywords: ['Beehive keeping in winter', 'winter beekeeping']
    },
	{
        label: 'What is the texture of the honey?',
        options : ['Solid','Semi','Runny'],
        answer :[2],
        forceAnswer : true
    }

]

// EDITED //

function showAnswerAlert() {
	document.id('error').set('html', 'You have to answer before you continue to the next question');
}
function clearErrorBox() {
    document.id('error').set('html','');
}
var quizMaker = new DG.QuizMaker({
	questions : questions,
	el : 'questions',
    forceCorrectAnswer:false,
	listeners : {
		'finish' : showScore,
		'missinganswer' : showAnswerAlert,
		'sendanswer' : clearErrorBox,
        'wrongAnswer' : showWrongAnswer
	}
});
quizMaker.start();



</script>

<script> 
$(document).ready(function() {
	$("#form1").validate({
		submitHandler: function() {
			//submit the form
			$.post("save_form.php", //post
				$("#form1").serialize(), 
				function(data){
				  //if message is sent
				  if (data == 'Sent') {
				    $("#message").fadeIn(); //show confirmation message
				    $("#form1")[0].reset(); //reset fields
				}
				//
			});
			$("#contact").hide();
			$("#result").show();
			return false; //don't let the page refresh on submit.
		}
	}); //validate the form
});
</script> 

</body>
</html>