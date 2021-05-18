document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('openAuth').addEventListener('click', function(){
        document.getElementById('modalAuth').style.visibility = "visible";
        document.getElementById('modalAuth').style.opacity = "1";
        document.body.style.height = "100vh";
        document.body.style.overflowY = "hidden";
        document.body.style.paddingRight = "17px";
    })
    document.getElementById('modalAuth').addEventListener('click', function(){
        document.getElementById('modalAuth').style.visibility = "hidden";
        document.getElementById('modalAuth').style.opacity = "0";
        document.body.style.height = "";
        document.body.style.overflowY = "visible";
        document.body.style.paddingRight = "";
    })
    document.getElementById('modal-href-to-auth').addEventListener('click', function(){
        document.getElementById('modalAuth').style.visibility = "visible";
        document.getElementById('modalAuth').style.opacity = "1";
        document.getElementById('modalReg').style.visibility = "hidden";
        document.getElementById('modalReg').style.opacity = "0";
    })
    document.getElementById('modalAuth__content').addEventListener('click', function(e){
        e.stopPropagation();
    })
    document.getElementById('modalReg__content').addEventListener('click', function(e){
        e.stopPropagation();
    })
    document.getElementById('modal-href-to-register').addEventListener('click', function(){
        document.getElementById('modalReg').style.visibility = "visible";
        document.getElementById('modalReg').style.opacity = "1";
        document.getElementById('modalAuth').style.visibility = "hidden";
        document.getElementById('modalAuth').style.opacity = "0";
    })
    document.getElementById('modalReg').addEventListener('click', function(){
        document.getElementById('modalReg').style.visibility = "hidden";
        document.getElementById('modalReg').style.opacity = "0";
        document.body.style.height = "";
        document.body.style.overflowY = "visible";
        document.body.style.paddingRight = "";
    })

})
$(document).ready(function(){
    $('.content__form').submit(function(event){
        console.log(event)
    })
})