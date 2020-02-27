//event click show-chart
$('#li-info-users').on('click', function(){
	showId('info-users');
	hiddenId('info-skills');
	hiddenId('show-chart');
});

//event click info-skills
$('#li-info-skills').on('click', function(){
	showId('info-skills');
	hiddenId('info-users');
	hiddenId('show-chart');
});

//event click show-chart
$('#li-quantity-chart').on('click', function(){
	showId('show-chart');
	hiddenId('info-skills');
	hiddenId('info-users');
});
$('#li-avg-chart').on('click', function(){
	showId('show-chart');
	hiddenId('info-skills');
	hiddenId('info-users');
});
$('#li-skill-chart').on('click', function(){
	showId('show-chart');
	hiddenId('info-skills');
	hiddenId('info-users');
});

function hiddenId(id){
	document.getElementById(id).style.visibility = 'hidden';
	document.getElementById(id).style.display = 'none';
}

function showId(id){
	document.getElementById(id).style.visibility = 'visible';
	document.getElementById(id).style.display = 'block';
}