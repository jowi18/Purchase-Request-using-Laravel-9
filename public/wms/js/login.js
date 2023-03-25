// Login Form
$('body').on('submit','form[id=loginform-desktop]',function(e){
    e.preventDefault();
    let form = $('form[id=loginform-desktop');
    login(form);
});

$('body').on('submit','form[id=loginform-mobile]',function(e){
    e.preventDefault();
    let form = $('form[id=loginform-mobile');
    login(form);
});

var checked = 0;
$('body').on('click','input[id=showpass]',function(){
    if(checked <=0){
        $('input[id=pass]').attr('type','text');
        $('input[id=showpass]').prop('checked',true);
    }else{
        $('input[id=pass]').attr('type','password');
        $('input[id=showpass]').prop('checked',false );
    }
    checked = $("input[id=showpass]:checked").length;

});

$('body').on('keypress','input[id=uname]',function(){
    $('input[id=uname]').val($(this).val());
    $('input[id=uname]').removeClass('is-invalid');
    $('input[id=uname]').removeClass('is-valid');
    $('div[id=alert]').slideUp();
});

$('body').on('keypress','input[id=pass]',function(){
    $('input[id=pass]').val($(this).val());
    $('input[id=pass]').removeClass('is-invalid');
    $('input[id=pass]').removeClass('is-valid');
    $('div[id=alert]').slideUp();
});

// LOGIN FUNCTION
function login(form){
    $.ajax({
        type: "POST",
        url: "app/Controller/ajax_login.php",
        data: form.serialize(),
        datatype: 'html',
        success: function(result){
            let data = JSON.parse(result);
            // console.log(result)
            if(data.isUser == false){
                if(data.isLoggedActive == true){
                    if(confirm("This will logout your account from other device. Do you still want to proceed?")){
                        $.ajax({
                            type: "POST",
                            url: "app/Controller/ajax_login.php",
                            data: {
                                function : 'logout_to_other_device',
                                id : data.id,
                                token_id : data.token_id
                            },
                            datatype: 'html',
                            success: function(result){
                                let data = JSON.parse(result);
                                localStorage.setItem("sessions", JSON.stringify(data));
                                location.href = '/Glacier-WMS/dashboard.php';
                            }
                        });
                    }
                    else{
                        return false;
                    }
                }else{
                    $('input[id=uname]').focus();
                    $('input[id=uname]').addClass('is-invalid');
                    alert_error('div[id=alert]',data.validateLogin);
                }
            }else{
                localStorage.setItem("sessions", JSON.stringify(data));
                location.href = '/Glacier-WMS/dashboard.php';
            }
        }
    });
}


// CONVERT FORM START 
function convert_form_data_to_object(form){
    var arr={};
    for(var x=0; x<form.length; x++){
        arr[form[x].name] = form[x].value;
    }
    return arr;
}
// CONVERT FORM END 


// ALERT START 
function alert_success(id,message){
    console.log("wew");
    $(id).slideDown();
    $(id).text(message);
    $(id).removeClass("alert-danger");
    $(id).addClass("alert-success");
}
function alert_error(id,message){
    $(id).slideDown();
    $(id).text(message);
    $(id).addClass("alert-danger");
    $(id).removeClass("alert-success");
}
// ALERT END 

// DATE TIME FUNCTIONS
const month = ["January","February","March","April","May","June","July","August","September","October","November","December"],
day = ["Sunday","Monday","Tueday","Wednesday","Thursday","Friday","Saturday"];
var d = new Date();
$('#greet').text(greet(d.getHours()));
$('h1[id=time]').text(gettime(d.getHours(),d.getMinutes(),d.getSeconds()));
$('h1[id=date]').text(day[d.getDay()]+", "+month[d.getMonth()]+" "+d.getDate()+", "+d.getFullYear());
setInterval(()=>{
    d = new Date();
    $('#greet').text(greet(d.getHours()));
    $('h1[id=time]').text(gettime(d.getHours(),d.getMinutes(),d.getSeconds()));
    $('h1[id=date]').text(day[d.getDay()]+", "+month[d.getMonth()]+" "+d.getDate()+", "+d.getFullYear());
},1000);

function gettime(h,m,s){
    if(h >= 0 && h<12){
        if(m <10)return h+":0"+m+":"+s+" am";
        else return h+":"+m+":"+s+" am";
    }
    else{
        if(m<10)return h%12+":0"+m+":"+s+" pm";
        else return h%12+":"+m+":"+s+" pm";
        
    } 
}
function greet(time){
    if(time >=1 && time <12)return "Good Morning";
    else if(time ==12 )return "Good Day";
    else if(time >=13 && time <=16)return "Good Afternoon";
    else return "Good Evening";
    console.log(time)
}