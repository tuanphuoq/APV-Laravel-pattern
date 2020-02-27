<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <title>ALT Plus | Quản trị nhân sự </title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="content">
            <div class="left">
                <a href="" id="logoFace">ALT Plus</a>
            </div>
            <div class="right">
                <form method="POST" action="{{ route('loginPost') }}">
                    @csrf
                    <div class="input">
                        <div class="elementInput user" >
                            <h6>Email hoặc điện thoại</h6>
                            <input type="text" name="email" id="user" >
                        </div>
                        <div class="elementInput pass">
                            <h6>Mật khẩu</h6>
                            <input type="password" name="password" id="passwordLogin" >
                        </div>
                        <div class="elementButton login">
                            <input type="submit" value="Đăng nhập">
                        </div>
                    </div>
                </form>
                <div class="forgotPass">
                    <a href="">Quên tài khoản ?</a>
                </div>
                @include('layouts.message')
            </div>
        </div>
    </header>
    <main>
        <div class="content">
            <div class="left">
                <div class="sologan">
                    <h3>ALT Plus giúp bạn kết nối và chia sẻ với mọi người trong cuộc sống của bạn.</h3>
                    <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yi/r/OBaVg52wtTZ.png" alt="mxh" id="sologanImg" onclick="showImg()">
                </div>
                <div class="listImg" id="listImg">
                    <img src="../images/img1.jpg" id="img1">
                    <img src="../images/img2.jpg" id="img2">
                </div>
            </div>
            <div class="right">
                <h1>Đăng ký</h1>
                <h3>Nhanh chóng và dễ dàng</h3>
                <form method="POST">
                    @csrf
                    <div class=" name">
                        <input type="text" name="lastName" id="lastName" placeholder="Họ">
                        <input type="text" name="firstName" id="firstName" placeholder="Tên">
                    </div>
                    <div class="input1 phone">
                        <input type="text" name="phoneMail" id="phoneMail" placeholder="Số điện thoại di động hoặc email">
                    </div>
                    <div class="input1 password">
                        <input type="password" name="passwordRegister" id="passwordRegister" placeholder="Mật khẩu">
                    </div>
                    <div class="input1 dob">
                        <div class="title_dob">
                            <span class="title">Ngày sinh</span>
                        </div>
                        <div class="option_dob">
                            <select class="opt_day" name="day" id="day">
                                <option value="0">Ngày</option>
                                <script type="text/javascript">
                                    for( var i=1; i<32; i++){
                                        document.write(" <option value="+i+">"+i+"</option>");
                                    }
                                </script>
                            </select>
                            <select class="opt_month" name="month" id="month" >
                                <option value="0">Tháng</option>
                                <script type="text/javascript">
                                    for( var i=1; i<13; i++){
                                        document.write(" <option value="+i+">"+i+"</option>");
                                    }
                                </script>
                            </select>
                            <select class="opt_year" name="year" id="year">
                                <option value="0">Năm</option>
                                <script type="text/javascript">
                                    for( var i=2020; i>1919; i--){
                                        document.write(" <option value="+i+">"+i+"</option>");
                                    }
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="sex">
                        <span class="title">Giới tính</span>
                        <div class="gioitinh">
                            <div class="radioBtn">
                                <input type="radio" name="sex" id="" value="1" onclick="hiddenExtend()"><span>Nam</span>
                            </div>
                            <div class="radioBtn">
                                <input type="radio" name="sex" id="" value="2" onclick="hiddenExtend()"><span>Nữ</span>
                            </div>
                            <div class="radioBtn">
                                <input type="radio" name="sex" id="" value="3" onclick="showExtend()"><span>Tùy chỉnh</span>
                            </div>
                        </div>
                        <!-- extend of sex -->
                        <div class="extend" id="extend">
                            <div class="pronoun">
                                <select class="" title="">
                                    <option>Chọn đại từ nhân xưng</option>
                                    <option>Anh ấy </option>
                                    <option>Cô ấy</option>
                                    <option>Họ</option>
                                </select>
                            </div>
                            <div class="sex_title">
                                <span>Danh xưng của bạn hiển thị với mọi người</span>
                            </div>
                            <div class="inputSex">
                                <input type="text" placeholder="Giới tính (không bắt buộc)">
                            </div>
                        </div>
                    </div>

                    <div class="info">
                        <span>Bằng cách nhấp vào Đăng ký, bạn đồng ý với</span> <a href="">Điều khoản</a>, <a href="">Chính sách dữ liệu</a> <span> và </span> <a href="">Chính sách cookie</a> <span>của chúng tôi. Bạn có thể nhận được thông báo của chúng tôi qua SMS và hủy nhận bất kỳ lúc nào.</span>
                    </div>
                    <div class="input button">
                        <button class="btnRegister">
                            <span>Đăng ký</span>  
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/registerUser.js"></script>
    {{-- <script type="text/javascript" src="../js/sendData.js"></script> --}}
</body>
</html>