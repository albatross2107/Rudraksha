


const workSection=document.querySelector('.section-work-data');
const workObserver = new IntersectionObserver((entries, observer)=>{
    const [entry]=entries;
    console.log(entry);

    if(!entry.isIntersecting) return;

    const counterNum=document.querySelectorAll(".counter-numbers");
const speed=10;
counterNum.forEach((curElem )=> {
    
    const updateNumber=()=>{
    const targetNumber=parseInt(curElem.dataset.number);
    const initialNum=parseInt(curElem.innerText);
    

const incrementNumber=Math.trunc(targetNumber/speed);

if(initialNum<targetNumber){
    curElem.innerText=`${initialNum + incrementNumber}+`;
    setTimeout(updateNumber, 100);
}
    };
    updateNumber();
});

observer.unobserve(workSection);
}, {
    root:null,
    threshold:0,
});

workObserver.observe(workSection);




//faq-section




