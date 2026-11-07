const driver = $(".driver");
const mahasiswa = $(".mahasiswa");
const slider = $(".slider");
const signUpBtn = $("#signUpBtn");
const signInBtn = $("#signInBtn");
const container = $("#containerBox");
const role = $(".roleInput");


driver.on("click",sliderDriver);
mahasiswa.on("click", sliderMahasiswa);

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.hash === '#register') {
        sliderSignup();
    }
});

function sliderMahasiswa(){
    slider.removeClass("translate-x-full");
    slider.addClass("translate-x-0");
    role.val("mahasiswa");
}
function sliderDriver(){
    slider.removeClass("translate-x-0");
    slider.addClass("translate-x-full");
    role.val("driver");
    
}

function sliderSignup(){
    container.addClass("right-panel-active")
}

function sliderSignIn(){
    container.removeClass("right-panel-active");

}

signUpBtn.on("click",sliderSignup);
signInBtn.on("click", sliderSignIn);
