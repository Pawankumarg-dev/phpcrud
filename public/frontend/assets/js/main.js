/* LOADER */

window.addEventListener("load", function(){

    document.querySelector(".loader-wrapper").style.display = "none";

});

/* NAVBAR */

window.addEventListener("scroll", function(){

    let navbar = document.querySelector(".custom-navbar");

    if(window.scrollY > 50){

        navbar.style.background = "#000";
        navbar.style.padding = "15px 0";

    }else{

        navbar.style.background = "rgba(0,0,0,0.4)";
        navbar.style.padding = "20px 0";

    }

});

/* COUNTER */

const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {

    counter.innerText = '0';

    const updateCounter = () => {

        const target = +counter.getAttribute('data-target');

        const c = +counter.innerText;

        const increment = target / 200;

        if(c < target){

            counter.innerText = `${Math.ceil(c + increment)}`;

            setTimeout(updateCounter, 50);

        }else{

            counter.innerText = target;

        }

    };

    updateCounter();

});

/* AOS */

AOS.init({

    duration:1000,
    once:true

});