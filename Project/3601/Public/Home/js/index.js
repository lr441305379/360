/**
 * Created by wyt on 2016/8/10.
 */


$(function(){
    $(window).scroll(function(){
        var a=$(window).scrollTop();
        if(a>800){
            $("#floornav").fadeIn();
            $(".return").fadeIn();
        }
        else{
            $("#floornav").fadeOut();
            $(".return").fadeOut();
        }
    })
})

$(function(){

    $("#floornav div").click(function(){
        var num=$(this).index();
        if(num>=1){
            a=num+2;
        }else{
            a=2;
        }
        var l=750+(a-1)*605;
        $("html,body").stop().animate({scrollTop:l+"px"},1000);

    })
})

$(function(){
    $(window).scroll(function(){
        var a=$(window).scrollTop();

        if(a>160){
            $("#top").addClass("fixed");
        }
        else{
            $("#top").removeClass("fixed");
        }
    })
})