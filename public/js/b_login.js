//alert($)
$(document).ready(function(){//页面加载完成再加载脚本
	$('input[name="button"]').click(function(event){
		var $name = $('input[name="username"]');
		var $password = $('input[name="password"]'); 
		var $text = $(".text");
		var _name = $.trim($name.val());//去掉字符串多余空格
		var _password = $.trim($password.val());

		if(_name==''){
			$text.text('请输入用户名');
			$name.focus();
			return;
		}
		if(_password==''){
			$text.text('请输入密码');
			$name.focus();
			return;
		}
		if(_name=="admin" &&_password=="admin"){
			$text.text("登陆成功，请稍后...");
		    window.location.href = "content.html";
		}else{
			$text.text("用户名或密码错误.");
		}
		

	});

});