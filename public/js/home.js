$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

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

// ==============================
// ====== change avatar =========
// ==============================
var modal = $('.modal');
var btn = $('#change_avatar');
var span = $('.close');
var close = $('#close-modal');
var input = $('#input-avt');
// var change = $('#change-avt');

btn.click(function () {
	modal.show();
});

span.click(function () {
	modal.hide();
});

$(window).on('click', function (e) {
	if ($(e.target).is('.modal')) {
		modal.hide();
	}
});

close.click(function(){
	modal.hide();
});

input.change(function(){
	//check input file
	var fullPath = document.getElementById('input-avt').value;
	var fileName = getFileName(fullPath);
	var extend = fileName.split('.').pop();

	if (extend == "png" || extend == "jpg" || extend == "jpeg" ) {
		$("#change-avt").attr("disabled", false);
		document.getElementById("message").innerHTML = "";
	}
	else{
		$("#change-avt").attr("disabled", true);
		document.getElementById("message").innerHTML = "Sai định dạng file";
	}
});


function getFileName(fullPath){
	if (fullPath) {
		var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
		var filename = fullPath.substring(startIndex);
		if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
			filename = filename.substring(1);
		}
		return filename;
	}
}