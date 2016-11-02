//右侧排行榜网络请求进行布局
	$(function rightSide () {
			$.ajax({
				type:"GET",
				url:"../php/code/rankDEMO.php",
				async:true,
				success:function  (str) {
					var obj = JSON.parse(str);
					console.log(1111111111);
					console.log(obj);
					console.log($('.passto'));
					pass (obj);
				}
			});
	})
	
		//网络请求传输数据，修改右侧边栏布局
		function pass (obj) {
			var passA = $('.passto');
			$(passA[0]).text(obj[0].prj_title);
			$(passA[0]).next('span').text(obj[0].prj_price);
			//界面跳转的第一种写法，在A链接加上target=_blank属性，改变href地址
			$(passA[0]).attr('href',"http://127.0.0.1/project/html/goodsBuy.html?prjId=" + obj[0].prj_id + "&prjFrom=" + obj[0].prj_from);
			for (var i = 1; i < obj.length; i++) {
				$(passA[i]).text(obj[i].prj_title.substr(0,12)+'...');
				$(passA[i]).next('span').text(obj[i].prj_price);
//				console.log(passA[i].parentNode);
//				passA[i].parentNode.onmouseover = function  () {
//					this.style.background = 'red';
//				}
				 passA[i].index = i;
				 //界面跳转新窗口的第二种写法
				$(passA[i]).on('click',function  () {
					window.open("http://127.0.0.1/project/html/goodsBuy.html?prjId=" + obj[this.index].prj_id + "&prjFrom=" + obj[this.index].prj_from);
					
				})
			}
			
		}