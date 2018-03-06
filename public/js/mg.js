/**
 * Created by zjm on 2017/8/15.
 */
function checkMg(){
    //alert(1);
    var name = document.getElementById('new').value;

    var str = "<label class='glyphicon glyphicon-remove'></label>";
    if(name ==""){
        document.getElementById('show').style.display="block";
        document.getElementById('error').innerHTML=str+"职位未填写！";
        return false;
    }


    return true;
}