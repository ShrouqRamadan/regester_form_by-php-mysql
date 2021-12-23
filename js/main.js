let names =document.querySelector(".input");
let email =document.querySelector(".email");
let password =document.querySelector(".password");
let adress =document.querySelector(".adress");
let send =document.querySelector(".send");
let alert1 =document.querySelector(".alert1");
let alert2 =document.querySelector(".alert2");
let alert3 =document.querySelector(".alert3");
let close1 =document.querySelector(".close1");
let close2 =document.querySelector(".close2");
let colse3 =document.querySelector(".close3");
let x=()=>{
alert1.classList.add("none");
}
close1.addEventListener('click',x)
// 
let y=()=>{
    alert2.classList.add("none");
    }
    close2.addEventListener('click',y)
    // 
    let z=()=>{
        alert3.classList.add("none");
        }
        colse3.addEventListener('click',z)


let add= ()=>{
if(names.value.length==0 || email.value.length==0|| password.value.length==0|| adress.value.length==0   ){
alert1.classList.remove("none");
alert2.classList.add("none");
alert3.classList.add("none");

}
else if(names.value.length<=2 || email.value.length<=2|| password.value.length<=2|| adress.value.length<=2 ){
    alert1.classList.add("none");
    alert2.classList.remove("none");
    alert3.classList.add("none");   
}

names.value="";
email.value="";
password.value="";
adress.value="";
}
send.addEventListener('click',add);


