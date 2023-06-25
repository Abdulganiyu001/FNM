
const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link");
//const btnpopup = document.querySelector('.btnLogin-popup');


// btnpopup.addEventListener('click',()=>{
//    wrapper.classList.add('active-popup');
// });

 loginLink.addEventListener('click', ()=> {
     wrapper.classList.remove('active');
 });


