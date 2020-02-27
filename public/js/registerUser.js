$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });


// function checkInputLogin() {
// 	// body...
// 	var user = document.getElementById('user').value;
// 	var password = document.getElementById('passwordLogin').value;
// 	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

// 	try{
// 		if (user === "") {
// 			throw 'User không được là khoảng trống';
// 		}
// 		if (user.length == 10){
// 			if (user[0] != 0) {
// 				throw 'User phải là email hoặc số điện thoại';
// 			}
// 		}if (user.length != 10){
// 			if (!filter.test(user)) {
// 				throw 'User phải là email hoặc số điện thoại';
// 			}
// 		}
// 		if (password === ""){
// 			throw 'Password không được là khoảng trống';
// 		}
// 		if (password.length < 8){
// 			throw 'Password phải hơn 8 ký tự';
// 		}
// 		if (checkPassword(password)==false) {
// 			throw "Password sai định dạng";
// 		}
// 		location.href = "info.html";
// 		alert('Đăng nhập thành công');
// 	}catch(err){
// 		alert(err);
// 	}
// }

function hiddenExtend(){
	document.getElementById('extend').style.visibility = 'hidden';
	document.getElementById('extend').style.display = 'none';
}

function showExtend(){
	document.getElementById('extend').style.visibility = 'visible';
	document.getElementById('extend').style.display = 'block';
}

//check for duplicate emaill
$('#phoneMail').on('change', function (){
	var user = document.getElementById('phoneMail').value;
	$.ajax({
		url : "/checkEmail",
		type : 'GET',
		data : {
			email : user
		},
		success:function(response){
			if (response.result == 'false') {
				alert('Email đã tồn tại');
			}
		}

	})
});

$('.btnRegister').on('click', function(e){
	e.preventDefault();
	//check input register
	var lName = document.getElementById('lastName').value;
	var fName = document.getElementById('firstName').value;
	var user = document.getElementById('phoneMail').value;
	var pass = document.getElementById('passwordRegister').value;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	var dobDay = document.getElementById('day').value;
	var dobMonth = document.getElementById('month').value;
	var dobYear = document.getElementById('year').value;
	try{
		if (lName ==="") {
			throw "Họ không được là khoảng trống";
		}
		if (fName === "") {
			throw "Tên không được là khoảng trống";
		}
		if (user === "") {
			throw "User không được là khoảng trống";
		}
		if (user.length == 10){
			if (user[0] != 0) {
				throw "User phải là email hoặc số điện thoại";
			}
		}
		if (user.length != 10){
			if (!filter.test(user)) {
				throw "User phải là email hoặc số điện thoại";
			}
		}
		if (pass === "") {
			throw "Mật khẩu không được là khoảng trống";
		}
		if (pass.length<8){
			throw "Password phải hơn 8 kí tự";
		}
		if (checkPassword(pass)==false) {
			throw "Password sai định dạng";
		}
		if ((dobDay=='0') || (dobMonth=='0') || (dobYear=='0')) {
			throw "Chưa nhập đủ thông tin ngày tháng năm";
		}
		if (checkDate(dobYear,dobMonth,dobDay) == false){
			throw "Ngày sai định dạng";
		}
		if (checkAge(dobYear,dobMonth,dobDay) == false) {
			throw "Cần xác nhận của phụ huynh khi nhỏ hơn 6 tuổi";
		}
		if (checkSex() == '0') {
			throw "Phải chọn giới tính";
		}		
		//end check input
		//get gender
		var sexRegister="";
		if (checkSex()==1) {
			sexRegister="Nam";
		}
		if (checkSex()==2) {
			sexRegister="Nữ"
		}
		if (checkSex()==3) {
			sexRegister="Không xác định"
		}

		//register
		var date = dobYear +"-"+ dobMonth +"-"+ dobDay;
		var link = "/register";
		$.ajax({
			url: link,
			type: 'POST',
			data:{
				first_name: fName,
				last_name: lName,
				email: user,
				password: pass,
				date : date,
				gender : sexRegister
			},
			success:function(){
				alert('Đăng ký thành công, Vui lòng đăng nhập');
				setTimeout(function(){
					window.location.href="/login";
				},500);
			}
			// error:function(jqXHR, testStatus, errorThrown){
			// 	if (jqXHR.responseJSON.errors.name!==undefined) {}
			// }
		})

	}catch(err){
		alert(err);
	}
});

function checkDate(year,month,day){
	var date = new Date(year, month-1, day);
	if ((date.getFullYear()==year) && (date.getMonth()==month-1) && (date.getDate()==day)) {
		return true;
	}else return false;	
}

function checkAge(year,month,day){
	var condictionOfAge = 6;
	var age = new Date(year, month-1, day);

	// a day 24h = 86400000ms
	if (Date.now()-age.getTime() >= condictionOfAge*365*86400000) {
		return true;
	}
	else return false;
	//age = null;
}
function checkSex(){
	var sex = 0;
	var checkbox = document.getElementsByName("sex");
	for (var i = 0; i < checkbox.length; i++){
		if (checkbox[i].checked === true){
			sex = (checkbox[i].value);
		}
	}
	return sex;
}
function checkPassword(password){
	// var password = document.getElementById('passwordLogin').value;
	var filter = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
	if (!filter.test(password)) {
		return false;
	}
	else return true;
}

function showImg(){
	document.getElementById('listImg').style.visibility = 'visible';
	document.getElementById('listImg').style.display = 'block';
}

var sologanImg = document.getElementById('sologanImg');
var img1 = document.getElementById('img1');
var img2 = document.getElementById('img2');

img1.onclick = function(){
	sologanImg.src = "../images/img1.jpg";
}
img2.onclick = function(){
	sologanImg.src = "../images/img2.jpg";
}
