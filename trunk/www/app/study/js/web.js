var menuInterval = null;
var menuHover = null;
var menuBlur = null;
$(function(){
    try{
        //调弹出框
        var nh=$(document).height()
        var nw=$(document).width()
        $('#pop_mask').css({'width':nw+"px",'height':nh+"px"})	
        
        //登录
        $('.pop_login').click(function(){
            $('#pop_mask').show()
            $('#pop_register').hide()
            $('#pop_login').show()
        });
        //重新凑单
        $('.cent_price_sit_restart').click(function(){
        	$('#pop_mask').show()
            $('#cent_price_sit_restart').show()       
        });
        //凑单2
        $('.cent_price_sit').click(function(){
        	$(this).html()
        	$(this).attr("value")
        	$('#sit_cent').hide()
            $('#pop_register').hide()
            $('#cent_price_sit').show()
            $('#cent_sit_name').text($(this).html())
            $('#cent_sit_name2').text($(this).html())
            $('#cent_sit_id').val($(this).attr("value"))
            
        });
        //凑单1
        $('.sit_cent').click(function(){
            $('#pop_mask').show()
            $('#pop_register').hide()
            $('#sit_cent').show()
        });
        //重选商家
        $('#sit_cent_re').click(function(){
            $('#cent_price_sit').hide()
            $('#sit_cent').show()
        });
        //重选商家
        $('#sit_cent_restart_re').click(function(){
            $('#cent_price_sit_restart').hide()
            $('#sit_cent').show()
        });
        

        //注册
        $('.pop_register').click(function(){
            $('#pop_mask').show()
            $('#pop_login').hide()
            $('#pop_register').show()
        });
        $('#pop_login_close').click(function(){
            $('#pop_mask').hide()
            $('#pop_login').hide()
        });
        $('#sit_cent_close').click(function(){
            $('#pop_mask').hide()
            $('#sit_cent').hide()
        });  
        $('#cent_price_sit_close').click(function(){
            $('#cent_price_sit').hide()
            $('#pop_mask').hide()
        });
        $('#cent_price_sit_restart_close').click(function(){
            $('#cent_price_sit_restart').hide()
            $('#pop_mask').hide()
        });
       
        $('pop_mask').click(function(){
            $('#pop_mask').hide()
            $('#pop_register').hide()
            $('#pop_login').hide()
        });
        //越过
        $('.focusGoods li,.zmpubBox li,.chooseBoxList li,.tmall_List p').mouseenter(function(){
            $(this).addClass('hover');
        }).mouseleave(function(){
            $(this).removeClass('hover');
        });
    }catch(e){}

})